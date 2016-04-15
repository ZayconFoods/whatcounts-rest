<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 4/15/16
 * Time: 10:10 AM
 */

require_once('../config.php');

try
{
    /* initialize whatcounts */
    $whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$list_id = 9;
    $list = $whatcounts->getListById($list_id);
    $list->setName('Yet Another Test List (updated)');

    $whatcounts->updateList($list);
	if (class_exists('Kint')) {
		Kint::dump($list);
	} else {
		var_dump($list);
	}
}
catch (GuzzleHttp\Exception\ServerException $e)
{
	if (class_exists('Kint')) {
		Kint::dump($e);
	} else {
		var_dump($e);
	}

}	catch ( GuzzleHttp\Exception\RequestException $e )
{
	if (class_exists('Kint')) {
		Kint::dump($e);
	} else {
		var_dump($e);
	}
}
