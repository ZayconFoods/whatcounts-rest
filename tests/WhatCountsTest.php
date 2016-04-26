<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 3:21 PM
	 */

	namespace ZayconWhatCounts;
	
	abstract class WhatCountsTest extends \PHPUnit_Framework_TestCase
	{
		const ENV = 'development';
		public $whatcounts;
		public $time_zone;

		public function setUp()
		{
			if (isset($_SERVER['realm']) && isset($_SERVER['password']))
			{
				$this->whatcounts = new WhatCounts(self::ENV, $_SERVER['realm'], $_SERVER['password']);
			}
			else
			{
				$this->whatcounts = new WhatCounts(self::ENV);
			}
			
			\PHPUnit_Framework_Error_Notice::$enabled = FALSE;

			$this->time_zone = new \DateTimeZone($this->whatcounts->getTimeZone());
		}
		
		public function tearDown()
		{
			if (isset($_SERVER['realm']) && isset($_SERVER['password']))
			{
				$this->whatcounts = new WhatCounts(self::ENV, $_SERVER['realm'], $_SERVER['password']);
			}
			else
			{
				$this->whatcounts = new WhatCounts(self::ENV);
			}
		}
	}