<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace Zaycon\Whatcounts_Rest\Models;


	/**
	 * Class Campaign
	 * @package Whatcounts_Rest
	 */
	class Campaign
	{
		/**
		 * campaignSummary object from API
		 *
		 * @var object $campaign_summary
		 */
		private $campaign_summary;

		/**
		 * segmentType field from API
		 *
		 * @var integer $segment_type
		 */
		private $segment_type;

		/**
		 * isSass field from API
		 *
		 * @var boolean $is_saas
		 */
		private $is_saas;

		/**
		 * snaEnabled field from API
		 *
		 * @var boolean $sna_enabled
		 */
		private $sna_enabled;

		/**
		 * campaignContentHtml field from API
		 *
		 * @var string $content_html
		 */
		private $content_html;

		/**
		 * campaignContentMobile field from API
		 *
		 * @var string $content_mobile
		 */
		private $content_mobile;

		/**
		 * campaignDataXml field from API
		 *
		 * @var \SimpleXMLElement $data_xml
		 */
		private $data_xml;

		/**
		 * campaignContentText field from API
		 *
		 * @var string $content_text
		 */
		private $content_text;

		/**
		 * campaignId field from API
		 *
		 * @var integer $id
		 */
		private $id;

		/**
		 * campaignRealmId field from API
		 *
		 * @var integer $realm_id
		 */
		private $realm_id;

		/**
		 * campaignListId field from API
		 *
		 * @var integer $list_id
		 */
		private $list_id;

		/**
		 * campaignTemplateId field from API
		 *
		 * @var integer $template_id
		 */
		private $template_id;

		/**
		 * campaignStartDate field from API
		 *
		 * @var \DateTime $start_date
		 */
		private $start_date;

		/**
		 * campaignSubject field from API
		 *
		 * @var string $subject
		 */
		private $subject;

		/**
		 * campaignName field from API
		 *
		 * @var string $name
		 */
		private $name;

		/**
		 * campaignAlias field from API
		 *
		 * @var string $alias
		 */
		private $alias;

		/**
		 * campaignDeliverability field from API
		 *
		 * @var boolean $deliverability
		 */
		private $deliverability;

		/**
		 * campaignForcedFormat field from API
		 *
		 * @var integer $forced_format
		 */
		private $forced_format;

		/**
		 * campaignListName field from API
		 *
		 * @var string $list_name
		 */
		private $list_name;

		/**
		 * campaignSegmentationId field from API
		 *
		 * @var integer $segmentation_id
		 */
		private $segmentation_id;

		/**
		 * campaignSupressionList field from API
		 *
		 * @var string $suppression_list
		 */
		private $suppression_list;

        /**
         * campaignTemplateName field from API
         *
         * @var string $template_name
         */
		private $template_name;

        /**
         * accountProfileId field from API
         *
         * @var int $account_profile_id
         */
		private $account_profile_id;

		/**
		 * skip field from API
		 *
		 * @var integer $skip
		 */
		private $skip;

		/**
		 * max field from API
		 * 
		 * @var integer $max
		 */
		private $max;

		/**
		 * Campaign constructor.
		 *
		 * @param \stdClass|NULL $campaign_response
		 * @param null           $time_zone
		 */
		public function __construct(\stdClass $campaign_response = NULL, $time_zone = NULL)
		{
			if (isset($campaign_response))
			{
				$this
					->setId(isset($campaign_response->campaignId) ? $campaign_response->campaignId : NULL)
					->setName($campaign_response->campaignName)
					->setRealmId(isset($campaign_response->campaignRealmId) ? $campaign_response->campaignRealmId : NULL)
					->setListId($campaign_response->campaignListId)
					->setTemplateId($campaign_response->campaignTemplateId)
                    ->setSubject(isset($campaign_response->campaignSubject) ? $campaign_response->campaignSubject : NULL)
					->setAlias(isset($campaign_response->campaignAlias) ? $campaign_response->campaignAlias : NULL)
					->setDeliverability(isset($campaign_response->campaignDeliverability) ? $campaign_response->campaignDeliverability : NULL)
					->setForcedFormat($campaign_response->campaignForcedFormat)
					->setSegmentationId(isset($campaign_response->campaignSegmentationId) ? $campaign_response->campaignSegmentationId : NULL)
					->setSuppressionList(isset($campaign_response->campaignSuppressionList) ? $campaign_response->campaignSuppressionList : NULL)
					->setSegmentType(isset($campaign_response->segmentType) ? $campaign_response->segmentType : NULL)
					->setIsSaas($campaign_response->isSAAS)
					->setSnaEnabled($campaign_response->snaEnabled)
					->setContentHtml($campaign_response->campaignContentHtml)
					->setContentMobile($campaign_response->campaignContentMobile)
					->setContentText($campaign_response->campaignContentText)
					->setDataXml($campaign_response->campaignDataXml)
                    ->setAccountProfileId($campaign_response->accountProfileId)
					->setSkip($campaign_response->skip)
					->setMax($campaign_response->max);
                if (isset($campaign_response->campaignTemplateName)) $this->setTemplateName($campaign_response->campaignTemplateName);
                if (isset($campaign_response->campaignStartDate)) $this->setStartDate($campaign_response->campaignStartDate, 'M j, Y g:i:s A', $time_zone);
                if (isset($campaign_response->campaignSummary))
                {
                    $campaignSummaryItem = $campaign_response->campaignSummary;
                    $campaign_summary = new CampaignSummary();
                    $campaign_summary
                        ->setTotalSent($campaignSummaryItem->totalSent)
                        ->setTotalDelivered($campaignSummaryItem->totalDelivered)
                        ->setTotalOpen($campaignSummaryItem->totalOpen)
                        ->setTotalClickthroughs($campaignSummaryItem->totalClickthroughs)
                        ->setTotalBounced($campaignSummaryItem->totalBounced)
                        ->setTotalHardBounces($campaignSummaryItem->totalHardBounces)
                        ->setTotalSoftBounces($campaignSummaryItem->totalSoftBounces)
                        ->setTotalBlocked($campaignSummaryItem->totalBlocked)
                        ->setTotalComplaints($campaignSummaryItem->totalComplaints)
                        ->setTotalUnsubscribes($campaignSummaryItem->totalUnsubscribes)
                        ->setTotalResponders($campaignSummaryItem->totalResponders)
                        ->setUniqueOpen($campaignSummaryItem->uniqueOpen)
                        ->setUniqueClickthroughs($campaignSummaryItem->uniqueClickthroughs)
                        ->setUniqueUnsubscribes($campaignSummaryItem->uniqueUnsubscribes)
                        ->setUniqueComplaints($campaignSummaryItem->uniqueComplaints)
                        ->setUniqueBounced($campaignSummaryItem->uniqueBounced)
                        ->setUniqueSoftBounces($campaignSummaryItem->uniqueSoftBounces)
                        ->setUniqueHardBounces($campaignSummaryItem->uniqueHardBounces)
                        ->setUniqueBlocked($campaignSummaryItem->uniqueBlocked)
                        ->setClickToOpenRate($campaignSummaryItem->clickToOpenRate)
                        ->setTotalOpenRate($campaignSummaryItem->totalOpenRate)
                        ->setUniqueOpenRates($campaignSummaryItem->uniqueOpenRates)
                        ->setResponderRates($campaignSummaryItem->responderRates)
                        ->setUniqueUnsubscribeRates($campaignSummaryItem->uniqueUnsubscribeRates)
                        ->setClickRates($campaignSummaryItem->clickRates)
                        ->setUniqueComplaintRates($campaignSummaryItem->uniqueComplaintRates)
                        ->setUniqueClickRates($campaignSummaryItem->uniqueClickRates)
                        ->setBounceRates($campaignSummaryItem->bounceRates)
                        ->setDeliveredRates($campaignSummaryItem->deliveredRates);

                    $this->setCampaignSummary($campaign_summary);
                }

			}
		}

		/**
		 * Gets the private variable campaign_summary
		 *
		 * @return object
		 */
		public function getCampaignSummary()
		{
			return $this->campaign_summary;
		}

		/**
		 * Sets the private variable campaign_summary
		 *
		 * @param object $campaign_summary
		 *
		 * @return Campaign
		 */
		public function setCampaignSummary($campaign_summary)
		{
			$this->campaign_summary = (object)$campaign_summary;

			return $this;
		}

		/**
		 * Gets the private variable segment_type
		 *
		 * @return int
		 */
		public function getSegmentType()
		{
			return $this->segment_type;
		}

		/**
		 * Sets the private variable segment_type
		 *
		 * @param int $segment_type
		 *
		 * @return Campaign
		 */
		public function setSegmentType($segment_type)
		{
			$this->segment_type = (int)$segment_type;

			return $this;
		}

		/**
		 * Sets the private variable is_saas
		 *
		 * @return boolean
		 */
		public function isIsSaas()
		{
			return $this->is_saas;
		}

		/**
		 * Sets the private variable is_saas
		 *
		 * @param boolean $is_saas
		 *
		 * @return Campaign
		 */
		public function setIsSaas($is_saas)
		{
			$this->is_saas = (boolean)($is_saas === TRUE || $is_saas == 1);

			return $this;
		}

		/**
		 * Sets the private variable sna_enabled
		 *
		 * @return boolean
		 */
		public function isSnaEnabled()
		{
			return $this->sna_enabled;
		}

		/**
		 * Sets the private variable sna_enabled
		 *
		 * @param boolean $sna_enabled
		 *
		 * @return Campaign
		 */
		public function setSnaEnabled($sna_enabled)
		{
			$this->sna_enabled = (boolean)($sna_enabled === TRUE || $sna_enabled == 1);

			return $this;
		}

		/**
		 * Gets the private variable content_html
		 *
		 * @return string
		 */
		public function getContentHtml()
		{
			return $this->content_html;
		}

		/**
		 * Sets the private variable content_html
		 *
		 * @param string $content_html
		 *
		 * @return Campaign
		 */
		public function setContentHtml($content_html)
		{
			$this->content_html = (string)$content_html;

			return $this;
		}

		/**
		 * Gets the private variable content_mobile
		 *
		 * @return string
		 */
		public function getContentMobile()
		{
			return $this->content_mobile;
		}

		/**
		 * Sets the private variable content_mobile
		 *
		 * @param string $content_mobile
		 *
		 * @return Campaign
		 */
		public function setContentMobile($content_mobile)
		{
			$this->content_mobile = (string)$content_mobile;

			return $this;
		}

		/**
		 * Gets the private variable data_xml
		 *
		 * @return \SimpleXMLElement
		 */
		public function getDataXml()
		{
			return $this->data_xml;
		}

		/**
		 * Sets the private variable data_xml
		 *
		 * @param \SimpleXMLElement $data_xml
		 *
		 * @return Campaign
		 */
		public function setDataXml($data_xml)
		{
			$this->data_xml = new \SimpleXMLElement('<data_xml>' . $data_xml . '</data_xml>');
            return $this;
		}

		/**
		 * Gets the private variable content_text
		 *
		 * @return string
		 */
		public function getContentText()
		{
			return $this->content_text;
		}

		/**
		 * Sets the private variable content_text
		 *
		 * @param string $content_text
		 *
		 * @return Campaign
		 */
		public function setContentText($content_text)
		{
			$this->content_text = (string)$content_text;

			return $this;
		}

		/**
		 * Gets the private variable id
		 *
		 * @return int
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Sets the private variable id
		 *
		 * @param int $id
		 *
		 * @return Campaign
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * Gets the private variable realm_id
		 *
		 * @return int
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * Sets the private variable realm_id
		 *
		 * @param int $realm_id
		 *
		 * @return Campaign
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * Gets the private variable list_id
		 *
		 * @return int
		 */
		public function getListId()
		{
			return $this->list_id;
		}

		/**
		 * Sets the private variable list_id
		 *
		 * @param int $list_id
		 *
		 * @return Campaign
		 */
		public function setListId($list_id)
		{
			$this->list_id = (int)$list_id;

			return $this;
		}

		/**
		 * Gets the private variable template_id
		 *
		 * @return int
		 */
		public function getTemplateId()
		{
			return $this->template_id;
		}

		/**
		 * Sets the private variable template_id
		 *
		 * @param int $template_id
		 *
		 * @return Campaign
		 */
		public function setTemplateId($template_id)
		{
			$this->template_id = (int)$template_id;

			return $this;
		}

		/**
		 * Gets the private variable start_date
		 *
		 * @return \DateTime
		 */
		public function getStartDate()
		{
			return $this->start_date;
		}

		/**
		 * Sets the private variable start_date
		 *
		 * @param \DateTime $start_date
		 * @param string $format
		 * @param string $time_zone
		 * 
		 * @return Campaign
		 */
		public function setStartDate($start_date, $format, $time_zone)
		{
			$this->start_date = date_create_from_format($format, $start_date, $time_zone);

			return $this;
		}

		/**
		 * Gets the private variable subject
		 *
		 * @return string
		 */
		public function getSubject()
		{
			return $this->subject;
		}

		/**
		 * Sets the private variable subject
		 *
		 * @param string $subject
		 *
		 * @return Campaign
		 */
		public function setSubject($subject)
		{
			$this->subject = (string)$subject;

			return $this;
		}

		/**
		 * Gets the private variable name
		 *
		 * @return string
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * Sets the private variable name
		 *
		 * @param string $name
		 *
		 * @return Campaign
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * Gets the private variable alias
		 *
		 * @return string
		 */
		public function getAlias()
		{
			return $this->alias;
		}

		/**
		 * Sets the private variable alias
		 *
		 * @param string $alias
		 *
		 * @return Campaign
		 */
		public function setAlias($alias)
		{
			$this->alias = (string)$alias;

			return $this;
		}

		/**
		 * Sets the private variable deliverability
		 *
		 * @return boolean
		 */
		public function isDeliverability()
		{
			return $this->deliverability;
		}

		/**
		 * Sets the private variable deliverability
		 *
		 * @param boolean $deliverability
		 *
		 * @return Campaign
		 */
		public function setDeliverability($deliverability)
		{
			$this->deliverability = (boolean)($deliverability === TRUE || $deliverability == 1);

			return $this;
		}

		/**
		 * Gets the private variable forced_format
		 *
		 * @return int
		 */
		public function getForcedFormat()
		{
			return $this->forced_format;
		}

		/**
		 * Sets the private variable forced_format
		 *
		 * @param int $forced_format
		 *
		 * @return Campaign
		 */
		public function setForcedFormat($forced_format)
		{
			$this->forced_format = (int)$forced_format;

			return $this;
		}

		/**
		 * Gets the private variable list_name
		 *
		 * @return string
		 */
		public function getListName()
		{
			return $this->list_name;
		}

		/**
		 * Sets the private variable list_name
		 *
		 * @param string $list_name
		 *
		 * @return Campaign
		 */
		public function setListName($list_name)
		{
			$this->list_name = (string)$list_name;

			return $this;
		}

		/**
		 * Gets the private variable segmentation_id
		 *
		 * @return int
		 */
		public function getSegmentationId()
		{
			return $this->segmentation_id;
		}

		/**
		 * Sets the private variable segmentation_id
		 *
		 * @param int $segmentation_id
		 *
		 * @return Campaign
		 */
		public function setSegmentationId($segmentation_id)
		{
			$this->segmentation_id = (int)$segmentation_id;

			return $this;
		}

		/**
		 * Gets the private variable suppression_list
		 *
		 * @return string
		 */
		public function getSuppressionList()
		{
			return $this->suppression_list;
		}

		/**
		 * Sets the private variable suppression_list
		 *
		 * @param string $suppression_list
		 *
		 * @return Campaign
		 */
		public function setSuppressionList($suppression_list)
		{
			$this->suppression_list = (string)$suppression_list;

			return $this;
		}

        /**
         * Gets the private variable template_name
         *
         * @return string
         */
        public function getTemplateName()
        {
            return $this->template_name;
        }

        /**
         * Sets the private variable template_name
         *
         * @param string $template_name
         *
         * @return Campaign
         */
        public function setTemplateName( $template_name )
        {
            $this->template_name = (string) $template_name;

            return $this;
        }

        /**
         * Gets the private variable account_profile_id
         *
         * @return string
         */
        public function getAccountProfileId()
        {
            return $this->account_profile_id;
        }

        /**
         * Sets the private variable account_profile_id
         *
         * @param string $account_profile_id
         *
         * @return Campaign
         */
        public function setAccountProfileId( $account_profile_id )
        {
            $this->account_profile_id = (int) $account_profile_id;

            return $this;
        }

		/**
		 * Gets the private variable skip
		 *
		 * @return int
		 */
		public function getSkip()
		{
			return $this->skip;
		}

		/**
		 * Sets the private variable skip
		 *
		 * @param int $skip
		 *
		 * @return Campaign
		 */
		public function setSkip($skip)
		{
			$this->skip = (int)$skip;

			return $this;
		}

		/**
		 * Gets the private variable max
		 *
		 * @return int
		 */
		public function getMax()
		{
			return $this->max;
		}

		/**
		 * Sets the private variable max
		 *
		 * @param int $max
		 *
		 * @return Campaign
		 */
		public function setMax($max)
		{
			$this->max = (int)$max;

			return $this;
		}


	}

	/**
	 * Class CampaignSummary
	 * @package Whatcounts_Rest
	 */
	class CampaignSummary
	{
		/**
		 * totalSent field from API
		 * 
		 * @var integer $total_sent
		 */
		private $total_sent;

		/**
		 * totalDelivered field from API
		 * 
		 * @var integer $total_delivered
		 */
		private $total_delivered;

		/**
		 * totalOpen field from API
		 * 
		 * @var integer $total_open
		 */
		private $total_open;

		/**
		 * totalClickthroughs field from API
		 * 
		 * @var integer $total_clickthroughs
		 */
		private $total_clickthroughs;

		/**
		 * totalBounced field from API
		 * 
		 * @var integer $total_bounced
		 */
		private $total_bounced;

		/**
		 * totalHardBounces field from API
		 * 
		 * @var integer $total_hard_bounces
		 */
		private $total_hard_bounces;

		/**
		 * totalSoftBounces field from API
		 * 
		 * @var integer $total_soft_bounces
		 */
		private $total_soft_bounces;

		/**
		 * totalBlocked field from API
		 * 
		 * @var integer $total_blocked
		 */
		private $total_blocked;

		/**
		 * totalComplaints field from API
		 * 
		 * @var integer $total_complaints
		 */
		private $total_complaints;

		/**
		 * totalUnsubscribes field from API
		 * 
		 * @var integer $total_unsubscribes
		 */
		private $total_unsubscribes;

		/**
		 * totalResponders field from API
		 * 
		 * @var integer $total_responders
		 */
		private $total_responders;

		/**
		 * uniqueOpen field from API
		 * 
		 * @var integer $unique_open
		 */
		private $unique_open;

		/**
		 * uniqueClickthroughs field from API
		 * 
		 * @var integer $unique_clickthroughs
		 */
		private $unique_clickthroughs;

		/**
		 * uniqueUnsubscribes field from API
		 * 
		 * @var integer $unique_unsubscribes
		 */
		private $unique_unsubscribes;

		/**
		 * uniqueComplaints field from API
		 * 
		 * @var integer $unique_complaints
		 */
		private $unique_complaints;

		/**
		 * uniqueBounced field from API
		 * 
		 * @var integer $unique_bounced
		 */
		private $unique_bounced;

		/**
		 * uniqueSoftBounces field from API
		 * 
		 * @var integer $unique_soft_bounces
		 */
		private $unique_soft_bounces;

		/**
		 * uniqueHardBounces field from API
		 * 
		 * @var integer $unique_hard_bounces
		 */
		private $unique_hard_bounces;

		/**
		 * uniqueBlocked field from API
		 * 
		 * @var integer $unique_blocked
		 */
		private $unique_blocked;

		/**
		 * clickToOpenRate field from API
		 * 
		 * @var float $click_to_open_rate
		 */
		private $click_to_open_rate;

		/**
		 * totalOpenRate field from API
		 * 
		 * @var float $total_open_rate
		 */
		private $total_open_rate;

		/**
		 * uniqueOpenRates field from API
		 * 
		 * @var float $unique_open_rates
		 */
		private $unique_open_rates;

		/**
		 * responderRates field from API
		 * 
		 * @var float $responder_rates
		 */
		private $responder_rates;

		/**
		 * uniqueUnsubscribeRates field from API
		 * 
		 * @var float $unique_unsubscribe_rates
		 */
		private $unique_unsubscribe_rates;

		/**
		 * clickRates field from API
		 * 
		 * @var float $click_rates
		 */
		private $click_rates;

		/**
		 * uniqueComplaintRates field from API
		 * 
		 * @var float $unique_complaint_rates
		 */
		private $unique_complaint_rates;

		/**
		 * uniqueClickRates field from API
		 * 
		 * @var float $unique_click_rates
		 */
		private $unique_click_rates;

		/**
		 * bounceRates field from API
		 * 
		 * @var float $bounce_rates
		 */
		private $bounce_rates;

		/**
		 * deliveredRates field from API
		 * 
		 * @var float $delivered_rates
		 */
		private $delivered_rates;

		/**
		 * Gets the private variable total_sent
		 *
		 * @return int
		 */
		public function getTotalSent()
		{
			return $this->total_sent;
		}

		/**
		 * Sets the private variable total_sent
		 *
		 * @param int $total_sent
		 *
		 * @return CampaignSummary
		 */
		public function setTotalSent($total_sent)
		{
			$this->total_sent = (int)$total_sent;

			return $this;
		}

		/**
		 * Gets the private variable total_delivered
		 *
		 * @return int
		 */
		public function getTotalDelivered()
		{
			return $this->total_delivered;
		}

		/**
		 * Sets the private variable total_delivered
		 *
		 * @param int $total_delivered
		 *
		 * @return CampaignSummary
		 */
		public function setTotalDelivered($total_delivered)
		{
			$this->total_delivered = (int)$total_delivered;

			return $this;
		}

		/**
		 * Gets the private variable total_open
		 *
		 * @return int
		 */
		public function getTotalOpen()
		{
			return $this->total_open;
		}

		/**
		 * Sets the private variable total_open
		 *
		 * @param int $total_open
		 *
		 * @return CampaignSummary
		 */
		public function setTotalOpen($total_open)
		{
			$this->total_open = (int)$total_open;

			return $this;
		}

		/**
		 * Gets the private variable total_clickthroughs
		 *
		 * @return int
		 */
		public function getTotalClickthroughs()
		{
			return $this->total_clickthroughs;
		}

		/**
		 * Sets the private variable total_clickthroughs
		 *
		 * @param int $total_clickthroughs
		 *
		 * @return CampaignSummary
		 */
		public function setTotalClickthroughs($total_clickthroughs)
		{
			$this->total_clickthroughs = (int)$total_clickthroughs;

			return $this;
		}

		/**
		 * Gets the private variable total_bounced
		 *
		 * @return int
		 */
		public function getTotalBounced()
		{
			return $this->total_bounced;
		}

		/**
		 * Sets the private variable total_bounced
		 *
		 * @param int $total_bounced
		 *
		 * @return CampaignSummary
		 */
		public function setTotalBounced($total_bounced)
		{
			$this->total_bounced = (int)$total_bounced;

			return $this;
		}

		/**
		 * Gets the private variable total_hard_bounces
		 *
		 * @return int
		 */
		public function getTotalHardBounces()
		{
			return $this->total_hard_bounces;
		}

		/**
		 * Sets the private variable total_hard_bounces
		 *
		 * @param int $total_hard_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setTotalHardBounces($total_hard_bounces)
		{
			$this->total_hard_bounces = (int)$total_hard_bounces;

			return $this;
		}

		/**
		 * Gets the private variable total_soft_bounces
		 *
		 * @return int
		 */
		public function getTotalSoftBounces()
		{
			return $this->total_soft_bounces;
		}

		/**
		 * Sets the private variable total_soft_bounces
		 *
		 * @param int $total_soft_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setTotalSoftBounces($total_soft_bounces)
		{
			$this->total_soft_bounces = (int)$total_soft_bounces;

			return $this;
		}

		/**
		 * Gets the private variable total_blocked
		 *
		 * @return int
		 */
		public function getTotalBlocked()
		{
			return $this->total_blocked;
		}

		/**
		 * Sets the private variable total_blocked
		 *
		 * @param int $total_blocked
		 *
		 * @return CampaignSummary
		 */
		public function setTotalBlocked($total_blocked)
		{
			$this->total_blocked = (int)$total_blocked;

			return $this;
		}

		/**
		 * Gets the private variable total_complaints
		 *
		 * @return int
		 */
		public function getTotalComplaints()
		{
			return $this->total_complaints;
		}

		/**
		 * Sets the private variable total_complaints
		 *
		 * @param int $total_complaints
		 *
		 * @return CampaignSummary
		 */
		public function setTotalComplaints($total_complaints)
		{
			$this->total_complaints = (int)$total_complaints;

			return $this;
		}

		/**
		 * Gets the private variable total_unsubscribes
		 *
		 * @return int
		 */
		public function getTotalUnsubscribes()
		{
			return $this->total_unsubscribes;
		}

		/**
		 * Sets the private variable total_unsubscribes
		 *
		 * @param int $total_unsubscribes
		 *
		 * @return CampaignSummary
		 */
		public function setTotalUnsubscribes($total_unsubscribes)
		{
			$this->total_unsubscribes = (int)$total_unsubscribes;

			return $this;
		}

		/**
		 * Gets the private variable total_responders
		 *
		 * @return int
		 */
		public function getTotalResponders()
		{
			return $this->total_responders;
		}

		/**
		 * Sets the private variable total_responders
		 *
		 * @param int $total_responders
		 *
		 * @return CampaignSummary
		 */
		public function setTotalResponders($total_responders)
		{
			$this->total_responders = (int)$total_responders;

			return $this;
		}

		/**
		 * Gets the private variable unique_open
		 *
		 * @return int
		 */
		public function getUniqueOpen()
		{
			return $this->unique_open;
		}

		/**
		 * Sets the private variable unique_open
		 *
		 * @param int $unique_open
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueOpen($unique_open)
		{
			$this->unique_open = (int)$unique_open;

			return $this;
		}

		/**
		 * Gets the private variable unique_clickthroughs
		 *
		 * @return int
		 */
		public function getUniqueClickthroughs()
		{
			return $this->unique_clickthroughs;
		}

		/**
		 * Sets the private variable unique_clickthroughs
		 *
		 * @param int $unique_clickthroughs
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueClickthroughs($unique_clickthroughs)
		{
			$this->unique_clickthroughs = (int)$unique_clickthroughs;

			return $this;
		}

		/**
		 * Gets the private variable unique_unsubscribes
		 *
		 * @return int
		 */
		public function getUniqueUnsubscribes()
		{
			return $this->unique_unsubscribes;
		}

		/**
		 * Sets the private variable unique_unsubscribes
		 *
		 * @param int $unique_unsubscribes
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueUnsubscribes($unique_unsubscribes)
		{
			$this->unique_unsubscribes = (int)$unique_unsubscribes;

			return $this;
		}

		/**
		 * Gets the private variable unique_complaints
		 *
		 * @return int
		 */
		public function getUniqueComplaints()
		{
			return $this->unique_complaints;
		}

		/**
		 * Sets the private variable unique_complaints
		 *
		 * @param int $unique_complaints
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueComplaints($unique_complaints)
		{
			$this->unique_complaints = (int)$unique_complaints;

			return $this;
		}

		/**
		 * Gets the private variable unique_bounced
		 *
		 * @return int
		 */
		public function getUniqueBounced()
		{
			return $this->unique_bounced;
		}

		/**
		 * Sets the private variable unique_bounced
		 *
		 * @param int $unique_bounced
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueBounced($unique_bounced)
		{
			$this->unique_bounced = (int)$unique_bounced;

			return $this;
		}

		/**
		 * Gets the private variable unique_soft_bounces
		 *
		 * @return int
		 */
		public function getUniqueSoftBounces()
		{
			return $this->unique_soft_bounces;
		}

		/**
		 * Sets the private variable unique_soft_bounces
		 *
		 * @param int $unique_soft_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueSoftBounces($unique_soft_bounces)
		{
			$this->unique_soft_bounces = (int)$unique_soft_bounces;

			return $this;
		}

		/**
		 * Gets the private variable unique_hard_bounces
		 *
		 * @return int
		 */
		public function getUniqueHardBounces()
		{
			return $this->unique_hard_bounces;
		}

		/**
		 * Sets the private variable unique_hard_bounces
		 *
		 * @param int $unique_hard_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueHardBounces($unique_hard_bounces)
		{
			$this->unique_hard_bounces = (int)$unique_hard_bounces;

			return $this;
		}

		/**
		 * Gets the private variable unique_blocked
		 *
		 * @return int
		 */
		public function getUniqueBlocked()
		{
			return $this->unique_blocked;
		}

		/**
		 * Sets the private variable unique_blocked
		 *
		 * @param int $unique_blocked
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueBlocked($unique_blocked)
		{
			$this->unique_blocked = (int)$unique_blocked;

			return $this;
		}

		/**
		 * Gets the private variable click_to_open_rate
		 *
		 * @return mixed
		 */
		public function getClickToOpenRate()
		{
			return $this->click_to_open_rate;
		}

		/**
		 * Sets the private variable click_to_open_rate
		 *
		 * @param float $click_to_open_rate
		 *
		 * @return CampaignSummary
		 */
		public function setClickToOpenRate($click_to_open_rate)
		{
			$this->click_to_open_rate = (float)$click_to_open_rate;
            return $this;
		}

		/**
		 * Gets the private variable total_open_rate
		 *
		 * @return float
		 */
		public function getTotalOpenRate()
		{
			return $this->total_open_rate;
		}

		/**
		 * Sets the private variable total_open_rate
		 *
		 * @param float $total_open_rate
		 *
		 * @return CampaignSummary
		 */
		public function setTotalOpenRate($total_open_rate)
		{
			$this->total_open_rate = (float)$total_open_rate;

			return $this;
		}

		/**
		 * Gets the private variable unique_open_rates
		 *
		 * @return float
		 */
		public function getUniqueOpenRates()
		{
			return $this->unique_open_rates;
		}

		/**
		 * Sets the private variable unique_open_rates
		 *
		 * @param float $unique_open_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueOpenRates($unique_open_rates)
		{
			$this->unique_open_rates = (float)$unique_open_rates;

			return $this;
		}

		/**
		 * Gets the private variable responder_rates
		 *
		 * @return float
		 */
		public function getResponderRates()
		{
			return $this->responder_rates;
		}

		/**
		 * Sets the private variable responder_rates
		 *
		 * @param float $responder_rates
		 *
		 * @return CampaignSummary
		 */
		public function setResponderRates($responder_rates)
		{
			$this->responder_rates = (float)$responder_rates;

			return $this;
		}

		/**
		 * Gets the private variable unique_unsubscribe_rates
		 *
		 * @return float
		 */
		public function getUniqueUnsubscribeRates()
		{
			return $this->unique_unsubscribe_rates;
		}

		/**
		 * Sets the private variable unique_unsubscribe_rates
		 *
		 * @param float $unique_unsubscribe_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueUnsubscribeRates($unique_unsubscribe_rates)
		{
			$this->unique_unsubscribe_rates = (float)$unique_unsubscribe_rates;

			return $this;
		}

		/**
		 * Gets the private variable click_rates
		 *
		 * @return float
		 */
		public function getClickRates()
		{
			return $this->click_rates;
		}

		/**
		 * Sets the private variable click_rates
		 *
		 * @param float $click_rates
		 *
		 * @return CampaignSummary
		 */
		public function setClickRates($click_rates)
		{
			$this->click_rates = (float)$click_rates;

			return $this;
		}

		/**
		 * Gets the private variable unique_complaint_rates
		 *
		 * @return float
		 */
		public function getUniqueComplaintRates()
		{
			return $this->unique_complaint_rates;
		}

		/**
		 * Sets the private variable unique_complaint_rates
		 *
		 * @param float $unique_complaint_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueComplaintRates($unique_complaint_rates)
		{
			$this->unique_complaint_rates = (float)$unique_complaint_rates;

			return $this;
		}

		/**
		 * Gets the private variable unique_click_rates
		 *
		 * @return float
		 */
		public function getUniqueClickRates()
		{
			return $this->unique_click_rates;
		}

		/**
		 * Sets the private variable unique_click_rates
		 *
		 * @param float $unique_click_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueClickRates($unique_click_rates)
		{
			$this->unique_click_rates = (float)$unique_click_rates;

			return $this;
		}

		/**
		 * Gets the private variable bounce_rates
		 *
		 * @return float
		 */
		public function getBounceRates()
		{
			return $this->bounce_rates;
		}

		/**
		 * Sets the private variable bounce_rates
		 *
		 * @param float $bounce_rates
		 *
		 * @return CampaignSummary
		 */
		public function setBounceRates($bounce_rates)
		{
			$this->bounce_rates = (float)$bounce_rates;

			return $this;
		}

		/**
		 * Gets the private variable delivered_rates
		 *
		 * @return float
		 */
		public function getDeliveredRates()
		{
			return $this->delivered_rates;
		}

		/**
		 * Sets the private variable delivered_rates
		 *
		 * @param float $delivered_rates
		 *
		 * @return CampaignSummary
		 */
		public function setDeliveredRates($delivered_rates)
		{
			$this->delivered_rates = (float)$delivered_rates;

			return $this;
		}

	}