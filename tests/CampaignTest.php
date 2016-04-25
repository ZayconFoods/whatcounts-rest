<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/25/16
	 * Time: 10:27 AM
	 */
	class CampaignTest extends PHPUnit_Framework_TestCase
	{
		const ENV = 'development';

		private $whatcounts;
		private $campaign;
		private $campaigns;
		private $time_zone;

		public function setUp()
		{
			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			PHPUnit_Framework_Error_Notice::$enabled = FALSE;

//			$this->campaign = new ZayconWhatCounts\Campaign;
//			$this->campaign
//				->setName("Unit Test Article")
//				->setTitle("Unit Test from WhatCounts")
//				->setDescription("This is the description");
//
//			$this->whatcounts->createCampaign($this->campaign);

			$this->time_zone = new DateTimeZone($this->whatcounts->getTimeZone());
		}

		public function tearDown()
		{
			unset($this->campaigns);

			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			if (isset($this->campaign))
			{
				//$this->whatcounts->deleteCampaign($this->campaign);
				unset($this->campaign);
			}
		}

		public function testGetCampaigns()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->campaigns = $whatcounts->getCampaigns();

			$this->assertInternalType('array',$this->campaigns);

			foreach ($this->campaigns as $campaign)
			{
				/** @var ZayconWhatCounts\Campaign $campaign */
				$this->assertInstanceOf('ZayconWhatCounts\Campaign', $campaign);
			}
		}

	}
