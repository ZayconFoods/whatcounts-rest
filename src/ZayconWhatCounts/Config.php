<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/22/16
	 * Time: 1:14 PM
	 */

	namespace ZayconWhatCounts;


	class Config {

		public $config;

		function __construct()
		{
			$this->config = [
				'production' => [
					'version' => 'v1',
					'url' => 'http://wcqa.us/rest',
					'time_zone' => 'America/Los_Angeles',
					'realm' => 'your_production_realm',
					'password' => 'your_password'
				],
				'development' => [
					'version' => 'v1',
					'url' => 'http://wcqa.us/rest',
					'time_zone' => 'America/Los_Angeles',
					'realm' => 'your_test_realm',
					'password' => 'your_password'
				]
			];
		}

		/* access config values like this: Config::get('db.username'); */

		public static function get($value)
		{
			$cfg = new Config;
			$value = explode('.', $value);

			if (count($value) == 2)
			{
				if (array_key_exists($value[0], $cfg->config))
				{
					if (array_key_exists($value[1], $cfg->config[$value[0]]))
					{
						return $cfg->config[$value[0]][$value[1]];
					}
				}
			}

			return '';
		}

	}