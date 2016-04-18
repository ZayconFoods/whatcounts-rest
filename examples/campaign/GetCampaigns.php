<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:56 PM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$campaigns = $whatcounts->getCampaigns();

		$whatcounts->handleDump($campaigns);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}