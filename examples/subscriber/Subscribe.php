<?php
    /**
     * Created by PhpStorm.
     * User: Mark Simonds
     * Date: 4/15/16
     * Time: 4:13 PM
     */

    require_once('../config.php');

//    $mycfg = array(
//        'mydevelopment' => [
//            'version'   => 'v1',
//            'url'       => 'http://wcqa.us/rest',
//            'time_zone' => 'America/Los_Angeles',
//            'realm'     => 'zaycon_qa',
//            'password'  => 'axterref30324'
//    ]);

//    ZayconWhatCounts\Config::append($mycfg);
//    $whatcounts = new ZayconWhatCounts\WhatCounts('mydevelopment');

    ZayconWhatCounts\Config::realm('development', 'zaycon_qa');
    ZayconWhatCounts\Config::password('development', 'axterref30324');


    /* initialize whatcounts */
    $whatcounts = new ZayconWhatCounts\WhatCounts('development');

    try
    {
//        $list = new ZayconWhatCounts\MailingList();
//        $list
//            ->setName('Unit Test List ' . uniqid())
//            ->setFromAddress('test-from@example.com')
//            ->setTemplateId(0)
//            ->setFolderId(0)
//            ->setFromAddress('test-from@example.com')
//            ->setReplyToAddress('test-replyto@example.com')
//            ->setMailFromAddress('test-mailfrom@example.com')
//            ->setDescription('Test List that will be deleted soon.')
//            ->setSubscribeEmailTemplateId(0)
//            ->setUnsubscribeEmailTemplateId(0)
//            ->setConfirmSubs(FALSE)
//            ->setSendCourtesySubsEmail(FALSE)
//            ->setSendCourtesyUnsubsEmail(FALSE)
//            ->setAdminEmail('test-admin@example.com')
//            ->setConfirmationSubGoto('test-subscribe@example.com')
//            ->setConfirmationUnsubGoto('test-unsubscribe@example.com')
//            ->setTrackingReadEnabled(TRUE)
//            ->setTrackingClickthroughEnabled(TRUE)
//            ->setUseStickyCampaign(FALSE)
//            ->setFtafUseListFromAddress(FALSE)
//            ->setVmtaId(0)
//            ->setBaseUrlId(0)
//            ->setUnsubscribeHeaderEnabled(TRUE)
//            ->setParentTemplateId(0)
//            ->setIsTemplate(FALSE)
//            ->setDefaultLifecycleCampaignId(0)
//            ->setDefaultLifecycle(FALSE)
//            ->setUnsubHeaderHttpValue('https://www.example.com/unsubscribe/')
//            ->setUnsubHeaderEmailValue('test-unsubscribe@example.com');
//
//        $whatcounts->createList($list);

        $faker = Faker\Factory::create();
        $subscribersToAdd = 20;

        for ($i=0; $i<$subscribersToAdd; $i++) {
            $person = new Faker\Provider\en_US\Person($faker);
            $address = new Faker\Provider\en_US\Address($faker);
            $company = new Faker\Provider\en_US\Company($faker);
            $phone = new Faker\Provider\en_US\PhoneNumber($faker);

            $subscriber = new ZayconWhatCounts\Subscriber();
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

            $whatcounts->handleDump($subscriber);

            $subscription = new ZayconWhatCounts\Subscription();
            $subscription
                //->setListId($list->getId())
                ->setListId(1101)
                ->setSubscriberId($subscriber->getId());

            $whatcounts->createSubscription($subscription);
        }
    }
    catch (Exception $e)
    {
        $whatcounts->handleException($e);
    }