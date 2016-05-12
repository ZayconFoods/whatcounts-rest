<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 4/15/16
 * Time: 3:29 PM
 */

namespace ZayconWhatCounts;


class Subscriber
{

    private $id;
    private $realm_id;
    private $email;
    private $domain_id;
    private $first_name;
    private $last_name;
    private $company;
    private $address_1;
    private $address_2;
    private $city;
    private $state;
    private $zip;
    private $country;
    private $phone;
    private $fax;
    private $created_date;
    private $updated_date;
    private $md5_encryption;
    private $sha1_encryption;
    private $subscriptions = array();
    private $skip;
    private $max;

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
                ->setCompany($subscriber_response->company)
                ->setAddress1($subscriber_response->address1)
                ->setAddress2($subscriber_response->address2)
                ->setCity($subscriber_response->city)
                ->setState($subscriber_response->state)
                ->setZip($subscriber_response->zip)
                ->setCountry($subscriber_response->country)
                ->setPhone($subscriber_response->phone)
                ->setFax($subscriber_response->fax)
                ->setCreatedDate($subscriber_response->createdDate, $time_zone)
                ->setUpdatedDate($subscriber_response->updatedDate, $time_zone)
                ->setMd5Encryption($subscriber_response->md5Encryption)
                ->setSha1Encryption($subscriber_response->sha1Encryption)
                ->setSkip($subscriber_response->skip)
                ->setMax($subscriber_response->max);
        }
    }

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Subscriber
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
     * @return Subscriber
     */
    public function setRealmId($realm_id)
    {
        $this->realm_id = (int)$realm_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Subscriber
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomainId()
    {
        return $this->domain_id;
    }

    /**
     * @param mixed $domain_id
     *
     * @return Subscriber
     */
    public function setDomainId($domain_id)
    {
        $this->domain_id = (int)$domain_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     * @return Subscriber
     */
    public function setFirstName($first_name)
    {
        $this->first_name = (string)$first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     * @return Subscriber
     */
    public function setLastName($last_name)
    {
        $this->last_name = (string)$last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address_1;
    }

    /**
     * @param mixed $address_1
     * @return Subscriber
     */
    public function setAddress1($address_1)
    {
        $this->address_1 = (string)$address_1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address_2;
    }

    /**
     * @param mixed $address_2
     * @return Subscriber
     */
    public function setAddress2($address_2)
    {
        $this->address_2 = (string)$address_2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Subscriber
     */
    public function setCity($city)
    {
        $this->city = (string)$city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Subscriber
     */
    public function setState($state)
    {
        $this->state = (string)$state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return Subscriber
     */
    public function setZip($zip)
    {
        $this->zip = (string)$zip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return Subscriber
     */
    public function setCountry($country)
    {
        $this->country = (string)$country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return Subscriber
     */
    public function setPhone($phone)
    {
        $this->phone = (string)$phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     * @return Subscriber
     */
    public function setFax($fax)
    {
        $this->fax = (string)$fax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     * @return Subscriber
     */
    public function setCompany($company)
    {
        $this->company = (string)$company;
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
     * @return Subscriber
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
     * @return Subscriber
     */
    public function setUpdatedDate($updated_date, $time_zone)
    {
        $this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date, $time_zone);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMd5Encryption()
    {
        return $this->md5_encryption;
    }

    /**
     * @param mixed $md5_encryption
     *
     * @return Subscriber
     */
    public function setMd5Encryption($md5_encryption)
    {
        $this->md5_encryption = (string)$md5_encryption;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSha1Encryption()
    {
        return $this->sha1_encryption;
    }

    /**
     * @param mixed $sha1_encryption
     *
     * @return Subscriber
     */
    public function setSha1Encryption($sha1_encryption)
    {
        $this->sha1_encryption = (string)$sha1_encryption;

        return $this;
    }

    /**
     * @return array
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param array $subscriptions
     *
     * @return Subscriber
     */
    public function setSubscriptions($subscriptions)
    {
        $this->subscriptions = (array)$subscriptions;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkip()
    {
        return $this->skip;
    }

    /**
     * @param mixed $skip
     *
     * @return Subscriber
     */
    public function setSkip($skip)
    {
        $this->skip = (int)$skip;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     *
     * @return Subscriber
     */
    public function setMax($max)
    {
        $this->max = (int)$max;

        return $this;
    }

}
