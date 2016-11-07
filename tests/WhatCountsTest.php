<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 3:21 PM
	 */

	namespace Zaycon\Whatcounts_Rest;
	
	use Faker;
	
	abstract class WhatCountsTest extends \PHPUnit_Framework_TestCase
	{
		const ENV = 'development';
		public $whatcounts;
		public $time_zone;
		public $faker;
		public $api_timeout_seconds = "10.0";
        public $use_async = TRUE;

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

			$this->faker = Faker\Factory::create();
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