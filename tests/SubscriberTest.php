<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 11:39 AM
	 */
	
	namespace ZayconWhatCounts;
	
	class SubscriberTest extends WhatCountsTest
	{
		private $subscriber;
		private $subscribers;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->subscriber = new Subscriber();
			$this->subscriber
				->setEmail(uniqid() . "@example.com")
				->setFirstName("Test")
				->setLastName("User")
				->setCompany("Test Company")
				->setAddress1("1234 Main St.")
				->setAddress2("#1")
				->setCity("Anytown")
				->setState("WA")
				->setZip("00000")
				->setCountry("United States")
				->setPhone("800-555-1212")
				->setFax("800-555-1313");

			$whatcounts->createSubscriber($this->subscriber);
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			unset($this->subscribers);

			if (isset($this->subscriber))
			{
				$whatcounts->deleteSubscriber($this->subscriber);
				unset($this->subscriber);
			}
		}

		public function testGetSubscribers()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->subscribers = $whatcounts->getSubscribers();

			$this->assertInternalType('array',$this->subscribers);

			foreach ($this->subscribers as $subscriber)
			{
				/** @var Subscriber $subscriber */
				$this->assertInstanceOf('ZayconWhatCounts\Subscriber', $subscriber);
			}
		}

		public function testGetSubscriberById()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Subscriber', $subscriber);
		}

		public function testCreateSubscriber()
		{
			/** @var Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$this->assertObjectHasAttribute('id', $subscriber);
			$this->assertAttributeInternalType('int', 'id', $subscriber);

			$this->assertObjectHasAttribute('created_date', $subscriber);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $subscriber->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateSubscriber()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$subscriber->setFirstName('Firstname');

			$whatcounts->updateSubscriber($subscriber);

			$this->assertObjectHasAttribute('updated_date', $subscriber);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $subscriber->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteSubscriber()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Subscriber $subscriber */
			$subscriber = &$this->subscriber;

			$subscriber = $whatcounts->getSubscriberById($subscriber->getId());

			$is_deleted = $whatcounts->deleteSubscriber($subscriber);

			$this->assertTrue($is_deleted);

			unset($this->subscriber);
		}
	}
