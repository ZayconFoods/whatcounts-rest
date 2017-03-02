<?php
    /**
     * Created by PhpStorm.
     * Author: Mark Simonds
     * Date: 2/2/17
     * Time: 10:58 AM
     *
     * Copyright 2017 Zaycon Fresh, LLC.
     */

    namespace Zaycon\Whatcounts_Rest;

    class WhatCountsException extends \Exception
    {
        public function __construct( $message = "", $code = 0, \Exception $previous = NULL )
        {
            parent::__construct( $message, $code, $previous );
        }

        public function __toString()
        {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
            // parent::__toString();
        }

        /**
         *
         * Exception handler
         *
         * @param $e
         */
        public function handleException($e)
        {
            if (class_exists('Kint')) {
                \Kint::dump($e);
            } else {
                var_dump($e);
            }
            if (class_exists('Rollbar')) {
                \Rollbar::report_exception($e);
            }
        }

    }