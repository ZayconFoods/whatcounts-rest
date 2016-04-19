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
		public function getCampaigns()
		{
			/** @var WhatCounts $this */
			$response_data = $this->call('campaigns/', 'GET');

			$campaigns = array();

			foreach ($response_data as $campaign_response) {
				$campaign = new Campaign($campaign_response);
				$campaigns[] = $campaign;
			}

			return $campaigns;

		}
	}