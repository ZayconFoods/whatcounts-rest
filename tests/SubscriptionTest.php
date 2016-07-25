<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/26/16
	 * Time: 1:31 PM
	 */

	namespace Zaycon\Whatcounts_Rest;

	class SubscriptionTest extends WhatCountsTest
	{
		private $list;
		private $subscriber;
		private $subscription;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->list = new Models\MailingList();
			$this->list
				->setName('Unit Test List ' . uniqid())
				->setFromAddress('test-from@example.com')
				->setTemplateId(0)
				->setFolderId(0)
				->setFromAddress('test-from@example.com')
				->setReplyToAddress('test-replyto@example.com')
				->setMailFromAddress('test-mailfrom@example.com')
				->setDescription('Test List that will be deleted soon.')
				->setSubscribeEmailTemplateId(0)
				->setUnsubscribeEmailTemplateId(0)
				->setConfirmSubs(FALSE)
				->setSendCourtesySubsEmail(FALSE)
				->setSendCourtesyUnsubsEmail(FALSE)
				->setAdminEmail('test-admin@example.com')
				->setConfirmationSubGoto('test-subscribe@example.com')
				->setConfirmationUnsubGoto('test-unsubscribe@example.com')
				->setTrackingReadEnabled(TRUE)
				->setTrackingClickthroughEnabled(TRUE)
				->setUseStickyCampaign(FALSE)
				->setFtafUseListFromAddress(FALSE)
				->setVmtaId(0)
				->setBaseUrlId(0)
				->setUnsubscribeHeaderEnabled(TRUE)
				->setParentTemplateId(0)
				->setIsTemplate(FALSE)
				->setDefaultLifecycleCampaignId(0)
				->setDefaultLifecycle(FALSE)
				->setUnsubHeaderHttpValue('https://www.example.com/unsubscribe/')
				->setUnsubHeaderEmailValue('test-unsubscribe@example.com');

			$whatcounts->createList($this->list);

			$this->subscriber = new Models\Subscriber();
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


			$this->subscription = new Models\Subscription();
			$this->subscription
				->setListId($this->list->getId())
				->setSubscriberId($this->subscriber->getId())
				->setForceSubscribe(TRUE);

			$whatcounts->createSubscription($this->subscription);
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			if (isset($this->subscription))
			{
				$whatcounts->deleteSubscription($this->subscription);
				unset($this->subscription);
			}

			if (isset($this->subscriber))
			{
				$whatcounts->deleteSubscriberById($this->subscriber);
				unset($this->subscriber);
			}

			if (isset($this->list))
			{
				$whatcounts->deleteList($this->list);
				unset($this->list);
			}
		}

		public function testCreateSubscription()
		{
			/** @var Models\Subscription $subscription */
			$subscription = $this->subscription;

			$this->assertObjectHasAttribute('id', $subscription);
			$this->assertAttributeInternalType('int', 'id', $subscription);

			$this->assertObjectHasAttribute('created_date', $subscription);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $subscription->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', $this->api_timeout_seconds);
		}

		public function testDeleteSubscription()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Models\Subscription $subscription */
			$subscription = $this->subscription;
			/** @var Models\Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$is_deleted = $whatcounts->deleteSubscription($subscription);

			$this->assertTrue($is_deleted);

			$unsubscribers = $whatcounts->getUnsubscribersForList($this->list);
			//$this->assertInternalType('array',$unsubscribers);

			foreach ($unsubscribers as $unsubscriber)
			{
				/** @var Models\Subscriber $unsubscriber $list */
				$this->assertInstanceOf('ZayconWhatCounts\Subscriber', $unsubscriber);
				if ($unsubscriber->getId() == $subscriber->getId())
				{
					$this->assertEquals($unsubscriber->getId(), $subscriber->getId());
				}
			}
			
			unset($this->subscription);
		}

		public function testGetSubscribersForList()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			
			$list = $this->list;

			$subscribers = $whatcounts->getSubscribersForList($list);
			$this->assertInternalType('array',$subscribers);

			foreach ($subscribers as $subscriber)
			{
				/** @var Models\MailingList $list */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Subscriber', $subscriber);
			}

		}
		
		public function testFindSubscribersInList()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			/** @var Models\MailingList $list */
			$list = $this->list;
			/** @var Models\Subscriber $subscriber */
			$subscriber = $this->subscriber;
			
			$email = $subscriber->getEmail();
			$first_name = $subscriber->getFirstName();
			$last_name = $subscriber->getLastName();

			$subscribers = $whatcounts->findSubscribersInList($list, NULL, $email, $first_name, $last_name);
			$this->assertInternalType('array',$subscribers);

			foreach ($subscribers as $subscriber)
			{
				/** @var Models\MailingList $list */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Subscriber', $subscriber);
			}	
		}

		public function testFindSubscribers()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			/** @var Models\Subscriber $subscriber */
			$subscriber = $this->subscriber;

			$email = $subscriber->getEmail();
			$first_name = $subscriber->getFirstName();
			$last_name = $subscriber->getLastName();

			$subscribers = $whatcounts->findSubscribers(NULL, $email, $first_name, $last_name);
			$this->assertInternalType('array',$subscribers);

			foreach ($subscribers as $subscriber)
			{
				/** @var Models\MailingList $list */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Subscriber', $subscriber);
			}
		}

	}
