<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 11:39 AM
	 */
	
	namespace ZayconWhatCounts;

	use Faker;
	
	class SubscriberTest extends WhatCountsTest
	{
		private $subscriber;
		private $subscribers;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			$faker = $this->faker;

			$person = new Faker\Provider\en_US\Person($faker);
			$address = new Faker\Provider\en_US\Address($faker);
			$company = new Faker\Provider\en_US\Company($faker);
			$phone = new Faker\Provider\en_US\PhoneNumber($faker);

			$this->subscriber = new Subscriber();
			$this->subscriber
				->setEmail(uniqid() . "@example.com")
				->setFirstName($person->firstName())
				->setLastName($person->lastName())
				->setCompany($company->company())
				->setAddress1($address->buildingNumber() . ' ' . $address->streetName())
				->setAddress2($address->secondaryAddress())
				->setCity($address->city())
				->setState($address->stateAbbr())
				->setZip($address->postcode())
				->setCountry("United States")
				->setPhone($phone->phoneNumber())
				->setFax($phone->phoneNumber());

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
				$whatcounts->deleteSubscriberById($this->subscriber);
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
		
		public function testGetSubscriberByEmail()
		{
			
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

			$is_deleted = $whatcounts->deleteSubscriberById($subscriber);

			$this->assertTrue($is_deleted);

			unset($this->subscriber);
		}

		public function testBulkCreateSubscriber()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Subscriber $subscriber */
			//$subscriber = &$this->subscriber;
			$faker = $this->faker;
			
			$subscriberIds = Array();

			for ($i=0; $i<100; $i++)
			{
				$person = new Faker\Provider\en_US\Person($faker);
				$address = new Faker\Provider\en_US\Address($faker);
				$company = new Faker\Provider\en_US\Company($faker);
				$phone = new Faker\Provider\en_US\PhoneNumber($faker);

				$subscriber = new Subscriber();
				$subscriber
					->setEmail(uniqid() . "@example.com")
					->setFirstName($person->firstName())
					->setLastName($person->lastName())
					->setCompany($company->company())
					->setAddress1($address->buildingNumber() . ' ' . $address->streetName())
					->setAddress2($address->secondaryAddress())
					->setCity($address->city())
					->setState($address->stateAbbr())
					->setZip($address->postcode())
					->setCountry("United States")
					->setPhone($phone->phoneNumber())
					->setFax($phone->phoneNumber());

				$whatcounts->createSubscriber($subscriber);
				$subscriberIds[] = $subscriber->getId();
			}
			
			for ($i=0; $i<100; $i++)
			{
				$subscriber = $whatcounts->getSubscriberById($subscriberIds[$i]);
				$whatcounts->deleteSubscriberById($subscriber);
			}

		}
	}
