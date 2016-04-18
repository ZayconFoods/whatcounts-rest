<?php
	/**
	 * Created by PhpStorm.
	 * User: marksimonds
	 * Date: 2/3/16
	 * Time: 2:27 PM
	 */

	require_once('../config.php');

	try
	{
		/* initialize whatcounts */
		$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

		$template_id = 4;
		$template = $whatcounts->getTemplateById($template_id);
		Kint::dump($template);

		$template = new ZayconWhatCounts\Template;
		$template
			->setName("Another Test Template")
			->setSubject("Another Test from WhatCounts (updated)")
			->setDataPlaintext("(updated) Hello %%set salutation = \$customSalutation%%%%\$salutation%% %%set last_name = \$customLastname%%%%\$last_name%%!")
			->setDataHtml("<html><head><title></title></head><body><h2>(updated) Hello %%set salutation = \$customSalutation%%%%\$salutation%% %%set last_name = \$customLastname%%%%\$last_name%%!</h2></body></html>")
			->setDescription("This is the description (updated)");
		$whatcounts->updateTemplate($template);

		$whatcounts->handleDump($template);
	}
	catch (Exception $e)
	{
		$whatcounts->handleException($e);
	}