<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/20/16
	 * Time: 4:22 PM
	 */

	namespace ZayconWhatCounts;
	
	class ListTest extends WhatCountsTest
	{
		private $list;
		private $lists;

		public function setUp()
		{
			parent::setUp();
			
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			
			$this->list = new MailingList();
			$this->list
				->setName('Unit Test List')
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
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			unset($this->lists);

			if (isset($this->list))
			{
				$whatcounts->deleteList($this->list);
				unset($this->list);
			}
		}

		public function testGetLists()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->lists = $whatcounts->getLists();

			$this->assertInternalType('array',$this->lists);

			foreach ($this->lists as $list)
			{
				/** @var MailingList $list */
				$this->assertInstanceOf('ZayconWhatCounts\MailingList', $list);
			}
		}

		public function testGetListById()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$this->assertInstanceOf('ZayconWhatCounts\MailingList', $list);
		}

		public function testGetListByName()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var MailingList $list */
			$list = $this->list;

			$this->lists = $whatcounts->getListByName($list->getName());

			$this->assertInternalType('array',$this->lists);

			foreach ($this->lists as $list)
			{
				$this->assertInstanceOf('ZayconWhatCounts\MailingList', $list);
			}
		}

		public function testCreateList()
		{
			/** @var MailingList $list */
			$list = $this->list;

			$this->assertObjectHasAttribute('id', $list);
			$this->assertAttributeInternalType('int', 'id', $list);

			$this->assertObjectHasAttribute('created_date', $list);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $list->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateList()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$list->setName('Unit Test List (updated)');

			$whatcounts->updateList($list);

			$this->assertObjectHasAttribute('updated_date', $list);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $list->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteList()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$is_deleted = $whatcounts->deleteList($list);

			$this->assertTrue($is_deleted);

			unset($this->list);
		}
	}
