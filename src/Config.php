<?php

namespace Zaycon\Whatcounts_Rest;

/**
 * Class Config
 * @package Whatcounts_Rest
 */
class Config
{

    private static $config;

    /**
     * @return array
     */
    public static function getInstance()
    {
        if (NULL === self::$config) {
            self::$config = [
                'production'  => [
                    'version'   => 'v1',
                    'url'       => 'https://api.whatcounts.net/rest',
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

    /**
     * @param $value
     *
     * @return string
     */
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

    /**
     * @param $value
     */
    public static function append($value)
    {
        $cfg = self::getInstance();
        self::$config = array_merge($cfg, $value);
    }

    /**
     * @param $value
     * @param string $env
     */
    public static function realm($value, $env = 'production')
    {
        self::getInstance();
        self::$config[$env]['realm'] = $value;
    }

    /**
     * @param $value
     * @param string $env
     */
    public static function password($value, $env = 'production')
    {
        self::$config[$env]['password'] = $value;
    }

    /**
     * Config constructor.
     * Preventing overrides.
     */
    protected function __construct() {}

    /**
     * Config cloner.
     * Preventing overrides.
     *
     */
    protected function __clone() {}

    /**
     * Config wakeup.
     * Preventing overrides.
     */
    protected function __wakeup() {}
}
