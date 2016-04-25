<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 11:39 AM
	 */
	class SubscriberTest extends PHPUnit_Framework_TestCase
	{
		const ENV = 'development';

		private $whatcounts;
		private $subscriber;
		private $subscribers;
		private $time_zone;

		public function setUp()
		{
			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			PHPUnit_Framework_Error_Notice::$enabled = FALSE;

			$this->subscriber = new \ZayconWhatCounts\Subscriber();
			$this->subscriber
				->setEmail(uniqid() . '@example.com')
				->setFirstName('Test');

			$this->whatcounts->createSubscriber($this->subscriber);

			$this->time_zone = new DateTimeZone('America/Los_Angeles');
		}

		public function tearDown()
		{
			unset($this->subscribers);

			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			if (isset($this->subscriber))
			{
				$this->whatcounts->deleteSubscriber($this->subscriber);
				unset($this->subscriber);
			}
		}

		public function testGetSubscribers()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->subscribers = $whatcounts->getSubscribers();

			$this->assertInternalType('array',$this->subscribers);

			foreach ($this->subscribers as $subscriber)
			{
				/** @var ZayconWhatCounts\Subscriber $subscriber */
				$this->assertInstanceOf('ZayconWhatCounts\Subscriber', $subscriber);
			}
		}

		public function testGetSubscriberById()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Subscriber', $subscriber);
		}

		public function testCreateSubscriber()
		{
			/** @var ZayconWhatCounts\Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$this->assertObjectHasAttribute('id', $subscriber);
			$this->assertAttributeInternalType('int', 'id', $subscriber);

			$this->assertObjectHasAttribute('created_date', $subscriber);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $subscriber->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateSubscriber()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$subscriber->setFirstName('Firstname');

			$whatcounts->updateSubscriber($subscriber);

			$this->assertObjectHasAttribute('updated_date', $subscriber);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $subscriber->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteSubscriber()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Subscriber $subscriber */
			$subscriber = &$this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$is_deleted = $whatcounts->deleteSubscriber($subscriber);

			$this->assertTrue($is_deleted);

			unset($this->subscriber);
		}
	}
