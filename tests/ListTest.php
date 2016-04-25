<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/20/16
	 * Time: 4:22 PM
	 */

	class ListTest extends \PHPUnit_Framework_TestCase
	{
		const ENV = 'development';
		
		private $whatcounts;
		private $list;
		private $lists;
		private $time_zone;

		public function setUp()
		{
			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			PHPUnit_Framework_Error_Notice::$enabled = FALSE;

			$this->list = new \ZayconWhatCounts\MailingList();
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

			$this->whatcounts->createList($this->list);

			$this->time_zone = new DateTimeZone('America/Los_Angeles');
		}

		public function tearDown()
		{
			unset($this->lists);

			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			if (isset($this->list))
			{
				$this->whatcounts->deleteList($this->list);
				unset($this->list);
			}
		}

		public function testGetLists()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->lists = $whatcounts->getLists();

			$this->assertInternalType('array',$this->lists);

			foreach ($this->lists as $list)
			{
				/** @var ZayconWhatCounts\MailingList $list */
				$this->assertInstanceOf('ZayconWhatCounts\MailingList', $list);
			}
		}

		public function testGetListById()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$this->assertInstanceOf('ZayconWhatCounts\MailingList', $list);
		}

		public function testGetListByName()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\MailingList $list */
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
			/** @var ZayconWhatCounts\MailingList $list */
			$list = $this->list;

			$this->assertObjectHasAttribute('id', $list);
			$this->assertAttributeInternalType('int', 'id', $list);

			$this->assertObjectHasAttribute('created_date', $list);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $list->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateList()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$list->setName('Unit Test List (updated)');

			$whatcounts->updateList($list);

			$this->assertObjectHasAttribute('updated_date', $list);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $list->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteList()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\MailingList $list */
			$list = $this->list;

			$list = $whatcounts->getListById($list->getId());

			$is_deleted = $whatcounts->deleteList($list);

			$this->assertTrue($is_deleted);

			unset($this->list);
		}
	}
