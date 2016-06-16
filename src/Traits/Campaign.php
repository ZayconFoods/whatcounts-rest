<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:11 PM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;
	
	/**
	 * Class Campaign
	 * @package Whatcounts_Rest
	 */
	trait Campaign
	{
		/**
		 * URL Stub
		 * 
		 * @var string $campaign_stub
		 */
		private $campaign_stub = 'campaigns';

		/**
		 * Campaign Class Name
		 * 
		 * @var string $campaign_class_name
		 */
		private $campaign_class_name = 'Zaycon\Whatcounts_Rest\Models\Campaign';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getCampaigns()
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$campaigns = $whatcounts->getAll($this->campaign_stub, $this->campaign_class_name);
			
			return $campaigns;
		}

		/**
		 * @param $campaign_id
		 *
		 * @return Models\Campaign
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getCampaignById($campaign_id)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$campaign = $whatcounts->getById($this->campaign_stub, $this->campaign_class_name, $campaign_id);

			return $campaign;
		}
	}