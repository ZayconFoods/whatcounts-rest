<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	class Campaign
	{
		private $campaign_summary;
		private $segment_type;
		private $is_saas;
		private $sna_enabled;
		private $content_html;
		private $content_mobile;
		private $data_xml;
		private $content_text;
		private $id;
		private $realm_id;
		private $list_id;
		private $template_id;
		private $start_date;
		private $subject;
		private $name;
		private $alias;
		private $deliverability;
		private $forced_format;
		private $list_name;
		private $segmentation_id;
		private $suppression_list;
		private $template_name;

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
					->setStartDate($campaign_response->campaignStartDate, $time_zone)
					->setSubject($campaign_response->campaignSubject)
					->setAlias($campaign_response->campaignAlias)
					->setDeliverability($campaign_response->campaignDeliverability)
					->setForcedFormat($campaign_response->campaignForcedFormat)
					->setSegmentationId($campaign_response->campaignSegmentationId)
					->setSuppressionList($campaign_response->campaignSuppressionList)
					->setTemplateName($campaign_response->campaignTemplateName)
					->setSegmentType($campaign_response->segmentType)
					->setIsSaas($campaign_response->isSAAS)
					->setSnaEnabled($campaign_response->snaEnabled)
					->setContentHtml($campaign_response->campaignContentHtml)
					->setContentMobile($campaign_response->campaignContentMobile)
					->setContentText($campaign_response->campaignContentText)
					->setDataXml($campaign_response->campaignDataXml);

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
		 * @return mixed
		 */
		public function getCampaignSummary()
		{
			return $this->campaign_summary;
		}

		/**
		 * @param mixed $campaign_summary
		 *
		 * @return Campaign
		 */
		public function setCampaignSummary($campaign_summary)
		{
			$this->campaign_summary = (object)$campaign_summary;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getSegmentType()
		{
			return $this->segment_type;
		}

		/**
		 * @param mixed $segment_type
		 *
		 * @return Campaign
		 */
		public function setSegmentType($segment_type)
		{
			$this->segment_type = (int)$segment_type;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getIsSaas()
		{
			return $this->is_saas;
		}

		/**
		 * @param mixed $is_saas
		 *
		 * @return Campaign
		 */
		public function setIsSaas($is_saas)
		{
			$this->is_saas = (bool)$is_saas;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getSnaEnabled()
		{
			return $this->sna_enabled;
		}

		/**
		 * @param mixed $sna_enabled
		 *
		 * @return Campaign
		 */
		public function setSnaEnabled($sna_enabled)
		{
			$this->sna_enabled = (bool)$sna_enabled;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getContentHtml()
		{
			return $this->content_html;
		}

		/**
		 * @param mixed $content_html
		 *
		 * @return Campaign
		 */
		public function setContentHtml($content_html)
		{
			$this->content_html = (string)$content_html;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getContentMobile()
		{
			return $this->content_mobile;
		}

		/**
		 * @param mixed $content_mobile
		 *
		 * @return Campaign
		 */
		public function setContentMobile($content_mobile)
		{
			$this->content_mobile = (string)$content_mobile;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDataXml()
		{
			return $this->data_xml;
		}

		/**
		 * @param mixed $data_xml
		 *
		 * @return Campaign
		 */
		public function setDataXml($data_xml)
		{
			$this->data_xml = new \SimpleXMLElement('<data_xml>' . $data_xml . '</data_xml>');

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getContentText()
		{
			return $this->content_text;
		}

		/**
		 * @param mixed $content_text
		 *
		 * @return Campaign
		 */
		public function setContentText($content_text)
		{
			$this->content_text = (string)$content_text;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id
		 *
		 * @return Campaign
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * @param mixed $realm_id
		 *
		 * @return Campaign
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getListId()
		{
			return $this->list_id;
		}

		/**
		 * @param mixed $list_id
		 *
		 * @return Campaign
		 */
		public function setListId($list_id)
		{
			$this->list_id = (int)$list_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTemplateId()
		{
			return $this->template_id;
		}

		/**
		 * @param mixed $template_id
		 *
		 * @return Campaign
		 */
		public function setTemplateId($template_id)
		{
			$this->template_id = (int)$template_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getStartDate()
		{
			return $this->start_date;
		}

		/**
		 * @param mixed $start_date
		 * @param \DateTimeZone $time_zone
		 *
		 * @return Campaign
		 */
		public function setStartDate($start_date, $time_zone)
		{
			$this->start_date = date_create_from_format('M j, Y g:i:s A', $start_date, $time_zone);

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getSubject()
		{
			return $this->subject;
		}

		/**
		 * @param mixed $subject
		 *
		 * @return Campaign
		 */
		public function setSubject($subject)
		{
			$this->subject = (string)$subject;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * @param mixed $name
		 *
		 * @return Campaign
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getAlias()
		{
			return $this->alias;
		}

		/**
		 * @param mixed $alias
		 *
		 * @return Campaign
		 */
		public function setAlias($alias)
		{
			$this->alias = (string)$alias;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDeliverability()
		{
			return $this->deliverability;
		}

		/**
		 * @param mixed $deliverability
		 *
		 * @return Campaign
		 */
		public function setDeliverability($deliverability)
		{
			$this->deliverability = (bool)$deliverability;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getForcedFormat()
		{
			return $this->forced_format;
		}

		/**
		 * @param mixed $forced_format
		 *
		 * @return Campaign
		 */
		public function setForcedFormat($forced_format)
		{
			$this->forced_format = (int)$forced_format;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getListName()
		{
			return $this->list_name;
		}

		/**
		 * @param mixed $list_name
		 *
		 * @return Campaign
		 */
		public function setListName($list_name)
		{
			$this->list_name = (string)$list_name;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getSegmentationId()
		{
			return $this->segmentation_id;
		}

		/**
		 * @param mixed $segmentation_id
		 *
		 * @return Campaign
		 */
		public function setSegmentationId($segmentation_id)
		{
			$this->segmentation_id = (int)$segmentation_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getSuppressionList()
		{
			return $this->suppression_list;
		}

		/**
		 * @param mixed $suppression_list
		 *
		 * @return Campaign
		 */
		public function setSuppressionList($suppression_list)
		{
			$this->suppression_list = (string)$suppression_list;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTemplateName()
		{
			return $this->template_name;
		}

		/**
		 * @param mixed $template_name
		 *
		 * @return Campaign
		 */
		public function setTemplateName($template_name)
		{
			$this->template_name = (string)$template_name;

			return $this;
		}

	}

	class CampaignSummary
	{
		private $total_sent;
		private $total_delivered;
		private $total_open;
		private $total_clickthroughs;
		private $total_bounced;
		private $total_hard_bounces;
		private $total_soft_bounces;
		private $total_blocked;
		private $total_complaints;
		private $total_unsubscribes;
		private $total_responders;
		private $unique_open;
		private $unique_clickthroughs;
		private $unique_unsubscribes;
		private $unique_complaints;
		private $unique_bounced;
		private $unique_soft_bounces;
		private $unique_hard_bounces;
		private $unique_blocked;
		private $click_to_open_rate;
		private $total_open_rate;
		private $unique_open_rates;
		private $responder_rates;
		private $unique_unsubscribe_rates;
		private $click_rates;
		private $unique_complaint_rates;
		private $unique_click_rates;
		private $bounce_rates;
		private $delivered_rates;

		/**
		 * @return mixed
		 */
		public function getTotalSent()
		{
			return $this->total_sent;
		}

		/**
		 * @param mixed $total_sent
		 *
		 * @return CampaignSummary
		 */
		public function setTotalSent($total_sent)
		{
			$this->total_sent = (int)$total_sent;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalDelivered()
		{
			return $this->total_delivered;
		}

		/**
		 * @param mixed $total_delivered
		 *
		 * @return CampaignSummary
		 */
		public function setTotalDelivered($total_delivered)
		{
			$this->total_delivered = (int)$total_delivered;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalOpen()
		{
			return $this->total_open;
		}

		/**
		 * @param mixed $total_open
		 *
		 * @return CampaignSummary
		 */
		public function setTotalOpen($total_open)
		{
			$this->total_open = (int)$total_open;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalClickthroughs()
		{
			return $this->total_clickthroughs;
		}

		/**
		 * @param mixed $total_clickthroughs
		 *
		 * @return CampaignSummary
		 */
		public function setTotalClickthroughs($total_clickthroughs)
		{
			$this->total_clickthroughs = (int)$total_clickthroughs;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalBounced()
		{
			return $this->total_bounced;
		}

		/**
		 * @param mixed $total_bounced
		 *
		 * @return CampaignSummary
		 */
		public function setTotalBounced($total_bounced)
		{
			$this->total_bounced = (int)$total_bounced;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalHardBounces()
		{
			return $this->total_hard_bounces;
		}

		/**
		 * @param mixed $total_hard_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setTotalHardBounces($total_hard_bounces)
		{
			$this->total_hard_bounces = (int)$total_hard_bounces;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalSoftBounces()
		{
			return $this->total_soft_bounces;
		}

		/**
		 * @param mixed $total_soft_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setTotalSoftBounces($total_soft_bounces)
		{
			$this->total_soft_bounces = (int)$total_soft_bounces;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalBlocked()
		{
			return $this->total_blocked;
		}

		/**
		 * @param mixed $total_blocked
		 *
		 * @return CampaignSummary
		 */
		public function setTotalBlocked($total_blocked)
		{
			$this->total_blocked = (int)$total_blocked;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalComplaints()
		{
			return $this->total_complaints;
		}

		/**
		 * @param mixed $total_complaints
		 *
		 * @return CampaignSummary
		 */
		public function setTotalComplaints($total_complaints)
		{
			$this->total_complaints = (int)$total_complaints;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalUnsubscribes()
		{
			return $this->total_unsubscribes;
		}

		/**
		 * @param mixed $total_unsubscribes
		 *
		 * @return CampaignSummary
		 */
		public function setTotalUnsubscribes($total_unsubscribes)
		{
			$this->total_unsubscribes = (int)$total_unsubscribes;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalResponders()
		{
			return $this->total_responders;
		}

		/**
		 * @param mixed $total_responders
		 *
		 * @return CampaignSummary
		 */
		public function setTotalResponders($total_responders)
		{
			$this->total_responders = (int)$total_responders;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueOpen()
		{
			return $this->unique_open;
		}

		/**
		 * @param mixed $unique_open
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueOpen($unique_open)
		{
			$this->unique_open = (int)$unique_open;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueClickthroughs()
		{
			return $this->unique_clickthroughs;
		}

		/**
		 * @param mixed $unique_clickthroughs
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueClickthroughs($unique_clickthroughs)
		{
			$this->unique_clickthroughs = (int)$unique_clickthroughs;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueUnsubscribes()
		{
			return $this->unique_unsubscribes;
		}

		/**
		 * @param mixed $unique_unsubscribes
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueUnsubscribes($unique_unsubscribes)
		{
			$this->unique_unsubscribes = (int)$unique_unsubscribes;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueComplaints()
		{
			return $this->unique_complaints;
		}

		/**
		 * @param mixed $unique_complaints
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueComplaints($unique_complaints)
		{
			$this->unique_complaints = (int)$unique_complaints;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueBounced()
		{
			return $this->unique_bounced;
		}

		/**
		 * @param mixed $unique_bounced
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueBounced($unique_bounced)
		{
			$this->unique_bounced = (int)$unique_bounced;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueSoftBounces()
		{
			return $this->unique_soft_bounces;
		}

		/**
		 * @param mixed $unique_soft_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueSoftBounces($unique_soft_bounces)
		{
			$this->unique_soft_bounces = (int)$unique_soft_bounces;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueHardBounces()
		{
			return $this->unique_hard_bounces;
		}

		/**
		 * @param mixed $unique_hard_bounces
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueHardBounces($unique_hard_bounces)
		{
			$this->unique_hard_bounces = (int)$unique_hard_bounces;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueBlocked()
		{
			return $this->unique_blocked;
		}

		/**
		 * @param mixed $unique_blocked
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueBlocked($unique_blocked)
		{
			$this->unique_blocked = (int)$unique_blocked;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getClickToOpenRate()
		{
			return $this->click_to_open_rate;
		}

		/**
		 * @param mixed $click_to_open_rate
		 *
		 * @return CampaignSummary
		 */
		public function setClickToOpenRate($click_to_open_rate)
		{
			$this->click_to_open_rate = (float)$click_to_open_rate;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTotalOpenRate()
		{
			return $this->total_open_rate;
		}

		/**
		 * @param mixed $total_open_rate
		 *
		 * @return CampaignSummary
		 */
		public function setTotalOpenRate($total_open_rate)
		{
			$this->total_open_rate = (float)$total_open_rate;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueOpenRates()
		{
			return $this->unique_open_rates;
		}

		/**
		 * @param mixed $unique_open_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueOpenRates($unique_open_rates)
		{
			$this->unique_open_rates = (float)$unique_open_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getResponderRates()
		{
			return $this->responder_rates;
		}

		/**
		 * @param mixed $responder_rates
		 *
		 * @return CampaignSummary
		 */
		public function setResponderRates($responder_rates)
		{
			$this->responder_rates = (float)$responder_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueUnsubscribeRates()
		{
			return $this->unique_unsubscribe_rates;
		}

		/**
		 * @param mixed $unique_unsubscribe_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueUnsubscribeRates($unique_unsubscribe_rates)
		{
			$this->unique_unsubscribe_rates = (float)$unique_unsubscribe_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getClickRates()
		{
			return $this->click_rates;
		}

		/**
		 * @param mixed $click_rates
		 *
		 * @return CampaignSummary
		 */
		public function setClickRates($click_rates)
		{
			$this->click_rates = (float)$click_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueComplaintRates()
		{
			return $this->unique_complaint_rates;
		}

		/**
		 * @param mixed $unique_complaint_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueComplaintRates($unique_complaint_rates)
		{
			$this->unique_complaint_rates = (float)$unique_complaint_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueClickRates()
		{
			return $this->unique_click_rates;
		}

		/**
		 * @param mixed $unique_click_rates
		 *
		 * @return CampaignSummary
		 */
		public function setUniqueClickRates($unique_click_rates)
		{
			$this->unique_click_rates = (float)$unique_click_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getBounceRates()
		{
			return $this->bounce_rates;
		}

		/**
		 * @param mixed $bounce_rates
		 *
		 * @return CampaignSummary
		 */
		public function setBounceRates($bounce_rates)
		{
			$this->bounce_rates = (float)$bounce_rates;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDeliveredRates()
		{
			return $this->delivered_rates;
		}

		/**
		 * @param mixed $delivered_rates
		 *
		 * @return CampaignSummary
		 */
		public function setDeliveredRates($delivered_rates)
		{
			$this->delivered_rates = (float)$delivered_rates;

			return $this;
		}


	}