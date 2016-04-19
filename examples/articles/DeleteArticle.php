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

		$article = new ZayconWhatCounts\Article;
		$article
			->setName("Another Test Article")
			->setDescription("This is the description");

		$whatcounts->createArticle($article);

		if ($whatcounts->deleteArticle($article))
		{
			echo "Article deleted";
		}
		else
		{
			echo "Article not deleted.";
		}
		
		$whatcounts->handleDump($article);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}