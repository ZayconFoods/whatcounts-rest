<?php

namespace Zaycon\Whatcounts_Rest;

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