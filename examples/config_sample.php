<?php
	/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 3/15/16
 * Time: 2:31 PM
 *
 * Copy to config.php and input your realm and password for testing
 */

	error_reporting( E_ALL );
	ini_set( 'display_errors', 1 );

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


	define( 'WC_REALM', '[YOUR_REALM]');
	define( 'WC_PASSWORD', '[YOUR_PASSWORD]' );
