<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 2:43 PM
	 */

	require_once('../config.php');

	Zaycon\Whatcounts_Rest\Config::realm('zaycon_qa', 'development');
	Zaycon\Whatcounts_Rest\Config::password('axterref30324', 'development');

	/* initialize whatcounts */
	$whatcounts = new Zaycon\Whatcounts_Rest\WhatCounts('mydevelopment');

	try
	{
		$subscriber_id = 3473;
		$subscriberSubscriptions = $whatcounts->getSubscriberAndSubscriptions($subscriber_id);
		$whatcounts->handleDump($subscriberSubscriptions);

		$subscriberEvents = $whatcounts->getSubscriberAndEvents($subscriber_id);
		$whatcounts->handleDump($subscriberEvents);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
