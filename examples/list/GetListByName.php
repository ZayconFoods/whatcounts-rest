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
	
		$list_name = "Test List";
		$list = $whatcounts->getListByName($list_name);

		$whatcounts->handleDump($list);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
