<?php

namespace Zaycon\Whatcounts_Rest\Models;

use Zaycon\Whatcounts_Rest\CampaignSummary;

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

            if (isset($campaign_response->campaignTemplateName))
            {
                $this->setTemplateName($campaign_response->campaignTemplateName);
            }

            if (isset($campaign_response->campaignStartDate))
            {
                $this->setStartDate($campaign_response->campaignStartDate, 'M j, Y g:i:s A', $time_zone);
            }

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
