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
	if (class_exists('Kint')) {
		Kint::dump($list);
	} else {
		var_dump($list);
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
