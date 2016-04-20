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
		private $subscription_stub = 'subscriptions';
		private $subscription_class_name = 'ZayconWhatCounts\Subscription';

		public function createSubscription(Subscription $subscription)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->subscription_stub, $subscription);
			
			$subscription
				->setId($response_data->subscriptionId)
				->setCreatedDate($response_data->createdDate);
		}

		public function deleteSubscription(Subscription $subscription)
		{
			$whatcounts = $this;
			/** @var WhatCounts $this */
			return $whatcounts->delete($this->subscription_stub, $subscription);
		}

		public function deleteSubscriptionById(Subscription $subscription)
		{
			$whatcounts = $this;
			/** @var WhatCounts $this */
			return $whatcounts->deleteById($this->subscription_stub, $subscription);
		}
	}