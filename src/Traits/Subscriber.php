<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:48 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use \Zaycon\Whatcounts_Rest\Models;
	
	/**
	 * Class Subscriber
	 * @package Whatcounts_Rest
	 */
	trait Subscriber
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
		private $subscriber_class_name = '\Zaycon\Whatcounts_Rest\Models\Subscriber';

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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

			$subscribers = $whatcounts->getAll($this->subscriber_stub . http_build_query($query), $this->subscriber_class_name);

			return $subscribers;
		}

		/**
		 * @param Models\MailingList $list
		 * @param $skip
		 *
		 * @return array
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscribersForList(Models\MailingList $list, $skip = NULL)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub . http_build_query($query), $this->subscriber_class_name);
			
			return $subscribers;
		}

		/**
		 * @param Models\MailingList $list
		 * @param null                          $start_date
		 * @param null                          $end_date
		 * @param null                          $skip
		 *
		 * @return array
		 */
		public function getUnsubscribersForList(Models\MailingList $list, $start_date = NULL, $end_date = NULL, $skip = NULL)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($start_date)) {
				$query['start'] = date_format($start_date, 'Y-m-d');
			}
			if (isset($end_date)) {
				$query['end'] = date_format($end_date, 'Y-m-d');
			}
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

			$unubscribes = $whatcounts->getAll($this->list_stub . '/' . $list->getId() . '/unsubscribes?' . http_build_query($query) , '\Zaycon\Whatcounts_Rest\Models\Unsubscribes');

			return $unubscribes;
		}

		/**
		 * @param Models\MailingList $list
		 * @param null                          $customer_key
		 * @param null                          $email
		 * @param null                          $first_name
		 * @param null                          $last_name
		 *
		 * @return array
		 */
		public function findSubscribersInList(Models\MailingList $list, $customer_key = NULL, $email = NULL, $first_name = NULL, $last_name = NULL)
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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$subscriber = $whatcounts->getById($this->subscriber_stub, $this->subscriber_class_name, $subscriber_id);

			return $subscriber;
		}

		/**
		 * @param integer $subscriber_id
		 *
		 * @return Models\Subscriber
		 */
		public function getSubscriberAndSubscriptions($subscriber_id)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
		 * @return Models\Subscriber
		 */
		public function getSubscriberAndEvents($subscriber_id, $start_date = NULL, $end_date = NULL)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($start_date)) {
				$query['start'] = date_format($start_date, 'Y-m-d');
			}
			if (isset($end_date)) {
				$query['end'] = date_format($end_date, 'Y-m-d');
			}

			/** @var Subscriber $subscriber */
			$subscriber = $whatcounts->getAll($this->subscriber_stub . '/' . $subscriber_id . '/events?' . http_build_query($query) , $this->subscriber_class_name);

			return $subscriber;
		}

		/**
		 * @param Models\Subscriber $subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createSubscriber(Models\Subscriber &$subscriber)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
		 * @param Models\Subscriber $subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateSubscriber(Models\Subscriber &$subscriber)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->subscriber_stub, $subscriber);

            if (isset($response_data->updatedDate))
            {
                $subscriber
                    ->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
            }
		}

		/**
		 * @param Models\Subscriber $subscriber
		 *
		 * @return boolean
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSubscriberById(Models\Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->subscriber_stub, $subscriber);
		}

		/**
		 * @param Models\Subscriber $subscriber
		 *
		 * @return bool
		 */
		public function deleteSubscriberByCustomerKey(Models\Subscriber $subscriber)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteByCustomerKey($this->subscriber_stub, $subscriber);
		}

	}