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
         * @param bool $retry
         * @param bool $do_async
         *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getCampaigns($retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->getAll($this->campaign_stub, $this->campaign_class_name, $retry, $do_async);
		}

		/**
		 * @param $campaign_id
         * @param bool $retry
         * @param bool $do_async
         *
         * @return mixed
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
        public function getCampaignById($campaign_id, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->getById($this->campaign_stub, $this->campaign_class_name, $campaign_id, $retry, $do_async);
		}

        /**
         * Get Campaigns with a start date between two dates. Dates passed in must be strings in format Y-m-d.
         * @param string $start_date
         * @param string $end_date
         * @param bool $retry
         * @param bool $do_async
         *
         * @return mixed
         *
         * @throws \GuzzleHttp\Exception\ServerException
         * @throws \GuzzleHttp\Exception\RequestException
         */
        public function getCampaignsByDateRange($start_date, $end_date = NULL, $retry = TRUE, $do_async = FALSE)
        {
            $whatcounts = $this;

            if ( is_null($end_date) )
            {
                $end_date = date('Y-m-d');
            }

            $campaign_stub = $this->campaign_stub . "?start=$start_date&end=$end_date";

            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
            return $whatcounts->getAll($campaign_stub, $this->campaign_class_name, $retry, $do_async);
        }

        /**
         * @param Models\Campaign $campaign
         * @param Models\MailingList $list
         * @param Models\Subscriber $subscriber
         * @param Models\Template|null $template
         * @param bool $retry
         * @param bool $do_async
         *
         * @return mixed
         */
		public function sendSingleCampaign(Models\Campaign $campaign, Models\MailingList $list, Models\Subscriber &$subscriber, Models\Template $template = NULL, $retry = FALSE, $do_async = FALSE)
        {
            $whatcounts = $this;

            $transactional_campaign = (object) [
                'campaignName' => $campaign->getName(),
                'campaignForcedFormat' => $campaign->getForcedFormat(),
                'campaignListId' => $list->getId(),
                'campaignTemplateId' => $template->getId(),
                'subscribers' => array(
                    (object) ['email' => $subscriber->getEmail()]
                )
            ];

            return $whatcounts->create($this->campaign_stub, $transactional_campaign, $retry, $do_async);
        }

        /**
         * @param $campaign_name
         * @param $list_id
         * @param $template_id
         * @param $email
         * @param bool $retry
         * @param bool $do_async
         *
         * @return mixed
         */
        public function quickSendSingleCampaign($campaign_name, $list_id, $template_id, $email, $retry = FALSE, $do_async = FALSE)
        {
            $whatcounts = $this;

            $quick_transactional_campaign = (object) [
                'campaignName' => $campaign_name,
                'campaignForcedFormat' => 99,
                'campaignListId' => $list_id,
                'campaignTemplateId' => $template_id,
                'subscribers' => array(
                    (object) ['email' => $email]
                )
            ];

            return $whatcounts->create($this->campaign_stub, $quick_transactional_campaign, $retry, $do_async);
        }

        /*
         * Deploy a campaign to a List with optional Segmentation Rule and supplying a template or using the
         * default template with a list:
         *
         * example Deploy Campaign Object
         *  {
         *      campaignName : "dennis_rest_test",
         *      campaignListId : 1945
         *  }
         *
         * In the Deploy Campaign you are required to have campaignListId or campaignListName.
         *
         * If no campaignTemplateId or campaignTemplateName is supplied the default template for the list will be used.
         */
        public function sendCampaign()
        {

        }

        public function getOpenActivity($campaign_id, $retry = TRUE, $do_async = FALSE)
        {
            $whatcounts = $this;
            /** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
            return $whatcounts->getById($this->campaign_stub, $this->campaign_class_name, $campaign_id, $retry, $do_async);
        }

	}