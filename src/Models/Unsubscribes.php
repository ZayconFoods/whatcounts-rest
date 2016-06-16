<?php
	/**
	 * Created by PhpStorm.
	 * Author: Mark Simonds
	 * Date: 5/23/16
	 * Time: 4:30 PM
	 *
	 * Copyright of Zaycon Fresh, LLC.
	 */

	namespace Zaycon\Whatcounts_Rest\Models;


	/**
	 * Class Subscriber
	 * @package Whatcounts_Rest
	 */
	class Unsubscribes
	{
		/**
		 * @var array $subscribers
		 */
		private $subscribers;

		/**
		 * @var integer $unsubscribe_total
		 */
		private $unsubscribe_total;

		/**
		 * Unsubscribes constructor.
		 *
		 * @param \stdClass|NULL $unsubscribes_response
		 * @param null           $time_zone
		 */
		public function __construct(\stdClass $unsubscribes_response = NULL, $time_zone = NULL)
		{
			if (isset($unsubscribes_response))
			{
				$this
					->setSubscribers($unsubscribes_response->subscribers, $time_zone)
					->setUnsubscribeTotal($unsubscribes_response->unsubscribeTotal);
			}
		}

		/**
		 * Gets the private variable subscribers
		 *
		 * @return array
		 */
		public function getSubscribers()
		{
			return $this->subscribers;
		}

		/**
		 * Sets the private variable subscribers
		 *
		 * @param $subscribers_array
		 * @param $time_zone
		 *
		 * @return $this
		 */
		public function setSubscribers($subscribers_array, $time_zone)
		{
			$subscribers = array();
			foreach ($subscribers_array as $subscriber_item)
			{
				$subscriber = new Subscriber($subscriber_item, $time_zone);
				$subscribers[] = $subscriber;
			}
			$this->subscribers = $subscribers;

			return $this;
		}

		/**
		 * Gets the private variable unsubscribe_total
		 *
		 * @return int
		 */
		public function getUnsubscribeTotal()
		{
			return $this->unsubscribe_total;
		}

		/**
		 * Sets the private variable unsubscribe_total
		 *
		 * @param int $unsubscribe_total
		 *
		 * @return Unsubscribes
		 */
		public function setUnsubscribeTotal($unsubscribe_total)
		{
			$this->unsubscribe_total = (int)$unsubscribe_total;

			return $this;
		}




	}