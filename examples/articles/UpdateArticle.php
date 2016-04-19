<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/19/16
	 * Time: 9:15 AM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$article_id = 1;
		$article = $whatcounts->getArticleById($article_id);
		Kint::dump($article);

		$article
			->setName("Another Test Article")
			->setDescription("This is the description (updated)");
		$whatcounts->updateArticle($article);

		$whatcounts->handleDump($article);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}