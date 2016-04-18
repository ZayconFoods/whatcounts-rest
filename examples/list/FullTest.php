<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 11:17 AM
	 */

	require_once('../config.php');


	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$list = new ZayconWhatCounts\MailingList;
		$list
			->setRealmId(30324)
			->setTemplateId(0)
			->setName('Another Test List')
			->setFolderId(0)
			->setFromAddress('mark@zayconfresh.com')
			->setReplyToAddress('it@zayconfresh.com')
			->setMailFromAddress('tony@zayconfresh.com')
			->setDescription('Test List that will be deleted soon.')
			->setSubscribeEmailTemplateId(0)
			->setUnsubscribeEmailTemplateId(0)
			->setConfirmSubs(FALSE)
			->setSendCourtesySubsEmail(FALSE)
			->setSendCourtesyUnsubsEmail(FALSE)
			->setAdminEmail('it@zayconfresh.com')
			->setConfirmationSubGoto('mark@zayconfresh.com')
			->setConfirmationUnsubGoto('mark@zayconfresh.com')
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
			->setUnsubHeaderHttpValue('https://www.zayconfresh.com/unsubscribe/')
			->setUnsubHeaderEmailValue('unsubscribe@zayconfresh.com');

		$whatcounts->createList($list);

		$list_id = $list->getId();

		$whatcounts->handleDump($list);

		sleep(10);

		$updated_list = $whatcounts->getListById($list_id);
		$updated_list->setName('Test List that will be deleted soon (updated).');
		$whatcounts->updateList($updated_list);

		$whatcounts->handleDump($updated_list);

		$deleted_list = $whatcounts->getListById($list_id);
		if ($whatcounts->deleteList($deleted_list))
		{
			echo "List deleted";
		}
		else
		{
			echo "List not deleted.";
		}



	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}

