<?php
	/**
	 * Created by PhpStorm.
	 * Author: Mark Simonds
	 * Date: 5/23/16
	 * Time: 4:08 PM
	 *
	 * Copyright of Zaycon Fresh, LLC.
	 */

	require_once('../config.php');

	/* initialize whatcounts */
	$mycfg = array(
		'mydevelopment' => [
			'version'   => 'v1',
			'url'       => 'http://api.whatcounts.net/rest',
			'time_zone' => 'America/Los_Angeles',
			'realm'     => 'zaycon_marketing',
			'password'  => 'entableu4205'
		]);

	ZayconWhatCounts\Config::append($mycfg);
	$whatcounts = new ZayconWhatCounts\WhatCounts('mydevelopment');

	try
	{
		$list_id = 13;
		$start_date = new DateTime("05/10/16");
		$end_date = new DateTime("05/15/16");

		$list = $whatcounts->getListById($list_id);
		$unsubscribes = $whatcounts->getUnsubscribersForList($list, $start_date, $end_date);
		var_dump($unsubscribes);
		//$whatcounts->handleDump($unsubscribes);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}
