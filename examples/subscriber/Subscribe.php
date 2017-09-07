<?php
    /**
     * Created by PhpStorm.
     * User: Mark Simonds
     * Date: 4/15/16
     * Time: 4:13 PM
     */

    require_once('../config.php');

    Zaycon\Whatcounts_Rest\Config::realm('zaycon_qa', 'development');
    Zaycon\Whatcounts_Rest\Config::password('axterref30324', 'development');

    /* initialize whatcounts */
    $whatcounts = new Zaycon\Whatcounts_Rest\WhatCounts('development');

    function createList(&$whatcounts)
    {
        $list = new Zaycon\Whatcounts_Rest\Models\MailingList();
        $list
            ->setName('Unit Test List ' . uniqid())
            ->setFromAddress('test-from@example.com')
            ->setTemplateId(0)
            ->setFolderId(0)
            ->setFromAddress('test-from@example.com')
            ->setReplyToAddress('test-replyto@example.com')
            ->setMailFromAddress('test-mailfrom@example.com')
            ->setDescription('Test List that will be deleted soon.')
            ->setSubscribeEmailTemplateId(0)
            ->setUnsubscribeEmailTemplateId(0)
            ->setConfirmSubs(FALSE)
            ->setSendCourtesySubsEmail(FALSE)
            ->setSendCourtesyUnsubsEmail(FALSE)
            ->setAdminEmail('test-admin@example.com')
            ->setConfirmationSubGoto('test-subscribe@example.com')
            ->setConfirmationUnsubGoto('test-unsubscribe@example.com')
            ->setTrackingReadEnabled(TRUE)
            ->setTrackingClickthroughEnabled(TRUE)
            ->setUseStickyCampaign(FALSE)
            ->setFtafUseListFromAddress(FALSE)
            ->setVmtaId(0)
            ->setBaseUrlId(0)
            ->setUnsubscribeHeaderEnabled(TRUE)
            ->setParentTemplateId(0)
            ->setIsTemplate(FALSE)
            ->setDefaultLifecycleCampaignId(0)
            ->setDefaultLifecycle(FALSE)
            ->setUnsubHeaderHttpValue('https://www.example.com/unsubscribe/')
            ->setUnsubHeaderEmailValue('test-unsubscribe@example.com');

        $whatcounts->createList($list);

        return $list;
    }
    function createSubscriber(&$whatcounts, $faker)
    {
        $person = new Faker\Provider\en_US\Person($faker);
        $address = new Faker\Provider\en_US\Address($faker);
        $company = new Faker\Provider\en_US\Company($faker);
        $phone = new Faker\Provider\en_US\PhoneNumber($faker);

        $subscriber = new Zaycon\Whatcounts_Rest\Models\Subscriber();
        $subscriber
            ->setEmail(uniqid() . "@example.com")
            ->setFirstName($person->firstName())
            ->setLastName($person->lastName())
            ->setCompany($company->company())
            ->setAddress1($address->buildingNumber() . ' ' . $address->streetName())
            ->setAddress2($address->secondaryAddress())
            ->setCity($address->city())
            ->setState($address->stateAbbr())
            ->setZip($address->postcode())
            ->setCountry("United States")
            ->setPhone($phone->phoneNumber())
            ->setFax($phone->phoneNumber());

        $whatcounts->createSubscriber($subscriber);

        return $subscriber;
    }
    function createSubscription(&$whatcounts, $subscriber)
    {
        $subscription = new Zaycon\Whatcounts_Rest\Models\Subscription();
        $subscription
            //->setListId($list->getId())
            ->setListId(1101)
            ->setSubscriberId($subscriber->getId());

        $whatcounts->createSubscription($subscription);
    }

    try
    {
//        createList($whatcounts);

//        $faker = Faker\Factory::create();
//        $subscribersToAdd = 2;
//
//        for ($i=0; $i<$subscribersToAdd; $i++) {
//            $subscriber = createSubscriber($whatcounts, $faker);
//            createSubscription($whatcounts, $subscriber);
//        }
//        echo $subscribersToAdd . " subscribers created.";

        $list = $whatcounts->getListById(1101);
        $page = 0;
        $subscribers = array();

        do
        {
            $subscribersPage = $whatcounts->getSubscribersForList($list, $page * 500);
            $page++;
            $subscribers = array_merge($subscribersPage, $subscribers);

            /** @var \Zaycon\Whatcounts_Rest\Models\Subscriber $subscriberToCheck */
            $subscriberToCheck = $subscribersPage[0];
        }
        while ($subscriberToCheck->getSkip() % 500 == 0 );

        echo "<pre>";
        $count = 1;
        foreach ($subscribers as $subscriber)
        {
            echo $count . ': ' . $subscriber->getId() . PHP_EOL;
            $count++;
        }
        echo "</pre>";

    }
    catch (Exception $e)
    {
        $whatcounts->handleException($e);
    }

