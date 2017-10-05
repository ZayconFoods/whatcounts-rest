<?php

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
    }

    /**
     *
     * Exception handler
     *
     * @param $e
     */
    public function handleException($e)
    {
        var_dump($e);
    }
}