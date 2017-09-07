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
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscribers($skip = NULL, $retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

			$subscribers = $whatcounts->getAll($this->subscriber_stub . http_build_query($query), $this->subscriber_class_name, $retry, $do_async);

			return $subscribers;
		}

		/**
		 * @param Models\MailingList $list
		 * @param $skip
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscribersForList(Models\MailingList $list, $skip = NULL, $retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$query = array();
			if (isset($skip)) {
				$query['skip'] = $skip;
			}

			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub . http_build_query($query), $this->subscriber_class_name, $retry, $do_async);
			
			return $subscribers;
		}

		/**
		 * @param Models\MailingList $list
		 * @param null $start_date
		 * @param null $end_date
		 * @param null $skip
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 */
		public function getUnsubscribersForList(Models\MailingList $list, $start_date = NULL, $end_date = NULL, $skip = NULL, $retry = TRUE, $do_async = FALSE)
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

			$unubscribes = $whatcounts->getAll($this->list_stub . '/' . $list->getId() . '/unsubscribes?' . http_build_query($query) , '\Zaycon\Whatcounts_Rest\Models\Unsubscribes', $retry, $do_async);

			return $unubscribes;
		}

		/**
		 * @param Models\MailingList $list
		 * @param null $customer_key
		 * @param null $email
		 * @param null $first_name
		 * @param null $last_name
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 */
		public function findSubscribersInList(Models\MailingList $list, $customer_key = NULL, $email = NULL, $first_name = NULL, $last_name = NULL, $retry = TRUE, $do_async = FALSE)
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
			$subscribers = $whatcounts->getAll('lists/' . $list->getId() . '/' . $whatcounts->subscriber_stub . '?' . http_build_query($query), $this->subscriber_class_name, $retry, $do_async);

			return $subscribers;
		}

		/**
		 * @param null $customer_key
		 * @param null $email
		 * @param null $first_name
		 * @param null $last_name
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 */
		public function findSubscribers($customer_key = NULL, $email = NULL, $first_name = NULL, $last_name = NULL, $retry = TRUE, $do_async = FALSE)
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
			$subscribers = $whatcounts->getAll($whatcounts->subscriber_stub . '?' . http_build_query($query), $this->subscriber_class_name, $retry, $do_async);

			return $subscribers;
		}

		/**
		 * @param $subscriber_id
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return Models\Subscriber
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSubscriberById($subscriber_id, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$subscriber = $whatcounts->getById($this->subscriber_stub, $this->subscriber_class_name, $subscriber_id, $retry, $do_async);

			return $subscriber;
		}

		/**
		 * @param integer $subscriber_id
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return Models\Subscriber
		 */
		public function getSubscriberAndSubscriptions($subscriber_id, $retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			$subscriber = $whatcounts->getAll($this->subscriber_stub . '/' . $subscriber_id . '/subscriptions', $this->subscriber_class_name, $retry, $do_async);

			return $subscriber;
		}

		/**
		 * @param  integer $subscriber_id
		 * @param  \DateTime  $start_date
		 * @param  \DateTime  $end_date
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return Models\Subscriber
		 */
		public function getSubscriberAndEvents($subscriber_id, $start_date = NULL, $end_date = NULL, $retry = TRUE, $do_async = FALSE)
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

			$subscriber = $whatcounts->getAll($this->subscriber_stub . '/' . $subscriber_id . '/events?' . http_build_query($query) , $this->subscriber_class_name, $retry, $do_async);

			return $subscriber;
		}

		/**
		 * @param Models\Subscriber $subscriber
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool|Models\Subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createSubscriber(Models\Subscriber &$subscriber, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */

            if ($do_async)
            {
                return $whatcounts->create($this->subscriber_stub, $subscriber, $retry, $do_async);
            }
            else
            {
                $response_data = $whatcounts->create($this->subscriber_stub, $subscriber, $retry, $do_async);

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
		}

		/**
		 * @param Models\Subscriber $subscriber
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool|Models\Subscriber
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateSubscriber(Models\Subscriber &$subscriber, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */

            if ($do_async)
            {
                return $whatcounts->update($this->subscriber_stub, $subscriber, $retry, $do_async);
            }
            else
            {
                $response_data = $whatcounts->update($this->subscriber_stub, $subscriber, $retry, $do_async);

                if (isset($response_data->updatedDate))
                {
                    $subscriber
                        ->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
                }
            }
		}

		/**
		 * @param Models\Subscriber $subscriber
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return boolean
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSubscriberById(Models\Subscriber $subscriber, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */

			return $whatcounts->deleteById($this->subscriber_stub, $subscriber, $retry, $do_async);
		}

		/**
		 * @param Models\Subscriber $subscriber
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return bool
		 */
		public function deleteSubscriberByCustomerKey(Models\Subscriber $subscriber, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteByCustomerKey($this->subscriber_stub, $subscriber, $retry, $do_async);
		}

	}