<?php
    /**
     * Created by PhpStorm.
     * User: marksimonds
     * Date: 1/29/16
     * Time: 2:55 PM
     */

    namespace ZayconWhatCounts;


    class Subscription
    {
        private $subscription_id;
        private $subscriber_id;
        private $list_id;
        private $format_id;
        private $sent_flag;
        private $created_date;
        private $list_name;

        public function __construct($subscription_response = NULL)
        {
            if (isset($subscription_response))
            {
                $this
                    ->setSubscriptionId($subscription_response->subscriptionId)
                    ->setSubscriberId($subscription_response->subscriberId)
                    ->setListId($subscription_response->listId)
                    ->setCreatedDate($subscription_response->createdDate)
                    ->setFormatId($subscription_response->formatId)
                    ->setSentFlag($subscription_response->sentFlag)
                    ->setCreatedDate($subscription_response->createdDate)
                    ->setListName($subscription_response->listName);
            }
        }

        /**
         * @return mixed
         */
        public function getSubscriptionId()
        {
            return $this->subscription_id;
        }

        /**
         * @param mixed $subscription_id
         *
         * @return Subscription
         */
        public function setSubscriptionId($subscription_id)
        {
            $this->subscription_id = (int)$subscription_id;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getSubscriberId()
        {
            return $this->subscriber_id;
        }

        /**
         * @param mixed $subscriber_id
         *
         * @return Subscription
         */
        public function setSubscriberId($subscriber_id)
        {
            $this->subscriber_id = (int)$subscriber_id;

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
         * @return Subscription
         */
        public function setListId($list_id)
        {
            $this->list_id = (int)$list_id;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getFormatId()
        {
            return $this->format_id;
        }

        /**
         * @param mixed $format_id
         *
         * @return Subscription
         */
        public function setFormatId($format_id)
        {
            $this->format_id = (int)$format_id;

            return $this;
        }

        /**
         * @return boolean
         */
        public function isSentFlag()
        {
            return $this->sent_flag;
        }

        /**
         * @param boolean $sent_flag
         *
         * @return Subscription
         */
        public function setSentFlag($sent_flag)
        {
            $this->sent_flag = (bool)$sent_flag;

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
         *
         * @return Subscription
         */
        public function setCreatedDate($created_date)
        {
            $this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date);

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
         * @return Subscription
         */
        public function setListName($list_name)
        {
            $this->list_name = (string)$list_name;

            return $this;
        }

    }