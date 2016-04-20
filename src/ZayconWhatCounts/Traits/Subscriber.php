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
		 * @throws WhatCountsException
		 */
		public function getSubscribers()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscribers = $whatcounts->getAll($this->subscriber_stub, $this->subscriber_class_name);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$subscriber = $whatcounts->getById($this->subscriber_stub, $this->subscriber_class_name, $subscriber_id);

			return $subscriber;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return Subscriber
		 * @throws WhatCountsException
		 *
		 */
		public function createSubscriber(Subscriber &$subscriber)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->subscriber_stub, $subscriber);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->subscriber_stub, $subscriber);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->subscriber_stub, $subscriber);
		}

	}