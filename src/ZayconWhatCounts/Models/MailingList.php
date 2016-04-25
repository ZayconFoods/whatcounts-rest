<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 4/15/16
 * Time: 1:35 PM
 */

namespace ZayconWhatCounts;

class MailingList
{
    private $id;
    private $realm_id;
    private $template_id;
    private $name;
    private $folder_id;
    private $type;
    private $from_address;
    private $reply_to_address;
    private $mail_from_address;
    private $description;
    private $created_date;
    private $updated_date;
    private $subscribe_email_template_id;
    private $unsubscribe_email_template_id;
    private $confirm_subs;
    private $send_courtesy_subs_email;
    private $send_courtesy_unsubs_email;
    private $admin_email;
    private $confirmation_sub_goto;
    private $confirmation_unsub_goto;
    private $tracking_read_enabled;
    private $tracking_clickthrough_enabled;
    private $use_sticky_campaign;
    private $ftaf_use_list_from_address;
    private $vmta_id;
    private $base_url_id;
    private $unsubscribe_header_enabled;
    private $parent_template_id;
    private $is_template;
    private $default_lifecycle_campaign_id;
    private $default_lifecycle;
    private $unsub_header_http_value;
    private $unsub_header_email_value;
    private $subscriber_count_total;
    private $subscriber_count_plain;
    private $subscriber_count_html;
    private $subscriber_count_rss;
    private $subscriber_count_mime;

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
                ->setCreatedDate($list_response->listCreatedDate, $time_zone)
                ->setUpdatedDate($list_response->listUpdatedDate, $time_zone)
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
                ->setSubscriberCountMime($list_response->subscriberCountMime);
        }
    }

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
            'listConfirmSubs' => $this->getConfirmSubs(),
            'listSendCourtesySubsEmail' => $this->getSendCourtesySubsEmail(),
            'listSendCourtesyUnsubsEmail' => $this->getSendCourtesyUnsubsEmail(),
            'listAdminEmail' => $this->getAdminEmail(),
            'listConfirmationSubGoto' => $this->getConfirmationSubGoto(),
            'listConfirmationUnsubGoto' => $this->getConfirmationUnsubGoto(),
            'listTrackingReadEnabled' => $this->getTrackingReadEnabled(),
            'listTrackingClickthroughEnabled' => $this->getTrackingClickthroughEnabled(),
            'listUseStickyCampaign' => $this->getUseStickyCampaign(),
            'ftafUseListFromAddress' => $this->getFtafUseListFromAddress(),
            'vmtaId' => $this->getVmtaId(),
            'baseUrlId' => $this->getBaseUrlId(),
            'unsubscribeHeaderEnabled' => $this->getUnsubscribeHeaderEnabled(),
            'parentTemplateId' => $this->getParentTemplateId(),
            'isTemplate' => $this->getIsTemplate(),
            'defaultLifecycleCampaignId' => $this->getDefaultLifecycleCampaignId(),
            'defaultLifecycle' => $this->getDefaultLifecycle(),
            'unsubHeaderHttpValue' => $this->getUnsubHeaderHttpValue(),
            'unsubHeaderEmailValue' => $this->getUnsubHeaderEmailValue()
        );
        return $request_array;
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
     * @return MailingList
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
     * @return MailingList
     */
    public function setRealmId($realm_id)
    {
        $this->realm_id = (int)$realm_id;

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
     * @return MailingList
     */
    public function setTemplateId($template_id)
    {
        $this->template_id = (int)$template_id;

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
     * @return MailingList
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFolderId()
    {
        return $this->folder_id;
    }

    /**
     * @param mixed $folder_id
     *
     * @return MailingList
     */
    public function setFolderId($folder_id)
    {
        $this->folder_id = (int)$folder_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return MailingList
     */
    public function setType($type)
    {
        $this->type = (int)$type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFromAddress()
    {
        return $this->from_address;
    }

    /**
     * @param mixed $from_address
     *
     * @return MailingList
     */
    public function setFromAddress($from_address)
    {
        $this->from_address = (string)$from_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReplyToAddress()
    {
        return $this->reply_to_address;
    }

    /**
     * @param mixed $reply_to_address
     *
     * @return MailingList
     */
    public function setReplyToAddress($reply_to_address)
    {
        $this->reply_to_address = (string)$reply_to_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMailFromAddress()
    {
        return $this->mail_from_address;
    }

    /**
     * @param mixed $mail_from_address
     *
     * @return MailingList
     */
    public function setMailFromAddress($mail_from_address)
    {
        $this->mail_from_address = (string)$mail_from_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return MailingList
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * @param mixed $created_date
     * @param \DateTimeZone $time_zone
     *
     * @return MailingList
     */
    public function setCreatedDate($created_date, $time_zone)
    {
        $this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date, $time_zone);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * @param mixed $updated_date
     * @param \DateTimeZone $time_zone
     *
     * @return MailingList
     */
    public function setUpdatedDate($updated_date, $time_zone)
    {
        $this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date, $time_zone);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscribeEmailTemplateId()
    {
        return $this->subscribe_email_template_id;
    }

    /**
     * @param mixed $subscribe_email_template_id
     *
     * @return MailingList
     */
    public function setSubscribeEmailTemplateId($subscribe_email_template_id)
    {
        $this->subscribe_email_template_id = (int)$subscribe_email_template_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnsubscribeEmailTemplateId()
    {
        return $this->unsubscribe_email_template_id;
    }

    /**
     * @param mixed $unsubscribe_email_template_id
     *
     * @return MailingList
     */
    public function setUnsubscribeEmailTemplateId($unsubscribe_email_template_id)
    {
        $this->unsubscribe_email_template_id = (int)$unsubscribe_email_template_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfirmSubs()
    {
        return $this->confirm_subs;
    }

    /**
     * @param mixed $confirm_subs
     *
     * @return MailingList
     */
    public function setConfirmSubs($confirm_subs)
    {
        $this->confirm_subs = (bool)$confirm_subs;
        //$this->confirm_subs = (bool)($confirm_subs == 1 || $confirm_subs == 'Y' || $confirm_subs === TRUE) ? TRUE : FALSE;

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSendCourtesySubsEmail()
    {
        return $this->send_courtesy_subs_email;
    }

    /**
     * @param mixed $send_courtesy_subs_email
     *
     * @return MailingList
     */
    public function setSendCourtesySubsEmail($send_courtesy_subs_email)
    {
        $this->send_courtesy_subs_email = (bool)$send_courtesy_subs_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSendCourtesyUnsubsEmail()
    {
        return $this->send_courtesy_unsubs_email;
    }

    /**
     * @param mixed $send_courtesy_unsubs_email
     *
     * @return MailingList
     */
    public function setSendCourtesyUnsubsEmail($send_courtesy_unsubs_email)
    {
        $this->send_courtesy_unsubs_email = (bool)$send_courtesy_unsubs_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminEmail()
    {
        return $this->admin_email;
    }

    /**
     * @param mixed $admin_email
     *
     * @return MailingList
     */
    public function setAdminEmail($admin_email)
    {
        $this->admin_email = (string)$admin_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfirmationSubGoto()
    {
        return $this->confirmation_sub_goto;
    }

    /**
     * @param mixed $confirmation_sub_goto
     *
     * @return MailingList
     */
    public function setConfirmationSubGoto($confirmation_sub_goto)
    {
        $this->confirmation_sub_goto = (string)$confirmation_sub_goto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfirmationUnsubGoto()
    {
        return $this->confirmation_unsub_goto;
    }

    /**
     * @param mixed $confirmation_unsub_goto
     *
     * @return MailingList
     */
    public function setConfirmationUnsubGoto($confirmation_unsub_goto)
    {
        $this->confirmation_unsub_goto = (string)$confirmation_unsub_goto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrackingReadEnabled()
    {
        return $this->tracking_read_enabled;
    }

    /**
     * @param mixed $tracking_read_enabled
     *
     * @return MailingList
     */
    public function setTrackingReadEnabled($tracking_read_enabled)
    {
        $this->tracking_read_enabled = (bool)$tracking_read_enabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrackingClickthroughEnabled()
    {
        return $this->tracking_clickthrough_enabled;
    }

    /**
     * @param mixed $tracking_clickthrough_enabled
     *
     * @return MailingList
     */
    public function setTrackingClickthroughEnabled($tracking_clickthrough_enabled)
    {
        $this->tracking_clickthrough_enabled = (bool)$tracking_clickthrough_enabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUseStickyCampaign()
    {
        return $this->use_sticky_campaign;
    }

    /**
     * @param mixed $use_sticky_campaign
     *
     * @return MailingList
     */
    public function setUseStickyCampaign($use_sticky_campaign)
    {
        $this->use_sticky_campaign = (bool)$use_sticky_campaign;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFtafUseListFromAddress()
    {
        return $this->ftaf_use_list_from_address;
    }

    /**
     * @param mixed $ftaf_use_list_from_address
     *
     * @return MailingList
     */
    public function setFtafUseListFromAddress($ftaf_use_list_from_address)
    {
        $this->ftaf_use_list_from_address = (bool)$ftaf_use_list_from_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVmtaId()
    {
        return $this->vmta_id;
    }

    /**
     * @param mixed $vmta_id
     *
     * @return MailingList
     */
    public function setVmtaId($vmta_id)
    {
        $this->vmta_id = (int)$vmta_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBaseUrlId()
    {
        return $this->base_url_id;
    }

    /**
     * @param mixed $base_url_id
     *
     * @return MailingList
     */
    public function setBaseUrlId($base_url_id)
    {
        $this->base_url_id = (int)$base_url_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnsubscribeHeaderEnabled()
    {
        return $this->unsubscribe_header_enabled;
    }

    /**
     * @param mixed $unsubscribe_header_enabled
     *
     * @return MailingList
     */
    public function setUnsubscribeHeaderEnabled($unsubscribe_header_enabled)
    {
        $this->unsubscribe_header_enabled = (bool)$unsubscribe_header_enabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentTemplateId()
    {
        return $this->parent_template_id;
    }

    /**
     * @param mixed $parent_template_id
     *
     * @return MailingList
     */
    public function setParentTemplateId($parent_template_id)
    {
        $this->parent_template_id = (int)$parent_template_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsTemplate()
    {
        return $this->is_template;
    }

    /**
     * @param mixed $is_template
     *
     * @return MailingList
     */
    public function setIsTemplate($is_template)
    {
        $this->is_template = (bool)$is_template;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultLifecycleCampaignId()
    {
        return $this->default_lifecycle_campaign_id;
    }

    /**
     * @param mixed $default_lifecycle_campaign_id
     *
     * @return MailingList
     */
    public function setDefaultLifecycleCampaignId($default_lifecycle_campaign_id)
    {
        $this->default_lifecycle_campaign_id = (int)$default_lifecycle_campaign_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultLifecycle()
    {
        return $this->default_lifecycle;
    }

    /**
     * @param mixed $default_lifecycle
     *
     * @return MailingList
     */
    public function setDefaultLifecycle($default_lifecycle)
    {
        $this->default_lifecycle = (bool)$default_lifecycle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnsubHeaderHttpValue()
    {
        return $this->unsub_header_http_value;
    }

    /**
     * @param mixed $unsub_header_http_value
     *
     * @return MailingList
     */
    public function setUnsubHeaderHttpValue($unsub_header_http_value)
    {
        $this->unsub_header_http_value = (string)$unsub_header_http_value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnsubHeaderEmailValue()
    {
        return $this->unsub_header_email_value;
    }

    /**
     * @param mixed $unsub_header_email_value
     *
     * @return MailingList
     */
    public function setUnsubHeaderEmailValue($unsub_header_email_value)
    {
        $this->unsub_header_email_value = (string)$unsub_header_email_value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCountTotal()
    {
        return $this->subscriber_count_total;
    }

    /**
     * @param mixed $subscriber_count_total
     *
     * @return MailingList
     */
    public function setSubscriberCountTotal($subscriber_count_total)
    {
        $this->subscriber_count_total = (int)$subscriber_count_total;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCountPlain()
    {
        return $this->subscriber_count_plain;
    }

    /**
     * @param mixed $subscriber_count_plain
     *
     * @return MailingList
     */
    public function setSubscriberCountPlain($subscriber_count_plain)
    {
        $this->subscriber_count_plain = (int)$subscriber_count_plain;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCountHtml()
    {
        return $this->subscriber_count_html;
    }

    /**
     * @param mixed $subscriber_count_html
     *
     * @return MailingList
     */
    public function setSubscriberCountHtml($subscriber_count_html)
    {
        $this->subscriber_count_html = (int)$subscriber_count_html;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCountRss()
    {
        return $this->subscriber_count_rss;
    }

    /**
     * @param mixed $subscriber_count_rss
     *
     * @return MailingList
     */
    public function setSubscriberCountRss($subscriber_count_rss)
    {
        $this->subscriber_count_rss = (int)$subscriber_count_rss;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCountMime()
    {
        return $this->subscriber_count_mime;
    }

    /**
     * @param mixed $subscriber_count_mime
     *
     * @return MailingList
     */
    public function setSubscriberCountMime($subscriber_count_mime)
    {
        $this->subscriber_count_mime = (int)$subscriber_count_mime;

        return $this;
    }

}
