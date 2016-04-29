<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:48 AM
	 */

	namespace ZayconWhatCounts;


	trait SubscriberTraits
	{
		private $subscriber_stub = 'subscribers';
		private $subscriber_class_name = '\ZayconWhatCounts\Subscriber';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscribers()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll($this->subscriber_stub, $this->subscriber_class_name);

			return $subscribers;
		}

		/**
		 * @param MailingList $list
		 *
		 * @return array
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscribersForList(MailingList $list)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub, $this->subscriber_class_name);
			
			return $subscribers;
		}

		/**
		 * @param $subscriber_id
		 *
		 * @return Subscriber
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscriberById($subscriber_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscriber = $whatcounts->getById($this->subscriber_stub, $this->subscriber_class_name, $subscriber_id);

			return $subscriber;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createSubscriber(Subscriber &$subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->subscriber_stub, $subscriber);

			$subscriber
				->setId($response_data->subscriberId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate, new \DateTimeZone($whatcounts->getTimeZone()))
				->setUpdatedDate($response_data->updatedDate, new \DateTimeZone($whatcounts->getTimeZone()))
				->setMd5Encryption($response_data->md5Encryption)
				->setSha1Encryption($response_data->sha1Encryption);
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateSubscriber(Subscriber &$subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->subscriber_stub, $subscriber);

			$subscriber
				->setUpdatedDate($response_data->updatedDate, new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return boolean
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSubscriber(Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->subscriber_stub, $subscriber);
		}

	}