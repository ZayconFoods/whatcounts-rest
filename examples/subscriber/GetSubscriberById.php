<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 2:43 PM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$subscriber_id = 1;

		$subscriber = $whatcounts->getSubscriberById($subscriber_id);

		$whatcounts->handleDump($subscriber);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
