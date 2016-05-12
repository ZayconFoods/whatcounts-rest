<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/22/16
	 * Time: 1:14 PM
	 */

	namespace ZayconWhatCounts;


	class Config
	{

		private static $config;

		public static function getInstance()
		{
			if (NULL === self::$config) {
				self::$config = [
					'production'  => [
						'version'   => 'v1',
						'url'       => 'http://wcqa.us/rest',
						'time_zone' => 'America/Los_Angeles',
						'realm'     => 'your_production_realm',
						'password'  => 'your_password'
					],
					'development' => [
						'version'   => 'v1',
						'url'       => 'http://wcqa.us/rest',
						'time_zone' => 'America/Los_Angeles',
						'realm'     => 'your_development_realm',
						'password'  => 'your_password'
					]
				];
			}

			return self::$config;
		}

		public static function get($value)
		{
			$cfg = self::getInstance();
			$value = explode('.', $value);

			if (count($value) == 2)
			{
				if (array_key_exists($value[0], $cfg))
				{
					if (array_key_exists($value[1], $cfg[$value[0]]))
					{
						return $cfg[$value[0]][$value[1]];
					}
				}
			}

			return '';
		}

		public static function append($value)
		{
			$cfg = self::getInstance();
			self::$config = array_merge($cfg, $value);
		}

		public static function realm($value, $env = 'production')
		{
			self::getInstance();
			self::$config[$env]['realm'] = $value;
		}

		public static function password($value, $env = 'production')
		{
			self::$config[$env]['password'] = $value;
		}

		protected function __construct() {}
		protected function __clone() {}
		protected function __wakeup() {}
	}
