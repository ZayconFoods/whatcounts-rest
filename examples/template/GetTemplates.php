<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 11:40 AM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$templates = $whatcounts->getTemplates();

		$whatcounts->handleDump($templates);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
