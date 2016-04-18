<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/25/16
 * Time: 4:13 PM
 */

	require_once('../config.php');
	
	try
	{
	    /* initialize whatcounts */
	    $whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );
	
	    $lists = $whatcounts->getLists();

		$whatcounts->handleDump($lists);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
