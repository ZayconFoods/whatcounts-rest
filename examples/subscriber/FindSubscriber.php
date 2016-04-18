<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 4:13 PM
	 */

	require_once('../config.php');

	try
	{
	    /* initialize whatcounts */
	    $whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	    $subscriber = new ZayconWhatCounts\Subscriber;
	    $subscriber
		    ->setEmail("joe@example.com");

	    $subscribers = $whatcounts->getSubscribers($subscriber);

		$whatcounts->handleDump($subscribers);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
