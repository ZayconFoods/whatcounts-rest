<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 4/15/16
 * Time: 1:35 PM
 */

namespace ZayconWhatCounts;


/**
 * Class MailingList
 * @package ZayconWhatCounts
 */
class MailingList
{
	/**
     * @var integer $id
     */
    private $id;

	/**
     * @var integer $realm_id
     */
    private $realm_id;

	/**
     * @var integer $template_id
     */
    private $template_id;

	/**
     * @var string $name
     */
    private $name;

	/**
     * @var integer $folder_id
     */
    private $folder_id;

	/**
     * @var integer $type
     */
    private $type;

	/**
     * @var string $from_address
     */
    private $from_address;

	/**
     * @var string $reply_to_address
     */
    private $reply_to_address;

	/**
     * @var string $mail_from_address
     */
    private $mail_from_address;

	/**
     * @var string $description
     */
    private $description;

	/**
     * @var \DateTime $created_date
     */
    private $created_date;

	/**
     * @var \DateTime $updated_date
     */
    private $updated_date;

	/**
     * @var integer $subscribe_email_template_id
     */
    private $subscribe_email_template_id;

	/**
     * @var integer $unsubscribe_email_template_id
     */
    private $unsubscribe_email_template_id;

	/**
     * @var boolean $confirm_subs
     */
    private $confirm_subs;

	/**
     * @var boolean $send_courtesy_subs_email
     */
    private $send_courtesy_subs_email;

	/**
     * @var boolean $send_courtesy_unsubs_email
     */
    private $send_courtesy_unsubs_email;

	/**
     * @var string $admin_email
     */
    private $admin_email;

	/**
     * @var string $confirmation_sub_goto
     */
    private $confirmation_sub_goto;

	/**
     * @var string $confirmation_unsub_goto
     */
    private $confirmation_unsub_goto;

	/**
     * @var boolean $tracking_read_enabled
     */
    private $tracking_read_enabled;

	/**
     * @var boolean $tracking_clickthrough_enabled
     */
    private $tracking_clickthrough_enabled;

	/**
     * @var boolean $use_sticky_campaign
     */
    private $use_sticky_campaign;

	/**
     * @var boolean $ftaf_use_list_from_address
     */
    private $ftaf_use_list_from_address;

	/**
     * @var integer $vmta_id
     */
    private $vmta_id;

	/**
     * @var integer $base_url_id
     */
    private $base_url_id;

	/**
     * @var boolean $unsubscribe_header_enabled
     */
    private $unsubscribe_header_enabled;

	/**
     * @var integer $parent_template_id
     */
    private $parent_template_id;

	/**
     * @var boolean $is_template
     */
    private $is_template;

	/**
     * @var integer $default_lifecycle_campaign_id
     */
    private $default_lifecycle_campaign_id;

	/**
     * @var boolean $default_lifecycle
     */
    private $default_lifecycle;

	/**
     * @var string $unsub_header_http_value
     */
    private $unsub_header_http_value;

	/**
     * @var string $unsub_header_email_value
     */
    private $unsub_header_email_value;

	/**
     * @var integer $subscriber_count_total 
     */
    private $subscriber_count_total;

	/**
     * @var integer $subscriber_count_plain
     */
    private $subscriber_count_plain;

	/**
     * @var integer $subscriber_count_html
     */
    private $subscriber_count_html;

	/**
     * @var integer $subscriber_count_rss
     */
    private $subscriber_count_rss;

	/**
     * @var integer $subscriber_count_mime
     */
    private $subscriber_count_mime;

	/**
     * @var integer $skip
     */
    private $skip;

	/**
     * @var integer $max
     */
    private $max;

	/**
     * MailingList constructor.
     *
     * @param \stdClass|NULL $list_response
     * @param null           $time_zone
     */
    public function __construct(\stdClass $list_response = NULL, $time_zone = NULL)
    {
        if (isset($list_response))
        {
            $this
                ->setId($list_response->listId)
                ->setRealmId($list_response->listRealmId)
                ->setTemplateId($list_response->listTemplateId)
                ->setName($list_response->listName)
                ->setFolderId($list_response->listFolderId)
                ->setType($list_response->type)
                ->setFromAddress($list_response->listFromAddress)
                ->setReplyToAddress($list_response->listReplyToAddress)
                ->setMailFromAddress($list_response->listMailFromAddress)
                ->setDescription($list_response->listDescription)
                ->setCreatedDate($list_response->listCreatedDate, 'M j, Y g:i:s A', $time_zone)
                ->setUpdatedDate($list_response->listUpdatedDate, 'M j, Y g:i:s A', $time_zone)
                ->setSubscribeEmailTemplateId($list_response->listSubscribeEmailTemplateId)
                ->setUnsubscribeEmailTemplateId($list_response->listUnsubscribeEmailTemplateId)
                ->setConfirmSubs($list_response->listConfirmSubs)
                ->setSendCourtesySubsEmail($list_response->listSendCourtesySubsEmail)
                ->setSendCourtesyUnsubsEmail($list_response->listSendCourtesyUnsubsEmail)
                ->setAdminEmail($list_response->listAdminEmail)
                ->setConfirmationSubGoto($list_response->listConfirmationSubGoto)
                ->setConfirmationUnsubGoto($list_response->listConfirmationUnsubGoto)
                ->setTrackingReadEnabled($list_response->listTrackingReadEnabled)
                ->setTrackingClickthroughEnabled($list_response->listTrackingClickthroughEnabled)
                ->setUseStickyCampaign($list_response->listUseStickyCampaign)
                ->setFtafUseListFromAddress($list_response->ftafUseListFromAddress)
                ->setVmtaId($list_response->vmtaId)
                ->setBaseUrlId($list_response->baseUrlId)
                ->setUnsubscribeHeaderEnabled($list_response->unsubscribeHeaderEnabled)
                ->setParentTemplateId($list_response->parentTemplateId)
                ->setIsTemplate($list_response->isTemplate)
                ->setDefaultLifecycleCampaignId($list_response->defaultLifecycleCampaignId)
                ->setDefaultLifecycle($list_response->defaultLifecycle)
                ->setUnsubHeaderHttpValue($list_response->unsubHeaderHttpValue)
                ->setUnsubHeaderEmailValue($list_response->unsubHeaderEmailValue)
                ->setSubscriberCountTotal($list_response->subscriberCountTotal)
                ->setSubscriberCountPlain($list_response->subscriberCountPlain)
                ->setSubscriberCountHtml($list_response->subscriberCountHtml)
                ->setSubscriberCountRss($list_response->subscriberCountRss)
                ->setSubscriberCountMime($list_response->subscriberCountMime)
                ->setSkip($list_response->skip)
                ->setMax($list_response->max);
        }
    }

	/**
     * @return array
     */
    public function getRequestArray()
    {
        $request_array = array(
            'listRealmId' => $this->getRealmId(),
            'listTemplateId' => $this->getTemplateId(),
            'listName' => $this->getName(),
            'listFolderId' => $this->getFolderId(),
            'listFromAddress' => $this->getFromAddress(),
            'listReplyToAddress' => $this->getReplyToAddress(),
            'listMailFromAddress' => $this->getMailFromAddress(),
            'listDescription' => $this->getDescription(),
            'listSubscribeEmailTemplateId' => $this->getSubscribeEmailTemplateId(),
            'listUnsubscribeEmailTemplateId' => $this->getUnsubscribeEmailTemplateId(),
            'listConfirmSubs' => $this->isConfirmSubs(),
            'listSendCourtesySubsEmail' => $this->isSendCourtesySubsEmail(),
            'listSendCourtesyUnsubsEmail' => $this->isSendCourtesyUnsubsEmail(),
            'listAdminEmail' => $this->getAdminEmail(),
            'listConfirmationSubGoto' => $this->getConfirmationSubGoto(),
            'listConfirmationUnsubGoto' => $this->getConfirmationUnsubGoto(),
            'listTrackingReadEnabled' => $this->isTrackingReadEnabled(),
            'listTrackingClickthroughEnabled' => $this->isTrackingClickthroughEnabled(),
            'listUseStickyCampaign' => $this->isUseStickyCampaign(),
            'ftafUseListFromAddress' => $this->isFtafUseListFromAddress(),
            'vmtaId' => $this->getVmtaId(),
            'baseUrlId' => $this->getBaseUrlId(),
            'unsubscribeHeaderEnabled' => $this->isUnsubscribeHeaderEnabled(),
            'parentTemplateId' => $this->getParentTemplateId(),
            'isTemplate' => $this->isIsTemplate(),
            'defaultLifecycleCampaignId' => $this->getDefaultLifecycleCampaignId(),
            'defaultLifecycle' => $this->isDefaultLifecycle(),
            'unsubHeaderHttpValue' => $this->getUnsubHeaderHttpValue(),
            'unsubHeaderEmailValue' => $this->getUnsubHeaderEmailValue()
        );
        return $request_array;
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
     * @return MailingList
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
     * @return MailingList
     */
    public function setRealmId($realm_id)
    {
        $this->realm_id = (int)$realm_id;

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
     * @return MailingList
     */
    public function setTemplateId($template_id)
    {
        $this->template_id = (int)$template_id;

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
     * @return MailingList
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * Sets the private variable folder_id
     *
     * @return int
     */
    public function getFolderId()
    {
        return $this->folder_id;
    }

    /**
     * Gets the private variable folder_id
     *
     * @param int $folder_id
     *
     * @return MailingList
     */
    public function setFolderId($folder_id)
    {
        $this->folder_id = (int)$folder_id;

        return $this;
    }

    /**
     * Sets the private variable type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Gets the private variable type
     *
     * @param int $type
     *
     * @return MailingList
     */
    public function setType($type)
    {
        $this->type = (int)$type;

        return $this;
    }

    /**
     * Sets the private variable from_address
     *
     * @return string
     */
    public function getFromAddress()
    {
        return $this->from_address;
    }

    /**
     * Gets the private variable from_address
     *
     * @param string $from_address
     *
     * @return MailingList
     */
    public function setFromAddress($from_address)
    {
        $this->from_address = (string)$from_address;

        return $this;
    }

    /**
     * Sets the private variable reply_to_address
     *
     * @return string
     */
    public function getReplyToAddress()
    {
        return $this->reply_to_address;
    }

    /**
     * Gets the private variable reply_to_address
     *
     * @param string $reply_to_address
     *
     * @return MailingList
     */
    public function setReplyToAddress($reply_to_address)
    {
        $this->reply_to_address = (string)$reply_to_address;

        return $this;
    }

    /**
     * Sets the private variable mail_from_address
     *
     * @return string
     */
    public function getMailFromAddress()
    {
        return $this->mail_from_address;
    }

    /**
     * Gets the private variable mail_from_address
     *
     * @param string $mail_from_address
     *
     * @return MailingList
     */
    public function setMailFromAddress($mail_from_address)
    {
        $this->mail_from_address = (string)$mail_from_address;

        return $this;
    }

    /**
     * Sets the private variable description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the private variable description
     *
     * @param string $description
     *
     * @return MailingList
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * Sets the private variable created_date
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Gets the private variable created_date
     *
     * @param \DateTime $created_date
     * @param string $format
     * @param string $time_zone
     *
     * @return MailingList
     */
    public function setCreatedDate($created_date, $format, $time_zone)
    {
        $this->created_date = date_create_from_format($format, $created_date, $time_zone);

        return $this;
    }

    /**
     * Sets the private variable updated_date
     *
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * Gets the private variable updated_date
     *
     * @param \DateTime $updated_date
     * @param string $format
     * @param string $time_zone
     *
     * @return MailingList
     */
    public function setUpdatedDate($updated_date, $format, $time_zone)
    {
        $this->updated_date = date_create_from_format($format, $updated_date, $time_zone);

        return $this;
    }

    /**
     * Sets the private variable subscribe_email_template_id
     *
     * @return int
     */
    public function getSubscribeEmailTemplateId()
    {
        return $this->subscribe_email_template_id;
    }

    /**
     * Gets the private variable subscribe_email_template_id
     *
     * @param int $subscribe_email_template_id
     *
     * @return MailingList
     */
    public function setSubscribeEmailTemplateId($subscribe_email_template_id)
    {
        $this->subscribe_email_template_id = (int)$subscribe_email_template_id;

        return $this;
    }

    /**
     * Sets the private variable unsubscribe_email_template_id
     *
     * @return int
     */
    public function getUnsubscribeEmailTemplateId()
    {
        return $this->unsubscribe_email_template_id;
    }

    /**
     * Gets the private variable unsubscribe_email_template_id
     *
     * @param int $unsubscribe_email_template_id
     *
     * @return MailingList
     */
    public function setUnsubscribeEmailTemplateId($unsubscribe_email_template_id)
    {
        $this->unsubscribe_email_template_id = (int)$unsubscribe_email_template_id;

        return $this;
    }

    /**
     * Sets the private variable confirm_subs
     *
     * @return boolean
     */
    public function isConfirmSubs()
    {
        return $this->confirm_subs;
    }

    /**
     * Gets the private variable confirm_subs
     *
     * @param boolean $confirm_subs
     *
     * @return MailingList
     */
    public function setConfirmSubs($confirm_subs)
    {
        $this->confirm_subs = (boolean)($confirm_subs === TRUE || $confirm_subs == 1);

        return $this;
    }

    /**
     * Sets the private variable send_courtesy_subs_email
     *
     * @return boolean
     */
    public function isSendCourtesySubsEmail()
    {
        return $this->send_courtesy_subs_email;
    }

    /**
     * Gets the private variable send_courtesy_subs_email
     *
     * @param boolean $send_courtesy_subs_email
     *
     * @return MailingList
     */
    public function setSendCourtesySubsEmail($send_courtesy_subs_email)
    {
        $this->send_courtesy_subs_email = (boolean)($send_courtesy_subs_email === TRUE || $send_courtesy_subs_email == 1);

        return $this;
    }

    /**
     * Sets the private variable send_courtesy_unsubs_email
     *
     * @return boolean
     */
    public function isSendCourtesyUnsubsEmail()
    {
        return $this->send_courtesy_unsubs_email;
    }

    /**
     * Gets the private variable send_courtesy_unsubs_email
     *
     * @param boolean $send_courtesy_unsubs_email
     *
     * @return MailingList
     */
    public function setSendCourtesyUnsubsEmail($send_courtesy_unsubs_email)
    {
        $this->send_courtesy_unsubs_email = (boolean)($send_courtesy_unsubs_email === TRUE || $send_courtesy_unsubs_email == 1);

        return $this;
    }

    /**
     * Sets the private variable admin_email
     *
     * @return string
     */
    public function getAdminEmail()
    {
        return $this->admin_email;
    }

    /**
     * Gets the private variable admin_email
     *
     * @param string $admin_email
     *
     * @return MailingList
     */
    public function setAdminEmail($admin_email)
    {
        $this->admin_email = (string)$admin_email;

        return $this;
    }

    /**
     * Sets the private variable confirmation_sub_goto
     *
     * @return string
     */
    public function getConfirmationSubGoto()
    {
        return $this->confirmation_sub_goto;
    }

    /**
     * Gets the private variable confirmation_sub_goto
     *
     * @param string $confirmation_sub_goto
     *
     * @return MailingList
     */
    public function setConfirmationSubGoto($confirmation_sub_goto)
    {
        $this->confirmation_sub_goto = (string)$confirmation_sub_goto;

        return $this;
    }

    /**
     * Sets the private variable confirmation_unsub_goto
     *
     * @return string
     */
    public function getConfirmationUnsubGoto()
    {
        return $this->confirmation_unsub_goto;
    }

    /**
     * Gets the private variable confirmation_unsub_goto
     *
     * @param string $confirmation_unsub_goto
     *
     * @return MailingList
     */
    public function setConfirmationUnsubGoto($confirmation_unsub_goto)
    {
        $this->confirmation_unsub_goto = (string)$confirmation_unsub_goto;

        return $this;
    }

    /**
     * Sets the private variable tracking_read_enabled
     *
     * @return boolean
     */
    public function isTrackingReadEnabled()
    {
        return $this->tracking_read_enabled;
    }

    /**
     * Gets the private variable tracking_read_enabled
     *
     * @param boolean $tracking_read_enabled
     *
     * @return MailingList
     */
    public function setTrackingReadEnabled($tracking_read_enabled)
    {
        $this->tracking_read_enabled = (boolean)($tracking_read_enabled === TRUE || $tracking_read_enabled == 1);

        return $this;
    }

    /**
     * Sets the private variable tracking_clickthrough_enabled
     *
     * @return boolean
     */
    public function isTrackingClickthroughEnabled()
    {
        return $this->tracking_clickthrough_enabled;
    }

    /**
     * Gets the private variable tracking_clickthrough_enabled
     *
     * @param boolean $tracking_clickthrough_enabled
     *
     * @return MailingList
     */
    public function setTrackingClickthroughEnabled($tracking_clickthrough_enabled)
    {
        $this->tracking_clickthrough_enabled = (boolean)($tracking_clickthrough_enabled === TRUE || $tracking_clickthrough_enabled == 1);

        return $this;
    }

    /**
     * Sets the private variable use_sticky_campaign
     *
     * @return boolean
     */
    public function isUseStickyCampaign()
    {
        return $this->use_sticky_campaign;
    }

    /**
     * Gets the private variable use_sticky_campaign
     *
     * @param boolean $use_sticky_campaign
     *
     * @return MailingList
     */
    public function setUseStickyCampaign($use_sticky_campaign)
    {
        $this->use_sticky_campaign = (boolean)($use_sticky_campaign === TRUE || $use_sticky_campaign == 1);

        return $this;
    }

    /**
     * Sets the private variable ftaf_use_list_from_address
     *
     * @return boolean
     */
    public function isFtafUseListFromAddress()
    {
        return $this->ftaf_use_list_from_address;
    }

    /**
     * Gets the private variable ftaf_use_list_from_address
     *
     * @param boolean $ftaf_use_list_from_address
     *
     * @return MailingList
     */
    public function setFtafUseListFromAddress($ftaf_use_list_from_address)
    {
        $this->ftaf_use_list_from_address = (boolean)($ftaf_use_list_from_address === TRUE || $ftaf_use_list_from_address == 1);

        return $this;
    }

    /**
     * Sets the private variable vmta_id
     *
     * @return int
     */
    public function getVmtaId()
    {
        return $this->vmta_id;
    }

    /**
     * Gets the private variable vmta_id
     *
     * @param int $vmta_id
     *
     * @return MailingList
     */
    public function setVmtaId($vmta_id)
    {
        $this->vmta_id = (int)$vmta_id;

        return $this;
    }

    /**
     * Sets the private variable base_url_id
     *
     * @return int
     */
    public function getBaseUrlId()
    {
        return $this->base_url_id;
    }

    /**
     * Gets the private variable base_url_id
     *
     * @param int $base_url_id
     *
     * @return MailingList
     */
    public function setBaseUrlId($base_url_id)
    {
        $this->base_url_id = (int)$base_url_id;

        return $this;
    }

    /**
     * Sets the private variable unsubscribe_header_enabled
     *
     * @return boolean
     */
    public function isUnsubscribeHeaderEnabled()
    {
        return $this->unsubscribe_header_enabled;
    }

    /**
     * Gets the private variable unsubscribe_header_enabled
     *
     * @param boolean $unsubscribe_header_enabled
     *
     * @return MailingList
     */
    public function setUnsubscribeHeaderEnabled($unsubscribe_header_enabled)
    {
        $this->unsubscribe_header_enabled = (boolean)($unsubscribe_header_enabled === TRUE || $unsubscribe_header_enabled == 1);

        return $this;
    }

    /**
     * Sets the private variable parent_template_id
     *
     * @return int
     */
    public function getParentTemplateId()
    {
        return $this->parent_template_id;
    }

    /**
     * Gets the private variable parent_template_id
     *
     * @param int $parent_template_id
     *
     * @return MailingList
     */
    public function setParentTemplateId($parent_template_id)
    {
        $this->parent_template_id = (int)$parent_template_id;

        return $this;
    }

    /**
     * Sets the private variable is_template
     *
     * @return boolean
     */
    public function isIsTemplate()
    {
        return $this->is_template;
    }

    /**
     * Gets the private variable is_template
     *
     * @param boolean $is_template
     *
     * @return MailingList
     */
    public function setIsTemplate($is_template)
    {
        $this->is_template = (boolean)($is_template === TRUE || $is_template == 1);

        return $this;
    }

    /**
     * Sets the private variable default_lifecycle_campaign_id
     *
     * @return int
     */
    public function getDefaultLifecycleCampaignId()
    {
        return $this->default_lifecycle_campaign_id;
    }

    /**
     * Gets the private variable default_lifecycle_campaign_id
     *
     * @param int $default_lifecycle_campaign_id
     *
     * @return MailingList
     */
    public function setDefaultLifecycleCampaignId($default_lifecycle_campaign_id)
    {
        $this->default_lifecycle_campaign_id = (int)$default_lifecycle_campaign_id;

        return $this;
    }

    /**
     * Sets the private variable default_lifecycle
     *
     * @return boolean
     */
    public function isDefaultLifecycle()
    {
        return $this->default_lifecycle;
    }

    /**
     * Gets the private variable default_lifecycle
     *
     * @param boolean $default_lifecycle
     *
     * @return MailingList
     */
    public function setDefaultLifecycle($default_lifecycle)
    {
        $this->default_lifecycle = (boolean)($default_lifecycle === TRUE || $default_lifecycle == 1);

        return $this;
    }

    /**
     * Sets the private variable unsub_header_http_value
     *
     * @return string
     */
    public function getUnsubHeaderHttpValue()
    {
        return $this->unsub_header_http_value;
    }

    /**
     * Gets the private variable unsub_header_http_value
     *
     * @param string $unsub_header_http_value
     *
     * @return MailingList
     */
    public function setUnsubHeaderHttpValue($unsub_header_http_value)
    {
        $this->unsub_header_http_value = (string)$unsub_header_http_value;

        return $this;
    }

    /**
     * Sets the private variable unsub_header_email_value
     *
     * @return string
     */
    public function getUnsubHeaderEmailValue()
    {
        return $this->unsub_header_email_value;
    }

    /**
     * Gets the private variable unsub_header_email_value
     *
     * @param string $unsub_header_email_value
     *
     * @return MailingList
     */
    public function setUnsubHeaderEmailValue($unsub_header_email_value)
    {
        $this->unsub_header_email_value = (string)$unsub_header_email_value;

        return $this;
    }

    /**
     * Sets the private variable subscriber_count_total
     *
     * @return int
     */
    public function getSubscriberCountTotal()
    {
        return $this->subscriber_count_total;
    }

    /**
     * Gets the private variable subscriber_count_total
     *
     * @param int $subscriber_count_total
     *
     * @return MailingList
     */
    public function setSubscriberCountTotal($subscriber_count_total)
    {
        $this->subscriber_count_total = (int)$subscriber_count_total;

        return $this;
    }

    /**
     * Sets the private variable subscriber_count_plain
     *
     * @return int
     */
    public function getSubscriberCountPlain()
    {
        return $this->subscriber_count_plain;
    }

    /**
     * Gets the private variable subscriber_count_plain
     *
     * @param int $subscriber_count_plain
     *
     * @return MailingList
     */
    public function setSubscriberCountPlain($subscriber_count_plain)
    {
        $this->subscriber_count_plain = (int)$subscriber_count_plain;

        return $this;
    }

    /**
     * Sets the private variable subscriber_count_html
     *
     * @return int
     */
    public function getSubscriberCountHtml()
    {
        return $this->subscriber_count_html;
    }

    /**
     * Gets the private variable subscriber_count_html
     *
     * @param int $subscriber_count_html
     *
     * @return MailingList
     */
    public function setSubscriberCountHtml($subscriber_count_html)
    {
        $this->subscriber_count_html = (int)$subscriber_count_html;

        return $this;
    }

    /**
     * Sets the private variable subscriber_count_rss
     *
     * @return int
     */
    public function getSubscriberCountRss()
    {
        return $this->subscriber_count_rss;
    }

    /**
     * Gets the private variable subscriber_count_rss
     *
     * @param int $subscriber_count_rss
     *
     * @return MailingList
     */
    public function setSubscriberCountRss($subscriber_count_rss)
    {
        $this->subscriber_count_rss = (int)$subscriber_count_rss;

        return $this;
    }

    /**
     * Sets the private variable subscriber_count_mime
     *
     * @return int
     */
    public function getSubscriberCountMime()
    {
        return $this->subscriber_count_mime;
    }

    /**
     * Gets the private variable subscriber_count_mime
     *
     * @param int $subscriber_count_mime
     *
     * @return MailingList
     */
    public function setSubscriberCountMime($subscriber_count_mime)
    {
        $this->subscriber_count_mime = (int)$subscriber_count_mime;

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
     * @return MailingList
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
     * @return MailingList
     */
    public function setMax($max)
    {
        $this->max = (int)$max;

        return $this;
    }

}
