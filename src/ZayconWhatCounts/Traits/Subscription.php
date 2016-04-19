<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 4:16 PM
	 */

	namespace ZayconWhatCounts;

	trait SubscriptionTraits
	{

		public function createSubscription(Subscription $subscription)
		{
			$request_data = $subscription->getRequestArray();
			/** @var WhatCounts $this */
			$response_data = $this->call('subscriptions', 'POST', $request_data);

			$subscription
				->setId($response_data->subscriptionId)
				->setCreatedDate($response_data->createdDate);
		}

		public function deleteSubscription(Subscription $subscription)
		{
			$request_data = $subscription->getRequestArray();
			/** @var WhatCounts $this */
			$this->call('subscriptions', 'DELETE', $request_data);

			return TRUE;
		}

		public function deleteSubscriptionById($subscription_id)
		{
			/** @var WhatCounts $this */
			$this->call('subscriptions/' . $subscription_id, 'DELETE');

			return TRUE;
		}
	}