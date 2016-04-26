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
        private $id;
        private $subscriber_id;
        private $list_id;
        private $format_id;
        private $created_date;
        private $list_name;
        private $subscriber;

        public function __construct(\stdClass $subscription_response = NULL, $time_zone = NULL)
        {
            if (isset($subscription_response))
            {
                $this
                    ->setId($subscription_response->subscriptionId)
                    ->setSubscriberId($subscription_response->subscriberId)
                    ->setListId($subscription_response->listId)
                    ->setCreatedDate($subscription_response->createdDate, $time_zone)
                    ->setFormatId($subscription_response->formatId)
                    ->setListName($subscription_response->listName)
                    ->setSubscriber($subscription_response->subscriber);
            }
        }

        public function getRequestArray()
        {
            $request_array = array(
                'subscriptionId' => $this->getId(),
                'subscriberId' => $this->getSubscriberId(),
                'listId' => $this->getListId(),
                'formatId' => $this->getFormatId(),
                'subscriber' => $this->getSubscriber(),
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
         * @return Subscription
         */
        public function setId($id)
        {
            $this->id = (int)$id;

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
         * @return Subscription
         */
        public function setCreatedDate($created_date, $time_zone)
        {
            $this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date, $time_zone);

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

        /**
         * @return mixed
         */
        public function getSubscriber()
        {
            return $this->subscriber;
        }

        /**
         * @param Subscriber $subscriber
         *
         * @return Subscriber
         */
        public function setSubscriber($subscriber)
        {
            $this->subscriber = new Subscriber($subscriber);

            return $this;
        }

    }