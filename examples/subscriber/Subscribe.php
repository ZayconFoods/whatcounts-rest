<?php
    /**
     * Created by PhpStorm.
     * User: Mark Simonds
     * Date: 4/15/16
     * Time: 4:13 PM
     */

    require_once('../config.php');

    try
    {
        /* initialize whatcounts */
        $whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

        $subscriber = new ZayconWhatCounts\Subscriber;
        $subscriber
            ->setFirstName("Joe")
            ->setLastName("Smith")
            ->setEmail("joe@example.com")
            ->setAddress1("1234 Main St")
            ->setAddress2("Suite 100")
            ->setCity("Spokane")
            ->setState("WA")
            ->setZip("99201")
            ->setCountry("US")
            ->setPhone("5095551212")
            ->setFax("5095551213")
            ->setCompany("Zaycon");

        $whatcounts->addSubscriber($subscriber);

        $whatcounts->handleDump($subscriber);
    }
    catch (Exception $e)
    {
        $whatcounts->handleException($e);
    }