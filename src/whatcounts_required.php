<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 4/15/16
 * Time: 1:43 PM
 */

spl_autoload_register(function($class)
{
	$class = str_replace('ZayconWhatCounts\\', '', $class);
	$trait = str_replace('Traits', '', $class);

	if (file_exists(__DIR__.'/ZayconWhatCounts/'.$class.'.php'))
	{
		require_once(__DIR__.'/ZayconWhatCounts/'.$class.'.php');
	}

	if (file_exists(__DIR__.'/ZayconWhatCounts/Models/'.$class.'.php'))
	{
		require_once(__DIR__.'/ZayconWhatCounts/Models/'.$class.'.php');
	}

	if (file_exists(__DIR__.'/ZayconWhatCounts/Traits/'.$trait.'.php'))
	{
		require_once(__DIR__.'/ZayconWhatCounts/Traits/'.$trait.'.php');
	}

});