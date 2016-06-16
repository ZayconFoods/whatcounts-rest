<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 10:27 AM
	 */
	
	namespace Zaycon\Whatcounts_Rest;
	
	class CampaignTest extends WhatCountsTest
	{
		private $campaign;
		private $campaigns;

		public function setUp()
		{
			
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			
//			$this->campaign = new Campaign;
//			$this->campaign
//				->setName("Test Campaign")
//				->setTitle("Test from API")
//				->setDescription("This is the description");
//
//			$whatcounts->createCampaign($this->campaign);
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			unset($this->campaigns);

			if (isset($this->campaign))
			{
				//$whatcounts->deleteCampaign($this->campaign);
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

			//$campaign = $whatcounts->getCampaignById($campaign->getId());

			//$this->assertInstanceOf('ZayconWhatCounts\Campaign', $campaign);
		}
	}
