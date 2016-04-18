<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 10:55 AM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$list_id = 2;
		$list = $whatcounts->getListById($list_id);

		if ($whatcounts->deleteList($list))
		{
			echo "List deleted";
		}
		else
		{
			echo "List not deleted.";
		}

	}
	catch (Exception $e)
	{
		if (class_exists('Kint')) {
			Kint::dump($e);
		} else {
			var_dump($e);
		}
	}

