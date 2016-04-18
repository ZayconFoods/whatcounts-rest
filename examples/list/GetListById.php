<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 3/15/16
 * Time: 4:13 PM
 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$list_id = 1;
		$list = $whatcounts->getListById($list_id);

		$whatcounts->handleDump($list);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
