<?php
	/**
	 * Created by PhpStorm.
	 * User: marksimonds
	 * Date: 2/1/16
	 * Time: 3:47 PM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$subscriber_id = 1;
		$subscriber = $whatcounts->getSubscriberById($subscriber_id);

		$subscriber
			->setLastName("Smith Jr.");
		$whatcounts->updateSubscriber($subscriber);
		
		$whatcounts->handleDump($subscriber);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
