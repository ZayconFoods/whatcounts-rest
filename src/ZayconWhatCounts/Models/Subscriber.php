<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 3:29 PM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class Subscriber
	 * @package ZayconWhatCounts
	 */
	class Subscriber
	{

		/**
	     * id field from API
	     *
	     * @var integer $id
	     */
	    private $id;

		/**
	     * realmId field from API
	     *
	     * @var integer $realm_id
	     */
	    private $realm_id;

		/**
	     * email field from API
	     *
	     * @var string $email
	     */
	    private $email;

		/**
	     * domainId field from API
	     *
	     * @var integer $domain_id
	     */
	    private $domain_id;

		/**
	     * firstName field from API
	     *
	     * @var string $first_name
	     */
	    private $first_name;

		/**
	     * lastName field from API
	     *
	     * @var string $last_name
	     */
	    private $last_name;

		/**
	     * company field from API
	     *
	     * @var string $company
	     */
	    private $company;

		/**
	     * address1 field from API
	     *
	     * @var string $address_1
	     */
	    private $address_1;

		/**
	     * address2 field from API
	     *
	     * @var string $address_2
	     */
	    private $address_2;

		/**
	     * city field from API
	     *
	     * @var string $city
	     */
	    private $city;

		/**
	     * state field from API
	     *
	     * @var string $state
	     */
	    private $state;

		/**
	     * zip field from API
	     *
	     * @var string $zip
	     */
	    private $zip;

		/**
	     * country field from API
	     *
	     * @var string $country
	     */
	    private $country;

		/**
	     * phone field from API
	     *
	     * @var string $phone
	     */
	    private $phone;

		/**
	     * fax field from API
	     *
	     * @var string $fax
	     */
	    private $fax;

		/**
	     * createdDate field from API
	     *
	     * @var \DateTime $created_date
	     */
	    private $created_date;

		/**
	     * updatedDate field from API
	     *
	     * @var \DateTime $updated_date
	     */
	    private $updated_date;

		/**
	     * md5Encryption field from API
	     *
	     * @var string $md5_encryption
	     */
	    private $md5_encryption;

		/**
	     * sha1Encryption field from API
	     *
	     * @var string $sha1_encryption
	     */
	    private $sha1_encryption;

		/**
	     * subscriptions object from API
	     *
	     * @var array $subscriptions
	     */
	    private $subscriptions = array();

		/**
		 * Subscription events object from API
		 *
		 * @var array $events
		 */
		private $events = array();

		/**
		 * Subscription customData object from API
		 *
		 * @var array $custom_data
		 */
		private $custom_data = array();

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
	     * Subscriber constructor.
	     *
	     * @param \stdClass|NULL $subscriber_response
	     * @param null           $time_zone
	     */
	    public function __construct(\stdClass $subscriber_response = NULL, $time_zone = NULL)
	    {
	        if (isset($subscriber_response))
	        {
	            $this
	                ->setId($subscriber_response->subscriberId)
	                ->setRealmId($subscriber_response->realmId)
	                ->setEmail($subscriber_response->email)
	                ->setFirstName($subscriber_response->firstName)
	                ->setLastName($subscriber_response->lastName)
	                ->setCompany(isset($subscriber_response->company) ? $subscriber_response->company : NULL)
	                ->setAddress1($subscriber_response->address1)
	                ->setAddress2(isset($subscriber_response->address2) ? $subscriber_response->address2 : NULL)
	                ->setCity($subscriber_response->city)
	                ->setState($subscriber_response->state)
	                ->setZip($subscriber_response->zip)
	                ->setCountry($subscriber_response->country)
	                ->setPhone($subscriber_response->phone)
		            ->setFax(isset($subscriber_response->fax) ? $subscriber_response->fax : NULL)
	                ->setCreatedDate($subscriber_response->createdDate, 'M j, Y g:i:s A', $time_zone)
	                ->setMd5Encryption($subscriber_response->md5Encryption)
	                ->setSha1Encryption($subscriber_response->sha1Encryption)
	                ->setSkip($subscriber_response->skip)
	                ->setMax($subscriber_response->max);
		        if (isset($subscriber_response->updatedDate))
		        {
			        $this->setUpdatedDate($subscriber_response->updatedDate, 'M j, Y g:i:s A', $time_zone);
		        }
		        if (isset($subscriber_response->subscriptions))
		        {
					$this->setSubscriptions($subscriber_response->subscriptions, $time_zone);
		        }
		        if (isset($subscriber_response->events))
		        {
			        $this->setEvents($subscriber_response->events, $time_zone);
		        }
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
	            'email' => $this->getEmail(),
	            'firstName' => $this->getFirstName(),
	            'lastName' => $this->getLastName(),
	            'company' => $this->getCompany(),
	            'address1' => $this->getAddress1(),
	            'address2' => $this->getAddress2(),
	            'city' => $this->getCity(),
	            'state' => $this->getState(),
	            'zip' => $this->getZip(),
	            'country' => $this->getCountry(),
	            'phone' => $this->getPhone(),
	            'fax' => $this->getFax()
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
	     * @return Subscriber
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
	     * @return Subscriber
	     */
	    public function setRealmId($realm_id)
	    {
	        $this->realm_id = (int)$realm_id;

	        return $this;
	    }

	    /**
	     * Gets the private variable email
	     *
	     * @return string
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }

	    /**
	     * Sets the private variable email
	     *
	     * @param string $email
	     *
	     * @return Subscriber
	     */
	    public function setEmail($email)
	    {
	        $this->email = (string)$email;

	        return $this;
	    }

	    /**
	     * Gets the private variable domain_id
	     *
	     * @return int
	     */
	    public function getDomainId()
	    {
	        return $this->domain_id;
	    }

	    /**
	     * Sets the private variable domain_id
	     *
	     * @param int $domain_id
	     *
	     * @return Subscriber
	     */
	    public function setDomainId($domain_id)
	    {
	        $this->domain_id = (int)$domain_id;

	        return $this;
	    }

	    /**
	     * Gets the private variable first_name
	     *
	     * @return string
	     */
	    public function getFirstName()
	    {
	        return $this->first_name;
	    }

	    /**
	     * Sets the private variable first_name
	     *
	     * @param string $first_name
	     *
	     * @return Subscriber
	     */
	    public function setFirstName($first_name)
	    {
	        $this->first_name = (string)$first_name;

	        return $this;
	    }

	    /**
	     * Gets the private variable last_name
	     *
	     * @return string
	     */
	    public function getLastName()
	    {
	        return $this->last_name;
	    }

	    /**
	     * Sets the private variable last_name
	     *
	     * @param string $last_name
	     *
	     * @return Subscriber
	     */
	    public function setLastName($last_name)
	    {
	        $this->last_name = (string)$last_name;

	        return $this;
	    }

	    /**
	     * Gets the private variable company
	     *
	     * @return string
	     */
	    public function getCompany()
	    {
	        return $this->company;
	    }

	    /**
	     * Sets the private variable company
	     *
	     * @param string $company
	     *
	     * @return Subscriber
	     */
	    public function setCompany($company)
	    {
	        $this->company = (string)$company;

	        return $this;
	    }

	    /**
	     * Gets the private variable address_1
	     *
	     * @return string
	     */
	    public function getAddress1()
	    {
	        return $this->address_1;
	    }

	    /**
	     * Sets the private variable address_1
	     *
	     * @param string $address_1
	     *
	     * @return Subscriber
	     */
	    public function setAddress1($address_1)
	    {
	        $this->address_1 = (string)$address_1;

	        return $this;
	    }

	    /**
	     * Gets the private variable address_2
	     *
	     * @return string
	     */
	    public function getAddress2()
	    {
	        return $this->address_2;
	    }

	    /**
	     * Sets the private variable address_2
	     *
	     * @param string $address_2
	     *
	     * @return Subscriber
	     */
	    public function setAddress2($address_2)
	    {
	        $this->address_2 = (string)$address_2;

	        return $this;
	    }

	    /**
	     * Gets the private variable city
	     *
	     * @return string
	     */
	    public function getCity()
	    {
	        return $this->city;
	    }

	    /**
	     * Sets the private variable city
	     *
	     * @param string $city
	     *
	     * @return Subscriber
	     */
	    public function setCity($city)
	    {
	        $this->city = (string)$city;

	        return $this;
	    }

	    /**
	     * Gets the private variable state
	     *
	     * @return string
	     */
	    public function getState()
	    {
	        return $this->state;
	    }

	    /**
	     * Sets the private variable state
	     *
	     * @param string $state
	     *
	     * @return Subscriber
	     */
	    public function setState($state)
	    {
	        $this->state = (string)$state;

	        return $this;
	    }

	    /**
	     * Gets the private variable zip
	     *
	     * @return string
	     */
	    public function getZip()
	    {
	        return $this->zip;
	    }

	    /**
	     * Sets the private variable zip
	     *
	     * @param string $zip
	     *
	     * @return Subscriber
	     */
	    public function setZip($zip)
	    {
	        $this->zip = (string)$zip;

	        return $this;
	    }

	    /**
	     * Gets the private variable country
	     *
	     * @return string
	     */
	    public function getCountry()
	    {
	        return $this->country;
	    }

	    /**
	     * Sets the private variable country
	     *
	     * @param string $country
	     *
	     * @return Subscriber
	     */
	    public function setCountry($country)
	    {
	        $this->country = (string)$country;

	        return $this;
	    }

	    /**
	     * Gets the private variable phone
	     *
	     * @return string
	     */
	    public function getPhone()
	    {
	        return $this->phone;
	    }

	    /**
	     * Sets the private variable phone
	     *
	     * @param string $phone
	     *
	     * @return Subscriber
	     */
	    public function setPhone($phone)
	    {
	        $this->phone = (string)$phone;

	        return $this;
	    }

	    /**
	     * Gets the private variable fax
	     *
	     * @return string
	     */
	    public function getFax()
	    {
	        return $this->fax;
	    }

	    /**
	     * Sets the private variable fax
	     *
	     * @param string $fax
	     *
	     * @return Subscriber
	     */
	    public function setFax($fax)
	    {
	        $this->fax = (string)$fax;

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
	     * @return Subscriber
	     */
	    public function setCreatedDate($created_date, $format, $time_zone)
	    {
	        $this->created_date = date_create_from_format($format, $created_date, $time_zone);

	        return $this;
	    }

	    /**
	     * Gets the private variable updated_date
	     *
	     * @return \DateTime
	     */
	    public function getUpdatedDate()
	    {
	        return $this->updated_date;
	    }

	    /**
	     * Sets the private variable updated_date
	     *
	     * @param \DateTime $updated_date
	     * @param string $format
	     * @param string $time_zone
	     *
	     * @return Subscriber
	     */
	    public function setUpdatedDate($updated_date, $format, $time_zone)
	    {
	        $this->updated_date = date_create_from_format($format, $updated_date, $time_zone);

	        return $this;
	    }

	    /**
	     * Gets the private variable md5_encryption
	     *
	     * @return string
	     */
	    public function getMd5Encryption()
	    {
	        return $this->md5_encryption;
	    }

	    /**
	     * Sets the private variable md5_encryption
	     *
	     * @param string $md5_encryption
	     *
	     * @return Subscriber
	     */
	    public function setMd5Encryption($md5_encryption)
	    {
	        $this->md5_encryption = (string)$md5_encryption;

	        return $this;
	    }

	    /**
	     * Gets the private variable sha1_encryption
	     *
	     * @return string
	     */
	    public function getSha1Encryption()
	    {
	        return $this->sha1_encryption;
	    }

	    /**
	     * Sets the private variable sha1_encryption
	     *
	     * @param string $sha1_encryption
	     *
	     * @return Subscriber
	     */
	    public function setSha1Encryption($sha1_encryption)
	    {
	        $this->sha1_encryption = (string)$sha1_encryption;

	        return $this;
	    }

	    /**
	     * Gets the private variable subscriptions
	     *
	     * @return array
	     */
	    public function getSubscriptions()
	    {
	        return $this->subscriptions;
	    }

	    /**
	     * Sets the private variable subscriptions
	     *
	     * @param array  $subscriptions_array
	     * @param string $time_zone
	     *
	     * @return array
	     */
		public function setSubscriptions($subscriptions_array, $time_zone)
	    {
		    $subscriptions = array();
		    foreach ($subscriptions_array as $subscription_item)
		    {
			    $subscription = new Subscription($subscription_item, $time_zone);
			    $subscriptions[] = $subscription;
		    }
	        $this->subscriptions = $subscriptions;

	        return $this;
	    }

		/**
		 * Gets the private variable events
		 *
		 * @return array
		 */
		public function getEvents()
		{
			return $this->events;
		}

		/**
		 * Sets the private variable events
		 *
		 * @param array  $events_array
		 * @param string $time_zone
		 *
		 * @return array
		 */
		public function setEvents($events_array, $time_zone)
		{
			$events = array();
			foreach ($events_array as $event_item)
			{
				$event = new SubscriberEvents($event_item, $time_zone);
				$events[] = $event;
			}
			$this->events = $events;

			return $this;
		}

		/**
		 * Gets the private variable custom_data
		 *
		 * @return array
		 */
		public function getCustomData()
		{
			return $this->custom_data;
		}

		/**
		 * Sets the private variable custom_data
		 *
		 * @param array $custom_data
		 *
		 * @return Subscriber
		 */
		public function setCustomData($custom_data)
		{
			$this->custom_data = (array)$custom_data;

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
	     * @return Subscriber
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
	     * @return Subscriber
	     */
	    public function setMax($max)
	    {
	        $this->max = (int)$max;

	        return $this;
	    }

	}
