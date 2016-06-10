<?php
	/**
	 * Created by PhpStorm.
	 * User: marksimonds
	 * Date: 1/25/16
	 * Time: 1:13 PM
	 */

	require_once( dirname( __DIR__ ) . '/vendor/autoload.php');

	spl_autoload_register(function($class)
	{
		$class = str_replace('ZayconWhatCounts\\', '', $class);
		$trait = str_replace('Traits', '', $class);

		if (file_exists(__DIR__.'/../src/ZayconWhatCounts/'.$class.'.php'))
		{
			/** @noinspection PhpIncludeInspection */
			require_once(__DIR__.'/../src/ZayconWhatCounts/'.$class.'.php');
		}

		if (file_exists(__DIR__.'/../src/ZayconWhatCounts/Models/'.$class.'.php'))
		{
			/** @noinspection PhpIncludeInspection */
			require_once(__DIR__.'/../src/ZayconWhatCounts/Models/'.$class.'.php');
		}

		if (file_exists(__DIR__.'/../src/ZayconWhatCounts/Traits/'.$trait.'.php'))
		{
			/** @noinspection PhpIncludeInspection */
			require_once(__DIR__.'/../src/ZayconWhatCounts/Traits/'.$trait.'.php');
		}

		if (file_exists(__DIR__.'/../tests/'.$class.'.php'))
		{
			/** @noinspection PhpIncludeInspection */
			require_once(__DIR__.'/../tests/'.$class.'.php');
		}
	});
