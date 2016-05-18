<?php
    /**
     * Created by PhpStorm.
     * User: marksimonds
     * Date: 1/29/16
     * Time: 2:55 PM
     */

    namespace ZayconWhatCounts;


    /**
     * Class Subscription
     * @package ZayconWhatCounts
     */
    class Subscription
    {
	    /**
         * id field from API
         *
         * @var integer $id
         */
        private $id;

	    /**
         * subscriberId field from API
         *
         * @var integer $subscriber_id
         */
        private $subscriber_id;

	    /**
         * listId field from API
         *
         * @var integer $list_id
         */
        private $list_id;

	    /**
         * formatId field from API
         *
         * @var integer $format_id
         */
        private $format_id;

	    /**
         * createdDate field from API
         *
         * @var \DateTime $created_date
         */
        private $created_date;

	    /**
         * listName field from API
         *
         * @var string $list_name
         */
        private $list_name;

	    /**
         * subscriber object from API
         *
         * @var Subscriber $subscriber
         */
        private $subscriber;

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
         * Subscription constructor.
         *
         * @param \stdClass|NULL $subscription_response
         * @param null           $time_zone
         */
        public function __construct(\stdClass $subscription_response = NULL, $time_zone = NULL)
        {
            if (isset($subscription_response))
            {
                $this
                    ->setId($subscription_response->subscriptionId)
                    ->setSubscriberId($subscription_response->subscriberId)
                    ->setListId($subscription_response->listId)
                    ->setCreatedDate($subscription_response->createdDate, 'M j, Y g:i:s A', $time_zone)
                    ->setFormatId($subscription_response->formatId)
                    ->setListName($subscription_response->listName)
                    ->setSubscriber($subscription_response->subscriber)
                    ->setSkip($subscription_response->skip)
                    ->setMax($subscription_response->max);
            }
        }

        /**
         * Generates array for API request.
         *
         * @return array
         */
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
         * @return Subscription
         */
        public function setId($id)
        {
            $this->id = (int)$id;

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
         * @return Subscription
         */
        public function setSubscriberId($subscriber_id)
        {
            $this->subscriber_id = (int)$subscriber_id;

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
         * @return Subscription
         */
        public function setListId($list_id)
        {
            $this->list_id = (int)$list_id;

            return $this;
        }

        /**
         * Gets the private variable format_id
         *
         * @return int
         */
        public function getFormatId()
        {
            return $this->format_id;
        }

        /**
         * Sets the private variable format_id
         *
         * @param int $format_id
         *
         * @return Subscription
         */
        public function setFormatId($format_id)
        {
            $this->format_id = (int)$format_id;

            return $this;
        }

        /**
         * Gets the private variable created_date
         *
         * @return \DateTime
         */
        public function getCreatedDate()
        {
            return $this->created_date;
        }

        /**
         * Sets the private variable created_date
         *
         * @param \DateTime $created_date
         * @param string $format
         * @param string $time_zone
         *
         * @return Subscription
         */
        public function setCreatedDate($created_date, $format, $time_zone)
        {
            $this->created_date = date_create_from_format($format, $created_date, $time_zone);

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
         * @return Subscription
         */
        public function setListName($list_name)
        {
            $this->list_name = (string)$list_name;

            return $this;
        }

        /**
         * Gets the private variable subscriber
         *
         * @return \ZayconWhatCounts\Subscriber
         */
        public function getSubscriber()
        {
            return $this->subscriber;
        }

        /**
         * Sets the private variable subscriber
         *
         * @param \ZayconWhatCounts\Subscriber $subscriber
         *
         * @return Subscription
         */
        public function setSubscriber($subscriber)
        {
            $this->subscriber = new Subscriber($subscriber);

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
         * @return Subscription
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
         * @return Subscription
         */
        public function setMax($max)
        {
            $this->max = (int)$max;

            return $this;
        }

    }