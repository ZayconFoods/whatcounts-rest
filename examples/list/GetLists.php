<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/25/16
 * Time: 4:13 PM
 */

	require_once('../config.php');

	Zaycon\Whatcounts_Rest\Config::realm('zaycon_qa', 'development');
	Zaycon\Whatcounts_Rest\Config::password('axterref30324', 'development');

	/* initialize whatcounts */
	$whatcounts = new Zaycon\Whatcounts_Rest\WhatCounts('development');

	try
	{
		$lists = $whatcounts->getLists();
		$whatcounts->handleDump($lists);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
