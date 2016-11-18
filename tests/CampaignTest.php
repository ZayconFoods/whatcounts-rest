<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 10:27 AM
	 */
	
	namespace Zaycon\Whatcounts_Rest;
	
	use Zaycon\Whatcounts_Rest\Models\Campaign;
    use Zaycon\Whatcounts_Rest\Models\MailingList;

    class CampaignTest extends WhatCountsTest
	{
		private $campaign;
		private $campaigns;

		public function setUp()
		{
			parent::setUp();
		}

		public function tearDown()
		{
			parent::tearDown();

			unset($this->campaigns);

			if (isset($this->campaign))
			{
				unset($this->campaign);
			}
		}

		public function testGetCampaigns()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->campaigns = $whatcounts->getCampaigns();

			$this->assertInternalType('array',$this->campaigns);

			foreach ($this->campaigns as $campaign)
			{
				/** @var Models\Campaign $campaign */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Campaign', $campaign);
			}
		}

		public function testGetCampaignById()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Models\Campaign $campaign */
			$campaign = $this->campaign;

			$campaign = $whatcounts->getCampaignById($campaign->getId());

			$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Campaign', $campaign);
		}

		public function testSendSingleCampaign()
        {
            /** @var WhatCounts $whatcounts */
            $whatcounts = $this->whatcounts;

            $campaign = new Campaign();
            $campaign
                ->setName('Single Campaign Test')
                ->setForcedFormat(99);

            $list = $whatcounts->getListById(34);
            $subscriber = $whatcounts->findSubscribers(NULL, 'mark@zayconfresh.com');
            $subscriber = $subscriber[0];
            $template = $whatcounts->getTemplateById(75);

            $sendSingleCampaign = new Campaign($sendSingleCampaign = $whatcounts->sendSingleCampaign($campaign, $list, $subscriber, $template));
            $this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Campaign', $sendSingleCampaign);
        }

        public function testQuickSendSingleCampaign()
        {
            /** @var WhatCounts $whatcounts */
            $whatcounts = $this->whatcounts;

            $campaign_name = 'Quick Single Campaign Test';
            $list_id = 34;
            $template_id = 75;
            $to_email = 'mark@zayconfresh.com';

            $quickSendSingleCampaign = new Campaign($whatcounts->quickSendSingleCampaign($campaign_name, $list_id, $template_id, $to_email));
            $this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\Campaign', $quickSendSingleCampaign);
        }
	}
