<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class Campaign
	 * @package ZayconWhatCounts
	 */
	class Campaign
	{
		/**
		 * @var object $campaign_summary
		 */
		private $campaign_summary;

		/**
		 * @var integer $segment_type
		 */
		private $segment_type;

		/**
		 * @var boolean $is_saas
		 */
		private $is_saas;

		/**
		 * @var boolean $sna_enabled
		 */
		private $sna_enabled;

		/**
		 * @var string $content_html
		 */
		private $content_html;

		/**
		 * @var string $content_mobile
		 */
		private $content_mobile;

		/**
		 * @var \SimpleXMLElement $data_xml
		 */
		private $data_xml;

		/**
		 * @var string $content_text
		 */
		private $content_text;

		/**
		 * @var integer $id
		 */
		private $id;

		/**
		 * @var integer $realm_id
		 */
		private $realm_id;

		/**
		 * @var integer $list_id
		 */
		private $list_id;

		/**
		 * @var integer $template_id
		 */
		private $template_id;

		/**
		 * @var \DateTime $start_date
		 */
		private $start_date;

		/**
		 * @var string $subject
		 */
		private $subject;

		/**
		 * @var string $name
		 */
		private $name;

		/**
		 * @var string $alias
		 */
		private $alias;

		/**
		 * @var boolean $deliverability
		 */
		private $deliverability;

		/**
		 * @var integer $forced_format
		 */
		private $forced_format;

		/**
		 * @var string $list_name
		 */
		private $list_name;

		/**
		 * @var integer $segmentation_id
		 */
		private $segmentation_id;

		/**
		 * @var string $suppression_list
		 */
		private $suppression_list;

		/**
		 * @var integer $skip
		 */
		private $skip;

		/**
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
					->setId($campaign_response->campaignId)
					->setName($campaign_response->campaignName)
					->setRealmId($campaign_response->campaignRealmId)
					->setListId($campaign_response->campaignListId)
					->setTemplateId($campaign_response->campaignTemplateId)
					->setStartDate($campaign_response->campaignStartDate, 'M j, Y g:i:s A', $time_zone)
					->setSubject($campaign_response->campaignSubject)
					->setAlias($campaign_response->campaignAlias)
					->setDeliverability($campaign_response->campaignDeliverability)
					->setForcedFormat($campaign_response->campaignForcedFormat)
					->setSegmentationId($campaign_response->campaignSegmentationId)
					->setSuppressionList($campaign_response->campaignSuppressionList)
					->setSegmentType($campaign_response->segmentType)
					->setIsSaas($campaign_response->isSAAS)
					->setSnaEnabled($campaign_response->snaEnabled)
					->setContentHtml($campaign_response->campaignContentHtml)
					->setContentMobile($campaign_response->campaignContentMobile)
					->setContentText($campaign_response->campaignContentText)
					->setDataXml($campaign_response->campaignDataXml)
					->setSkip($campaign_response->skip)
					->setMax($campaign_response->max);

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

		/**
		 * Sets the private variable campaign_summary
		 *
		 * @return object
		 */
		public function getCampaignSummary()
		{
			return $this->campaign_summary;
		}

		/**
		 * Gets the private variable campaign_summary
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
		 * Sets the private variable segment_type
		 *
		 * @return int
		 */
		public function getSegmentType()
		{
			return $this->segment_type;
		}

		/**
		 * Gets the private variable segment_type
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
		 * Gets the private variable is_saas
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
		 * Gets the private variable sna_enabled
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
		 * Sets the private variable content_html
		 *
		 * @return string
		 */
		public function getContentHtml()
		{
			return $this->content_html;
		}

		/**
		 * Gets the private variable content_html
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
		 * Sets the private variable content_mobile
		 *
		 * @return string
		 */
		public function getContentMobile()
		{
			return $this->content_mobile;
		}

		/**
		 * Gets the private variable content_mobile
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
		 * Sets the private variable data_xml
		 *
		 * @return \SimpleXMLElement
		 */
		public function getDataXml()
		{
			return $this->data_xml;
		}

		/**
		 * Gets the private variable data_xml
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
		 * Sets the private variable content_text
		 *
		 * @return string
		 */
		public function getContentText()
		{
			return $this->content_text;
		}

		/**
		 * Gets the private variable content_text
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
		 * Sets the private variable id
		 *
		 * @return int
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Gets the private variable id
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
		 * Sets the private variable realm_id
		 *
		 * @return int
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * Gets the private variable realm_id
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
		 * Sets the private variable list_id
		 *
		 * @return int
		 */
		public function getListId()
		{
			return $this->list_id;
		}

		/**
		 * Gets the private variable list_id
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
		 * Sets the private variable template_id
		 *
		 * @return int
		 */
		public function getTemplateId()
		{
			return $this->template_id;
		}

		/**
		 * Gets the private variable template_id
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
		 * Sets the private variable start_date
		 *
		 * @return \DateTime
		 */
		public function getStartDate()
		{
			return $this->start_date;
		}

		/**
		 * Gets the private variable start_date
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
		 * Sets the private variable subject
		 *
		 * @return string
		 */
		public function getSubject()
		{
			return $this->subject;
		}

		/**
		 * Gets the private variable subject
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
		 * Sets the private variable name
		 *
		 * @return string
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * Gets the private variable name
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
		 * Sets the private variable alias
		 *
		 * @return string
		 */
		public function getAlias()
		{
			return $this->alias;
		}

		/**
		 * Gets the private variable alias
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
		 * Gets the private variable deliverability
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
		 * Sets the private variable forced_format
		 *
		 * @return int
		 */
		public function getForcedFormat()
		{
			return $this->forced_format;
		}

		/**
		 * Gets the private variable forced_format
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
		 * Sets the private variable list_name
		 *
		 * @return string
		 */
		public function getListName()
		{
			return $this->list_name;
		}

		/**
		 * Gets the private variable list_name
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
		 * Sets the private variable segmentation_id
		 *
		 * @return int
		 */
		public function getSegmentationId()
		{
			return $this->segmentation_id;
		}

		/**
		 * Gets the private variable segmentation_id
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
		 * Sets the private variable suppression_list
		 *
		 * @return string
		 */
		public function getSuppressionList()
		{
			return $this->suppression_list;
		}

		/**
		 * Gets the private variable suppression_list
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
		 * Sets the private variable skip
		 *
		 * @return int
		 */
		public function getSkip()
		{
			return $this->skip;
		}

		/**
		 * Gets the private variable skip
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
		 * Sets the private variable max
		 *
		 * @return int
		 */
		public function getMax()
		{
			return $this->max;
		}

		/**
		 * Gets the private variable max
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
	 * @package ZayconWhatCounts
	 */
	class CampaignSummary
	{
		/**
		 * @var integer $total_sent
		 */
		private $total_sent;

		/**
		 * @var integer $total_delivered
		 */
		private $total_delivered;

		/**
		 * @var integer $total_open
		 */
		private $total_open;

		/**
		 * @var integer $total_clickthroughs
		 */
		private $total_clickthroughs;

		/**
		 * @var integer $total_bounced
		 */
		private $total_bounced;

		/**
		 * @var integer $total_hard_bounces
		 */
		private $total_hard_bounces;

		/**
		 * @var integer $total_soft_bounces
		 */
		private $total_soft_bounces;

		/**
		 * @var integer $total_blocked
		 */
		private $total_blocked;

		/**
		 * @var integer $total_complaints
		 */
		private $total_complaints;

		/**
		 * @var integer $total_unsubscribes
		 */
		private $total_unsubscribes;

		/**
		 * @var integer $total_responders
		 */
		private $total_responders;

		/**
		 * @var integer $unique_open
		 */
		private $unique_open;

		/**
		 * @var integer $unique_clickthroughs
		 */
		private $unique_clickthroughs;

		/**
		 * @var integer $unique_unsubscribes
		 */
		private $unique_unsubscribes;

		/**
		 * @var integer $unique_complaints
		 */
		private $unique_complaints;

		/**
		 * @var integer $unique_bounced
		 */
		private $unique_bounced;

		/**
		 * @var integer $unique_soft_bounces
		 */
		private $unique_soft_bounces;

		/**
		 * @var integer $unique_hard_bounces
		 */
		private $unique_hard_bounces;

		/**
		 * @var integer $unique_blocked
		 */
		private $unique_blocked;

		/**
		 * @var float $click_to_open_rate
		 */
		private $click_to_open_rate;

		/**
		 * @var float $total_open_rate
		 */
		private $total_open_rate;

		/**
		 * @var float $unique_open_rates
		 */
		private $unique_open_rates;

		/**
		 * @var float $responder_rates
		 */
		private $responder_rates;

		/**
		 * @var float $unique_unsubscribe_rates
		 */
		private $unique_unsubscribe_rates;

		/**
		 * @var float $click_rates
		 */
		private $click_rates;

		/**
		 * @var float $unique_complaint_rates
		 */
		private $unique_complaint_rates;

		/**
		 * @var float $unique_click_rates
		 */
		private $unique_click_rates;

		/**
		 * @var float $bounce_rates
		 */
		private $bounce_rates;

		/**
		 * @var float $delivered_rates
		 */
		private $delivered_rates;

		/**
		 * Sets the private variable total_sent
		 *
		 * @return int
		 */
		public function getTotalSent()
		{
			return $this->total_sent;
		}

		/**
		 * Gets the private variable total_sent
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
		 * Sets the private variable total_delivered
		 *
		 * @return int
		 */
		public function getTotalDelivered()
		{
			return $this->total_delivered;
		}

		/**
		 * Gets the private variable total_delivered
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
		 * Sets the private variable total_open
		 *
		 * @return int
		 */
		public function getTotalOpen()
		{
			return $this->total_open;
		}

		/**
		 * Gets the private variable total_open
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
		 * Sets the private variable total_clickthroughs
		 *
		 * @return int
		 */
		public function getTotalClickthroughs()
		{
			return $this->total_clickthroughs;
		}

		/**
		 * Gets the private variable total_clickthroughs
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
		 * Sets the private variable total_bounced
		 *
		 * @return int
		 */
		public function getTotalBounced()
		{
			return $this->total_bounced;
		}

		/**
		 * Gets the private variable total_bounced
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
		 * Sets the private variable total_hard_bounces
		 *
		 * @return int
		 */
		public function getTotalHardBounces()
		{
			return $this->total_hard_bounces;
		}

		/**
		 * Gets the private variable total_hard_bounces
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
		 * Sets the private variable total_soft_bounces
		 *
		 * @return int
		 */
		public function getTotalSoftBounces()
		{
			return $this->total_soft_bounces;
		}

		/**
		 * Gets the private variable total_soft_bounces
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
		 * Sets the private variable total_blocked
		 *
		 * @return int
		 */
		public function getTotalBlocked()
		{
			return $this->total_blocked;
		}

		/**
		 * Gets the private variable total_blocked
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
		 * Sets the private variable total_complaints
		 *
		 * @return int
		 */
		public function getTotalComplaints()
		{
			return $this->total_complaints;
		}

		/**
		 * Gets the private variable total_complaints
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
		 * Sets the private variable total_unsubscribes
		 *
		 * @return int
		 */
		public function getTotalUnsubscribes()
		{
			return $this->total_unsubscribes;
		}

		/**
		 * Gets the private variable total_unsubscribes
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
		 * Sets the private variable total_responders
		 *
		 * @return int
		 */
		public function getTotalResponders()
		{
			return $this->total_responders;
		}

		/**
		 * Gets the private variable total_responders
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
		 * Sets the private variable unique_open
		 *
		 * @return int
		 */
		public function getUniqueOpen()
		{
			return $this->unique_open;
		}

		/**
		 * Gets the private variable unique_open
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
		 * Sets the private variable unique_clickthroughs
		 *
		 * @return int
		 */
		public function getUniqueClickthroughs()
		{
			return $this->unique_clickthroughs;
		}

		/**
		 * Gets the private variable unique_clickthroughs
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
		 * Sets the private variable unique_unsubscribes
		 *
		 * @return int
		 */
		public function getUniqueUnsubscribes()
		{
			return $this->unique_unsubscribes;
		}

		/**
		 * Gets the private variable unique_unsubscribes
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
		 * Sets the private variable unique_complaints
		 *
		 * @return int
		 */
		public function getUniqueComplaints()
		{
			return $this->unique_complaints;
		}

		/**
		 * Gets the private variable unique_complaints
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
		 * Sets the private variable unique_bounced
		 *
		 * @return int
		 */
		public function getUniqueBounced()
		{
			return $this->unique_bounced;
		}

		/**
		 * Gets the private variable unique_bounced
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
		 * Sets the private variable unique_soft_bounces
		 *
		 * @return int
		 */
		public function getUniqueSoftBounces()
		{
			return $this->unique_soft_bounces;
		}

		/**
		 * Gets the private variable unique_soft_bounces
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
		 * Sets the private variable unique_hard_bounces
		 *
		 * @return int
		 */
		public function getUniqueHardBounces()
		{
			return $this->unique_hard_bounces;
		}

		/**
		 * Gets the private variable unique_hard_bounces
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
		 * Sets the private variable unique_blocked
		 *
		 * @return int
		 */
		public function getUniqueBlocked()
		{
			return $this->unique_blocked;
		}

		/**
		 * Gets the private variable unique_blocked
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
		 * Sets the private variable click_to_open_rate
		 *
		 * @return mixed
		 */
		public function getClickToOpenRate()
		{
			return $this->click_to_open_rate;
		}

		/**
		 * Gets the private variable click_to_open_rate
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
		 * Sets the private variable total_open_rate
		 *
		 * @return float
		 */
		public function getTotalOpenRate()
		{
			return $this->total_open_rate;
		}

		/**
		 * Gets the private variable total_open_rate
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
		 * Sets the private variable unique_open_rates
		 *
		 * @return float
		 */
		public function getUniqueOpenRates()
		{
			return $this->unique_open_rates;
		}

		/**
		 * Gets the private variable unique_open_rates
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
		 * Sets the private variable responder_rates
		 *
		 * @return float
		 */
		public function getResponderRates()
		{
			return $this->responder_rates;
		}

		/**
		 * Gets the private variable responder_rates
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
		 * Sets the private variable unique_unsubscribe_rates
		 *
		 * @return float
		 */
		public function getUniqueUnsubscribeRates()
		{
			return $this->unique_unsubscribe_rates;
		}

		/**
		 * Gets the private variable unique_unsubscribe_rates
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
		 * Sets the private variable click_rates
		 *
		 * @return float
		 */
		public function getClickRates()
		{
			return $this->click_rates;
		}

		/**
		 * Gets the private variable click_rates
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
		 * Sets the private variable unique_complaint_rates
		 *
		 * @return float
		 */
		public function getUniqueComplaintRates()
		{
			return $this->unique_complaint_rates;
		}

		/**
		 * Gets the private variable unique_complaint_rates
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
		 * Sets the private variable unique_click_rates
		 *
		 * @return float
		 */
		public function getUniqueClickRates()
		{
			return $this->unique_click_rates;
		}

		/**
		 * Gets the private variable unique_click_rates
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
		 * Sets the private variable bounce_rates
		 *
		 * @return float
		 */
		public function getBounceRates()
		{
			return $this->bounce_rates;
		}

		/**
		 * Gets the private variable bounce_rates
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
		 * Sets the private variable delivered_rates
		 *
		 * @return float
		 */
		public function getDeliveredRates()
		{
			return $this->delivered_rates;
		}

		/**
		 * Gets the private variable delivered_rates
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