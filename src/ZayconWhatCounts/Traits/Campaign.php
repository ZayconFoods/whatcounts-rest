<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:11 PM
	 */

	namespace ZayconWhatCounts;


	trait CampaignTraits
	{
		private $campaign_stub = 'campaigns';
		private $campaign_class_name = 'ZayconWhatCounts\Campaign';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getCampaigns()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$campaigns = $whatcounts->getAll($this->campaign_stub, $this->campaign_class_name);
			
			return $campaigns;
		}
	}