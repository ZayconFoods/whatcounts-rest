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
		/**
		 * @param Subscriber $subscriber
		 *
		 * @return array
		 * @throws WhatCountsException
		 *
		 */
		public function getSubscribers(Subscriber $subscriber)
		{
			$request_data = array(
				'email' => $subscriber->getEmail(),
				'firstName' => $subscriber->getFirstName(),
				'lastName'  => $subscriber->getLastName()
			);

			$response_data = $this->call('subscribers', 'GET', $request_data);

			$subscribers = array();

			foreach ($response_data as $subscriberItem) {
				$subscriber = new Subscriber($subscriberItem);
				$subscribers[] = $subscriber;
			}

			return $subscribers;
		}

		/**
		 * @param $subscriber_id
		 *
		 * @return Subscriber
		 * @throws WhatCountsException
		 *
		 */
		public function getSubscriberById($subscriber_id)
		{
			$response_data = $this->call('subscribers/' . $subscriber_id . '/subscriptions', 'GET');
			$subscriber = new Subscriber($response_data);

			$subscriber_lists = array();
			foreach ($response_data->subscriptions as $subscription) {
				$new_subscription = New Subscription($subscription);
				$subscriber_lists[] = $new_subscription;
			}

			$subscriber->setSubscriptions($subscriber_lists);

			return $subscriber;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return Subscriber
		 * @throws WhatCountsException
		 *
		 */
		public function addSubscriber(Subscriber &$subscriber)
		{
			$request_data = $subscriber->getRequestArray();
			$response_data = $this->call('subscribers', 'POST', $request_data);

			$subscriber
				->setSubscriberId($response_data->subscriberId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate)
				->setUpdatedDate($response_data->updatedDate)
				->setMd5Encryption($response_data->md5Encryption)
				->setSha1Encryption($response_data->sha1Encryption);
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969619
		 *
		 */
		public function updateSubscriber(Subscriber &$subscriber)
		{
			$request_data = $subscriber->getRequestArray();
			$response_data = $this->call('subscribers/' . $subscriber->getSubscriberId() . '', 'PUT', $request_data);

			$subscriber
				->setUpdatedDate($response_data->updatedDate);
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/204669915
		 *
		 */
		public function deleteSubscriber(Subscriber $subscriber)
		{
			$request_data = array(
				'data' => 'email^' . $subscriber->getEmail()
			);
			$xml = $this->call('delete', 'DELETE', $request_data);

			return trim($xml[1]);
		}

		/**
		 * @param Subscriber $subscriber
		 * @param $list_id
		 * @param bool $force_optout
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969639
		 *
		 */
		public function unsubscribe(Subscriber $subscriber, $list_id, $force_optout = FALSE)
		{
			$request_data = array(
				'list_id'      => $list_id,
				'force_optout' => $force_optout,
				'data'         => 'email,first,last^'
					. $subscriber->getEmail() . ','
					. $subscriber->getFirstName() . ','
					. $subscriber->getLastName()
			);
			$xml = $this->call('unsub', 'POST', $request_data);

			return trim($xml[1]);
		}

	}