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
		 * @param null $skip
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */

		public function getSubscribers($skip = NULL)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll($this->subscriber_stub, $this->subscriber_class_name, $skip);

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
		public function getSubscribersForList(MailingList $list, $skip = NULL)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub, $this->subscriber_class_name, $skip);
			
			return $subscribers;
		}

		public function getUnsubscribersForList(MailingList $list)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/unsubscribes', $this->subscriber_class_name);

			return $subscribers;
		}

		public function findSubscribersInList(MailingList $list, $customer_key = NULL, $email = NULL, $first_name = NULL, $last_name = NULL)
		{
			$query = array();
			if (isset($customer_key)) {
				$query['customerKey'] = $customer_key;
			}
			if (isset($email)) {
				$query['email'] = $email;
			}
			if (isset($first_name)) {
				$query['firstName'] = $first_name;
			}
			if (isset($last_name)) {
				$query['lastName'] = $last_name;
			}

			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub . '?' . http_build_query($query), $this->subscriber_class_name);

			return $subscribers;
		}

		public function findSubscribers($customer_key = NULL, $email = NULL, $first_name = NULL, $last_name = NULL)
		{
			$query = array();
			if (isset($customer_key)) {
				$query['customerKey'] = $customer_key;
			}
			if (isset($email)) {
				$query['email'] = $email;
			}
			if (isset($first_name)) {
				$query['firstName'] = $first_name;
			}
			if (isset($last_name)) {
				$query['lastName'] = $last_name;
			}

			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll($whatcounts->subscriber_stub . '?' . http_build_query($query), $this->subscriber_class_name);

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

		public function getSubscriberSubscriptions($subscriber)
		{

		}

		public function getSubscribersEventsByCustomerKey($subscriber, $start_date = NULL, $end_date = NULL)
		{

		}

		public function getSubscribersEventsBySubscriberId($subscriber, $start_date = NULL, $end_date = NULL)
		{

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
				->setSha1Encryption($response_data->sha1Encryption)
				->setSkip($response_data->skip)
				->setMax($response_data->max);
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
		public function deleteSubscriberById(Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->subscriber_stub, $subscriber);
		}

		public function deleteSubscriberByCustomerKey(Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteByCustomerKey($this->subscriber_stub, $subscriber);
		}

	}