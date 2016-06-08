<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:48 AM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class SubscriberTraits
	 * @package ZayconWhatCounts
	 */
	trait SubscriberTraits
	{
		/**
		 * URL Stub
		 * 
		 * @var string $subscriber_stub
		 */
		private $subscriber_stub = 'subscribers';

		/**
		 * Subscriber Class Name
		 * 
		 * @var string $subscriber_class_name
		 */
		private $subscriber_class_name = '\ZayconWhatCounts\Subscriber';

		/**
		 * Get all subscribers from API.
		 * Optionally pass a skip value to method (for paging).
		 * Passes skip value to API, if present.
		 *
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

		/**
		 * @param \ZayconWhatCounts\MailingList $list
		 * @param null                          $start_date
		 * @param null                          $end_date
		 * @param null                          $skip
		 *
		 * @return array
		 */
		public function getUnsubscribersForList(MailingList $list, $start_date = NULL, $end_date = NULL, $skip = NULL)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($start_date)) {
				$query['start'] = date_format($start_date, 'm-d-y');
			}
			if (isset($end_date)) {
				$query['end'] = date_format($end_date, 'm-d-y');
			}

			$unubscribes = $whatcounts->getAll($this->list_stub . '/' . $list->getId() . '/unsubscribes?' . http_build_query($query) , '\ZayconWhatCounts\Unsubscribes', $skip);

			return $unubscribes;
		}

		/**
		 * @param \ZayconWhatCounts\MailingList $list
		 * @param null                          $customer_key
		 * @param null                          $email
		 * @param null                          $first_name
		 * @param null                          $last_name
		 *
		 * @return array
		 */
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

		/**
		 * @param null $customer_key
		 * @param null $email
		 * @param null $first_name
		 * @param null $last_name
		 *
		 * @return array
		 */
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

		/**
		 * @param integer $subscriber_id
		 *
		 * @return \ZayconWhatCounts\Subscriber
		 */
		public function getSubscriberAndSubscriptions($subscriber_id)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;

			/** @var Subscriber $subscriber */
			$subscriber = $whatcounts->getAll($this->subscriber_stub . '/' . $subscriber_id . '/subscriptions', $this->subscriber_class_name);

			return $subscriber;
		}

		/**
		 * @param  integer $subscriber_id
		 * @param  \DateTime  $start_date
		 * @param  \DateTime  $end_date
		 *
		 * @return \ZayconWhatCounts\Subscriber
		 */
		public function getSubscriberAndEvents($subscriber_id, $start_date = NULL, $end_date = NULL)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($start_date)) {
				$query['start'] = date_format($start_date, 'm-d-y');
			}
			if (isset($end_date)) {
				$query['end'] = date_format($end_date, 'm-d-y');
			}

			/** @var Subscriber $subscriber */
			$subscriber = $whatcounts->getAll($this->subscriber_stub . '/' . $subscriber_id . '/events?' . http_build_query($query) , $this->subscriber_class_name);

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
				->setCreatedDate($response_data->createdDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
				->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
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
				->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
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

		/**
		 * @param \ZayconWhatCounts\Subscriber $subscriber
		 *
		 * @return bool
		 */
		public function deleteSubscriberByCustomerKey(Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteByCustomerKey($this->subscriber_stub, $subscriber);
		}

	}