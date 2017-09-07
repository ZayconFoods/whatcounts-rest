<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 4:16 PM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;

	/**
	 * Class Subscription
	 * @package Whatcounts_Rest
	 */
	trait Subscription
	{
		/**
		 * URL Stub
		 * 
		 * @var string $subscription_stub
		 */
		private $subscription_stub = 'subscriptions';

		/**
		 * Subscription Class Name
		 * 
		 * @var string $subscription_class_name
		 */
		private $subscription_class_name = 'Zaycon\Whatcounts_Rest\Models\Subscription';

		/**
		 * Create a Subscription in API.
		 * Must pass a Subscription object to method.
		 * Passes Subscription object to API.
		 *
		 * @param Models\Subscription $subscription
         * @param bool $retry
         * @param bool $do_async
         *
         * @return bool|Models\Subscription $subscription
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createSubscription(Models\Subscription $subscription, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */

            if ($do_async)
            {
                return $whatcounts->create($this->subscription_stub, $subscription, $retry, $do_async);
            }
            else
            {
                $response_data = $whatcounts->create($this->subscription_stub, $subscription, $retry, $do_async);

                $subscription
                    ->setId($response_data->subscriptionId)
                    ->setCreatedDate($response_data->createdDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
                    ->setSkip($response_data->skip)
                    ->setMax($response_data->max);

                return $subscription;
            }
		}

		/**
		 * Delete a Subscription in API.
		 * Must pass a Subscription object to method.
		 * Passes Subscription object to API.
		 *
		 * @param Models\Subscription $subscription
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return mixed
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSubscription(Models\Subscription $subscription, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
			return $whatcounts->delete($this->subscription_stub, $subscription, $retry, $do_async);
		}

		/**
		 * Delete a Subscription in API.
		 * Must pass a Subscription object to method.
		 * Passes Subscription id to API.
		 *
		 * @param Subscription $subscription
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return mixed
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSubscriptionById(Subscription $subscription, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $this */
			return $whatcounts->deleteById($this->subscription_stub, $subscription, $retry, $do_async);
		}
	}