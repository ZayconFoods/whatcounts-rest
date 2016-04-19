<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/19/16
	 * Time: 9:15 AM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$article = $whatcounts->getArticleByName('Test Article');

		$whatcounts->handleDump($article);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}