<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 10:27 AM
	 */
	
	namespace ZayconWhatCounts;
	
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
				/** @var Campaign $campaign */
				$this->assertInstanceOf('ZayconWhatCounts\Campaign', $campaign);
			}
		}

		public function testGetCampaignById()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Campaign $campaign */
			$campaign = $this->campaign;

			//$campaign = $whatcounts->getCampaignById($campaign->getId());

			//$this->assertInstanceOf('ZayconWhatCounts\Campaign', $campaign);
		}
	}
