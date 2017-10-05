<?php

namespace Zaycon\Whatcounts_Rest\Models;

use Zaycon\Whatcounts_Rest\WhatCounts;

/**
 * Class SubscriberEvents
 * @package Whatcounts_Rest\Models
 */
class SubscriberEvents
{
    /**
     * trackingId field from API
     *
     * @var integer $id
     */
    private $id;

    /**
     * trackingCampaignId field from API
     *
     * @var integer $campaign_id
     */
    private $campaign_id;

    /**
     * trackingEventDate field from API
     *
     * @var \DateTime $event_date
     */
    private $event_date;

    /**
     * trackingRealmId field from API
     *
     * @var integer $realm_id
     */
    private $realm_id;

    /**
     * trackingListId field from API
     *
     * @var integer $list_id
     */
    private $list_id;

    /**
     * trackingSubscriberId field from API
     *
     * @var integer $subscriber_id
     */
    private $subscriber_id;

    /**
     * trackingEventType field from API
     *
     * @var integer $tracking_event_type
     */
    private $tracking_event_type;

    /**
     * eventType field from API
     *
     * @var string $event_type
     */
    private $event_type;

    /**
     * trackingClickthroughId field from API
     *
     * @var integer $clickthrough_id
     */
    private $clickthrough_id;

    /**
     * trackingMetaData field from API
     *
     * @var string $meta_data
     */
    private $meta_data;

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
     * Event constructor.
     *
     * @param \stdClass|NULL $event_response
     * @param null           $time_zone
     */
    public function __construct(\stdClass $event_response = NULL, $time_zone = NULL)
    {
        if (isset($event_response))
        {
            $this
                ->setId($event_response->trackingId)
                ->setCampaignId($event_response->trackingCampaignId)
                ->setRealmId($event_response->trackingRealmId)
                ->setEventDate($event_response->trackingEventDate, 'M j, Y g:i:s A', $time_zone)
                ->setListId($event_response->trackingListId)
                ->setSubscriberId($event_response->trackingSubscriberId)
                ->setTrackingEventType($event_response->trackingEventType)
                ->setEventType($event_response->eventType)
                ->setClickthroughId($event_response->trackingClickthroughId)
                ->setMetaData(WhatCounts::existsOrNull($event_response, 'trackingMetaData'))
                ->setSkip($event_response->skip)
                ->setMax($event_response->max);
        }
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
     * @return SubscriberEvents
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the private variable campaign_id
     *
     * @return int
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * Sets the private variable campaign_id
     *
     * @param int $campaign_id
     *
     * @return SubscriberEvents
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = (int)$campaign_id;

        return $this;
    }

    /**
     * Gets the private variable event_date
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Sets the private variable event_date
     *
     * @param \DateTime $event_date
     * @param string $format
     * @param string $time_zone
     *
     * @return SubscriberEvents
     */
    public function setEventDate($event_date, $format, $time_zone)
    {
        $this->event_date = date_create_from_format($format, $event_date, $time_zone);

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
     * @return SubscriberEvents
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
     * @return SubscriberEvents
     */
    public function setListId($list_id)
    {
        $this->list_id = (int)$list_id;

        return $this;
    }

    /**
     * Gets the private variable subscriber_id
     *
     * @return int
     */
    public function getSubscriberId()
    {
        return $this->subscriber_id;
    }

    /**
     * Sets the private variable subscriber_id
     *
     * @param int $subscriber_id
     *
     * @return SubscriberEvents
     */
    public function setSubscriberId($subscriber_id)
    {
        $this->subscriber_id = (int)$subscriber_id;

        return $this;
    }

    /**
     * Gets the private variable tracking_event_type
     *
     * @return int
     */
    public function getTrackingEventType()
    {
        return $this->tracking_event_type;
    }

    /**
     * Sets the private variable tracking_event_type
     *
     * @param int $tracking_event_type
     *
     * @return SubscriberEvents
     */
    public function setTrackingEventType($tracking_event_type)
    {
        $this->tracking_event_type = (int)$tracking_event_type;

        return $this;
    }

    /**
     * Gets the private variable event_type
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Sets the private variable event_type
     *
     * @param string $event_type
     *
     * @return SubscriberEvents
     */
    public function setEventType($event_type)
    {
        $this->event_type = (string)$event_type;

        return $this;
    }

    /**
     * Gets the private variable clickthrough_id
     *
     * @return int
     */
    public function getClickthroughId()
    {
        return $this->clickthrough_id;
    }

    /**
     * Sets the private variable clickthrough_id
     *
     * @param int $clickthrough_id
     *
     * @return SubscriberEvents
     */
    public function setClickthroughId($clickthrough_id)
    {
        $this->clickthrough_id = (int)$clickthrough_id;

        return $this;
    }

    /**
     * Gets the private variable meta_data
     *
     * @return string
     */
    public function getMetaData()
    {
        return $this->meta_data;
    }

    /**
     * Sets the private variable meta_data
     *
     * @param string $meta_data
     *
     * @return SubscriberEvents
     */
    public function setMetaData($meta_data)
    {
        $this->meta_data = (string)$meta_data;

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
     * @return SubscriberEvents
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
     * @return SubscriberEvents
     */
    public function setMax($max)
    {
        $this->max = (int)$max;

        return $this;
    }
}
