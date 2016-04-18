<?php
	/**
	 * Created by PhpStorm.
	 * User: marksimonds
	 * Date: 2/3/16
	 * Time: 2:27 PM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$template = $whatcounts->getTemplateById(1);

		$whatcounts->handleDump($template);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
