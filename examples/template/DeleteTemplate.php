<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 11:35 AM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$template = new ZayconWhatCounts\Template;
		$template
			->setName("Another Test Template")
			->setSubject("Another Test from WhatCounts")
			->setDescription("This is the description");

		$whatcounts->createTemplate($template);

		if ($whatcounts->deleteTemplate($template))
		{
			echo "Template deleted";
		}
		else
		{
			echo "Template not deleted.";
		}
		
		$whatcounts->handleDump($template);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}