<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 1:48 PM
	 */

	namespace ZayconWhatCounts;

	use GuzzleHttp;

	/**
	 * Class WhatCounts
	 * @package ZayconWhatCounts
	 */

	class WhatCounts
	{

		const VERSION = 'v1';
		const DEFAULT_URL = 'http://wcqa.us/rest';

		private $url;
		private $realm;
		private $password;
		private $version;

		/**
		 * WhatCounts constructor.
		 *
		 * @param null $realm
		 * @param null $password
		 * @param null $url
		 * @param null $version
		 */
		public function __construct($realm = NULL, $password = NULL, $url = NULL, $version = NULL)
		{
			$this
				->setRealm($realm)
				->setPassword($password)
				->setUrl(($url === NULL) ? self::DEFAULT_URL : $url)
				->setVersion(($version === NULL) ? self::VERSION : $version);
		}

		/**
		 * @return mixed
		 */
		public function getUrl()
		{
			return $this->url;
		}

		/**
		 * @param mixed $url
		 *
		 * @return WhatCounts
		 */
		public function setUrl($url)
		{
			$this->url = $url;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getRealm()
		{
			return $this->realm;
		}

		/**
		 * @param mixed $realm
		 *
		 * @return WhatCounts
		 */
		public function setRealm($realm)
		{
			$this->realm = $realm;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getPassword()
		{
			return $this->password;
		}

		/**
		 * @param mixed $password
		 *
		 * @return WhatCounts
		 */
		public function setPassword($password)
		{
			$this->password = $password;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getVersion()
		{
			return $this->version;
		}

		/**
		 * @param mixed $version
		 *
		 * @return WhatCounts
		 */
		public function setVersion($version)
		{
			$this->version = $version;

			return $this;
		}

		/**
		 * @return bool
		 * @throws WhatCountsException
		 */
		public function checkStatus()
		{
			if ($this->realm === NULL) {
				throw new \InvalidArgumentException('You must set the realm before making a call');
			} elseif ($this->password === NULL) {
				throw new \InvalidArgumentException('You must set the password before making a call');
			}

			return TRUE;
		}

		/**
		 * @param $command
		 * @param $method
		 * @param null $request_data
		 *
		 * @return bool|object
		 * @throws WhatCountsException
		 */
		public function call($command, $method, $request_data = NULL)
		{
			if ($this->checkStatus()) {

				$command = strtolower($command);
				$params = '';

				$request = array(
					'auth' => [
						$this->realm,
						$this->password
					],
					'headers' => [
						'Accept' => 'application/vnd.whatcounts-' . $this->version . '+json'
					],
					'json' => $request_data

				);

				if (strtolower($method) == 'get' && is_array($request_data))
				{
					$request['json'] = NULL;
					$params .= '?'. http_build_query($request_data);
				}

				try
				{
					$guzzle = new GuzzleHttp\Client;
					$response = $guzzle->request(
						$method,
						$this->url . '/' . strtolower($command) . $params,
						$request
					);

					return json_decode($response->getBody()->getContents());

				}
				catch (GuzzleHttp\Exception\ServerException $e)
				{
					throw $e;
				}
				catch (GuzzleHttp\Exception\RequestException $e)
				{
					throw $e;
				}

//				if (empty($body)) {
//					throw new Exception("No results");
//				}
//
//				if ($body == 'Invalid credentials') {
//					throw new Exception('Invalid Credentials');
//				}
//
//				if ((int)substr_compare($body, "FAILURE", 0, 7) == 0) {
//					$result = explode(":", $body);
//					throw new Exception(trim($result[1]));
//				}
//
//				if ((int)substr_compare($body, "SUCCESS", 0, 7) == 0) {
//					$result = explode(":", $body);
//
//					return $result;
//				}


			}

			return FALSE;
		}

		/**
		 * @return Realm
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969879
		 */
		public function getRealmSettings()
		{
			$xml = $this->call('getrealmsettings', 'GET');

			$realm = new Realm;
			$realm
				->setRealmId((int)$xml->Data->realm_id)
				->setUseCustomerKey((string)$xml->Data->use_customer_key)
				->setEnableRelationalDatabase((string)$xml->Data->enable_relational_database);

			return $realm;
		}

		/**
		 * @return array
		 * @throws WhatCountsException
		 *
		 */
		public function showLists()
		{
			$response_data = $this->call('lists', 'GET');

			$lists = array();

			foreach ($response_data as $listItem) {
				$list = new MailingList;
				$list
					->setId($listItem->listId)
					->setRealmId($listItem->listRealmId)
					->setTemplateId($listItem->listTemplateId)
					//->setTemplateName($listItem->templateName)
					->setName($listItem->listName)
					->setFolderId($listItem->listFolderId)
					->setType($listItem->type)
					->setFromAddress($listItem->listFromAddress)
					->setReplyToAddress($listItem->listReplyToAddress)
					->setMailFromAddress($listItem->listMailFromAddress)
					->setDescription($listItem->listDescription)
					->setCreatedDate($listItem->listCreatedDate)
					->setSubscribeEmailTemplateId($listItem->listSubscribeEmailTemplateId)
					->setUnsubscribeEmailTemplateId($listItem->listUnsubscribeEmailTemplateId)
					->setConfirmSubs($listItem->listConfirmSubs)
					->setSendCourtesySubsEmail($listItem->listSendCourtesySubsEmail)
					->setSendCourtesyUnsubsEmail($listItem->listSendCourtesyUnsubsEmail)
					->setAdminEmail($listItem->listAdminEmail)
					->setConfirmationSubGoto($listItem->listConfirmationSubGoto)
					->setConfirmationUnsubGoto($listItem->listConfirmationUnsubGoto)
					->setTrackingReadEnabled($listItem->listTrackingReadEnabled)
					->setTrackingClickthroughEnabled($listItem->listTrackingClickthroughEnabled)
					->setUseStickyCampaign($listItem->listUseStickyCampaign)
					->setDataXml($listItem->listDataXml)
					->setFtafUseListFromAddress($listItem->ftafUseListFromAddress)
					->setVmtaId($listItem->vmtaId)
					->setBaseUrlId($listItem->baseUrlId)
					->setUnsubscribeHeaderEnabled($listItem->unsubscribeHeaderEnabled)
					->setParentTemplateId($listItem->parentTemplateId)
					->setIsTemplate($listItem->isTemplate)
					->setDefaultLifecycleCampaignId($listItem->defaultLifecycleCampaignId)
					->setDefaultLifecycle($listItem->defaultLifecycle)
					->setUnsubHeaderHttpValue($listItem->unsubHeaderHttpValue)
					->setUnsubHeaderEmailValue($listItem->unsubHeaderEmailValue)
					->setSubscriberCountTotal($listItem->subscriberCountTotal)
					->setSubscriberCountPlain($listItem->subscriberCountPlain)
					->setSubscriberCountHtml($listItem->subscriberCountHtml)
					->setSubscriberCountRss($listItem->subscriberCountRss)
					->setSubscriberCountMime($listItem->subscriberCountMime);

				$lists[] = $list;
			}

			return $lists;
		}

		/**
		 * @param $list_id
		 *
		 * @return MailingList
		 *
		 * @throws WhatCountsException
		 */
		public function getListById($list_id)
		{
			$response_data = $this->call('lists/' . $list_id, 'GET');

			var_dump($response_data);

			$list = new MailingList;
			$list
				->setId($response_data->listId)
				->setRealmId($response_data->listRealmId)
				->setTemplateId($response_data->listTemplateId)
				//->setTemplateName($response_data->templateName)
				->setName($response_data->listName)
				->setFolderId($response_data->listFolderId)
				->setType($response_data->type)
				->setFromAddress($response_data->listFromAddress)
				->setReplyToAddress($response_data->listReplyToAddress)
				->setMailFromAddress($response_data->listMailFromAddress)
				->setDescription($response_data->listDescription)
				->setCreatedDate($response_data->listCreatedDate)
				->setUpdatedDate($response_data->listUpdatedDate)
				->setSubscribeEmailTemplateId($response_data->listSubscribeEmailTemplateId)
				->setUnsubscribeEmailTemplateId($response_data->listUnsubscribeEmailTemplateId)
				->setConfirmSubs($response_data->listConfirmSubs)
				->setSendCourtesySubsEmail($response_data->listSendCourtesySubsEmail)
				->setSendCourtesyUnsubsEmail($response_data->listSendCourtesyUnsubsEmail)
				->setAdminEmail($response_data->listAdminEmail)
				->setConfirmationSubGoto($response_data->listConfirmationSubGoto)
				->setConfirmationUnsubGoto($response_data->listConfirmationUnsubGoto)
				->setTrackingReadEnabled($response_data->listTrackingReadEnabled)
				->setTrackingClickthroughEnabled($response_data->listTrackingClickthroughEnabled)
				->setUseStickyCampaign($response_data->listUseStickyCampaign)
				->setDataXml($response_data->listDataXml)
				->setFtafUseListFromAddress($response_data->ftafUseListFromAddress)
				->setVmtaId($response_data->vmtaId)
				->setBaseUrlId($response_data->baseUrlId)
				->setUnsubscribeHeaderEnabled($response_data->unsubscribeHeaderEnabled)
				->setParentTemplateId($response_data->parentTemplateId)
				->setIsTemplate($response_data->isTemplate)
				->setDefaultLifecycleCampaignId($response_data->defaultLifecycleCampaignId)
				->setDefaultLifecycle($response_data->defaultLifecycle)
				->setUnsubHeaderHttpValue($response_data->unsubHeaderHttpValue)
				->setUnsubHeaderEmailValue($response_data->unsubHeaderEmailValue)
				->setSubscriberCountTotal($response_data->subscriberCountTotal)
				->setSubscriberCountPlain($response_data->subscriberCountPlain)
				->setSubscriberCountHtml($response_data->subscriberCountHtml)
				->setSubscriberCountRss($response_data->subscriberCountRss)
				->setSubscriberCountMime($response_data->subscriberCountMime);

			return $list;
		}

		/**
		 * @param $list_name
		 *
		 * @return MailingList
		 *
		 * @throws WhatCountsException
		 *
		 */
		public function getListByName($list_name)
		{
			$response_data = $this->call('lists?name=' . $list_name, 'GET');

			$lists = array();

			foreach ($response_data as $listItem) {
				$list = new MailingList;
				$list
					->setId($listItem->listId)
					->setRealmId($listItem->listRealmId)
					->setTemplateId($listItem->listTemplateId)
					//->setTemplateName($listItem->templateName)
					->setName($listItem->listName)
					->setFolderId($listItem->listFolderId)
					->setType($listItem->type)
					->setFromAddress($listItem->listFromAddress)
					->setReplyToAddress($listItem->listReplyToAddress)
					->setMailFromAddress($listItem->listMailFromAddress)
					->setDescription($listItem->listDescription)
					->setCreatedDate( $listItem->listCreatedDate)
					->setSubscribeEmailTemplateId($listItem->listSubscribeEmailTemplateId)
					->setUnsubscribeEmailTemplateId($listItem->listUnsubscribeEmailTemplateId)
					->setConfirmSubs($listItem->listConfirmSubs)
					->setSendCourtesySubsEmail($listItem->listSendCourtesySubsEmail)
					->setSendCourtesyUnsubsEmail($listItem->listSendCourtesyUnsubsEmail)
					->setAdminEmail($listItem->listAdminEmail)
					->setConfirmationSubGoto($listItem->listConfirmationSubGoto)
					->setConfirmationUnsubGoto($listItem->listConfirmationUnsubGoto)
					->setTrackingReadEnabled($listItem->listTrackingReadEnabled)
					->setTrackingClickthroughEnabled($listItem->listTrackingClickthroughEnabled)
					->setUseStickyCampaign($listItem->listUseStickyCampaign)
					->setDataXml($listItem->listDataXml)
					->setFtafUseListFromAddress($listItem->ftafUseListFromAddress)
					->setVmtaId($listItem->vmtaId)
					->setBaseUrlId($listItem->baseUrlId)
					->setUnsubscribeHeaderEnabled($listItem->unsubscribeHeaderEnabled)
					->setParentTemplateId($listItem->parentTemplateId)
					->setIsTemplate($listItem->isTemplate)
					->setDefaultLifecycleCampaignId($listItem->defaultLifecycleCampaignId)
					->setDefaultLifecycle($listItem->defaultLifecycle)
					->setUnsubHeaderHttpValue($listItem->unsubHeaderHttpValue)
					->setUnsubHeaderEmailValue($listItem->unsubHeaderEmailValue)
					->setSubscriberCountTotal($listItem->subscriberCountTotal)
					->setSubscriberCountPlain($listItem->subscriberCountPlain)
					->setSubscriberCountHtml($listItem->subscriberCountHtml)
					->setSubscriberCountRss($listItem->subscriberCountRss)
					->setSubscriberCountMime($listItem->subscriberCountMime);

				$lists[] = $list;
			}

			return $lists;
		}

		/**
		 * @param MailingList $list
		 *
		 * @return bool
		 *
		 * @throws WhatCountsException
		 *
		 */
		public function createList(MailingList &$list)
		{
			$request_data = array(
				'listRealmId' => $list->getRealmId(),
				'listTemplateId' => $list->getTemplateId(),
				//'templateName' => $list->getTemplateName(),
				'listName' => $list->getName(),
				'listFolderId' => $list->getFolderId(),
				'listFromAddress' => $list->getFromAddress(),
				'listReplyToAddress' => $list->getReplyToAddress(),
				'listMailFromAddress' => $list->getMailFromAddress(),
				'listDescription' => $list->getDescription(),
				'listSubscribeEmailTemplateId' => $list->getSubscribeEmailTemplateId(),
				'listUnsubscribeEmailTemplateId' => $list->getUnsubscribeEmailTemplateId(),
				'listConfirmSubs' => $list->getConfirmSubs(),
				'listSendCourtesySubsEmail' => $list->getSendCourtesySubsEmail(),
				'listSendCourtesyUnsubsEmail' => $list->getSendCourtesyUnsubsEmail(),
				'listAdminEmail' => $list->getAdminEmail(),
				'listConfirmationSubGoto' => $list->getConfirmationSubGoto(),
				'listConfirmationUnsubGoto' => $list->getConfirmationUnsubGoto(),
				'listTrackingReadEnabled' => $list->getTrackingReadEnabled(),
				'listTrackingClickthroughEnabled' => $list->getTrackingClickthroughEnabled(),
				'listUseStickyCampaign' => $list->getUseStickyCampaign(),
				'ftafUseListFromAddress' => $list->getFtafUseListFromAddress(),
				'vmtaId' => $list->getVmtaId(),
				'baseUrlId' => $list->getBaseUrlId(),
				'unsubscribeHeaderEnabled' => $list->getUnsubscribeHeaderEnabled(),
				'parentTemplateId' => $list->getParentTemplateId(),
				'isTemplate' => $list->getIsTemplate(),
				'defaultLifecycleCampaignId' => $list->getDefaultLifecycleCampaignId(),
				'defaultLifecycle' => $list->getDefaultLifecycle(),
				'unsubHeaderHttpValue' => $list->getUnsubHeaderHttpValue(),
				'unsubHeaderEmailValue' => $list->getUnsubHeaderEmailValue()
			);
			$response_data = $this->call('lists', 'POST', $request_data);

			$list
				->setId($response_data->listId)
				->setCreatedDate($response_data->listCreatedDate);
		}

		/**
		 * @param MailingList $list
		 *
		 * @return bool
		 *
		 * @throws WhatCountsException
		 *
		 */
		public function updateList(MailingList &$list)
		{
			$request_data = array(
				'listRealmId' => $list->getRealmId(),
				'listTemplateId' => $list->getTemplateId(),
				'listName' => $list->getName(),
				//'templateName' => $list->getTemplateName(),
				'listFolderId' => $list->getFolderId(),
				'listFromAddress' => $list->getFromAddress(),
				'listReplyToAddress' => $list->getReplyToAddress(),
				'listMailFromAddress' => $list->getMailFromAddress(),
				'listDescription' => $list->getDescription(),
				'listSubscribeEmailTemplateId' => $list->getSubscribeEmailTemplateId(),
				'listUnsubscribeEmailTemplateId' => $list->getUnsubscribeEmailTemplateId(),
				'listConfirmSubs' => $list->getConfirmSubs(),
				'listSendCourtesySubsEmail' => $list->getSendCourtesySubsEmail(),
				'listSendCourtesyUnsubsEmail' => $list->getSendCourtesyUnsubsEmail(),
				'listAdminEmail' => $list->getAdminEmail(),
				'listConfirmationSubGoto' => $list->getConfirmationSubGoto(),
				'listConfirmationUnsubGoto' => $list->getConfirmationUnsubGoto(),
				'listTrackingReadEnabled' => $list->getTrackingReadEnabled(),
				'listTrackingClickthroughEnabled' => $list->getTrackingClickthroughEnabled(),
				'listUseStickyCampaign' => $list->getUseStickyCampaign(),
				'ftafUseListFromAddress' => $list->getFtafUseListFromAddress(),
				'vmtaId' => $list->getVmtaId(),
				'baseUrlId' => $list->getBaseUrlId(),
				'unsubscribeHeaderEnabled' => $list->getUnsubscribeHeaderEnabled(),
				'parentTemplateId' => $list->getParentTemplateId(),
				'isTemplate' => $list->getIsTemplate(),
				'defaultLifecycleCampaignId' => $list->getDefaultLifecycleCampaignId(),
				'defaultLifecycle' => $list->getDefaultLifecycle(),
				'unsubHeaderHttpValue' => $list->getUnsubHeaderHttpValue(),
				'unsubHeaderEmailValue' => $list->getUnsubHeaderEmailValue()
			);
			$response_data = $this->call('lists/' . $list->getId(), 'PUT', $request_data);

			$list
				->setUpdatedDate($response_data->listUpdatedDate);

		}
		
		public function deleteList(MailingList $list)
		{
			$id = $list->getId();
			$this->call('lists/' . $id, 'DELETE');
			
			return TRUE;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return array
		 * @throws WhatCountsException
		 *
		 */
		public function findSubscribers(Subscriber $subscriber)
		{
			$request_data = array(
				'email' => $subscriber->getEmail(),
				'firstName' => $subscriber->getFirstName(),
				'lastName'  => $subscriber->getLastName()
			);

			$response_data = $this->call('subscribers', 'GET', $request_data);

			$subscribers = array();

			foreach ($response_data as $subscriberItem) {
				$subscriber = new Subscriber;
				$subscriber
					->setSubscriberId($subscriberItem->subscriberId)
					->setRealmId($subscriberItem->realmId)
					->setEmail($subscriberItem->email)
					->setDomainId($subscriberItem->domainId)
					->setFirstName($subscriberItem->firstName)
					->setLastName($subscriberItem->lastName)
					->setCompany($subscriberItem->company)
					->setAddress1($subscriberItem->address1)
					->setAddress2($subscriberItem->address2)
					->setCity($subscriberItem->city)
					->setState($subscriberItem->state)
					->setZip($subscriberItem->zip)
					->setCountry($subscriberItem->country)
					->setPhone($subscriberItem->phone)
					->setFax($subscriberItem->fax)
					->setCreatedDate($subscriberItem->createdDate)
					->setUpdatedDate($subscriberItem->updatedDate)
					->setMd5Encryption($subscriberItem->md5Encryption)
					->setSha1Encryption($subscriberItem->sha1Encryption);
				$subscribers[] = $subscriber;
			}

			return $subscribers;
		}

		/**
		 * @param Subscriber $subscriber
		 * @param null $list_id
		 * @param bool $exact_match
		 *
		 * @return array
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969649
		 */
		public function findSubscriberInList(Subscriber $subscriber, $list_id = NULL, $exact_match = FALSE)
		{
			$request_data = array(
				'email'   => $subscriber->getEmail(),
				'first'   => $subscriber->getFirstName(),
				'last'    => $subscriber->getLastName(),
				'list_id' => $list_id,
				'exact'   => (int)$exact_match,
			);
			$xml = $this->call('findinlist', 'GET', $request_data);

			$subscribers = array();

			foreach ($xml->subscriber as $subscriberItem) {
				$subscriber = new Subscriber;
				$subscriber
					->setSubscriberId($subscriberItem->subscriberId)
					->setRealmId($subscriberItem->realmId)
					->setEmail($subscriberItem->email)
					->setDomainId($subscriberItem->domainId)
					->setFirstName($subscriberItem->firstName)
					->setLastName($subscriberItem->lastName)
					->setCompany($subscriberItem->company)
					->setAddress1($subscriberItem->address1)
					->setAddress2($subscriberItem->address2)
					->setCity($subscriberItem->city)
					->setState($subscriberItem->state)
					->setZip($subscriberItem->zip)
					->setCountry($subscriberItem->country)
					->setPhone($subscriberItem->phone)
					->setFax($subscriberItem->fax)
					->setCreatedDate($subscriberItem->createdDate)
					->setUpdatedDate($subscriberItem->updatedDate)
					->setMd5Encryption($subscriberItem->md5Encryption)
					->setSha1Encryption($subscriberItem->sha1Encryption);
				$subscribers[] = $subscriber;
			}

			return $subscribers;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return Subscriber
		 * @throws WhatCountsException
		 *
		 */
		public function addSubscriber(Subscriber &$subscriber)
		{
			$request_data = array(
				'email' => $subscriber->getEmail(),
				'firstName' => $subscriber->getFirstName(),
				'lastName' => $subscriber->getLastName(),
				'company' => $subscriber->getCompany(),
				'address1' => $subscriber->getAddress1(),
				'address2' => $subscriber->getAddress2(),
				'city' => $subscriber->getCity(),
				'state' => $subscriber->getState(),
				'zip' => $subscriber->getZip(),
				'country' => $subscriber->getCountry(),
				'phone' => $subscriber->getPhone(),
				'fax' => $subscriber->getFax()
			);
			
			$response_data = $this->call('subscribers', 'POST', $request_data);
			
			$subscriber
				->setSubscriberId($response_data->subscriberId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate)
				->setUpdatedDate($response_data->updatedDate)
				->setMd5Encryption($response_data->md5Encryption)
				->setSha1Encryption($response_data->sha1Encryption);
		}

		/**
		 * @param Subscriber $subscriber
		 * @param $list_id
		 * @param bool $force_optout
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969639
		 *
		 */
		public function unsubscribe(Subscriber $subscriber, $list_id, $force_optout = FALSE)
		{
			$request_data = array(
				'list_id'      => $list_id,
				'force_optout' => $force_optout,
				'data'         => 'email,first,last^'
					. $subscriber->getEmail() . ','
					. $subscriber->getFirstName() . ','
					. $subscriber->getLastName()
			);
			$xml = $this->call('unsub', 'POST', $request_data);

			return trim($xml[1]);
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/204669915
		 *
		 */
		public function deleteSubscriber(Subscriber $subscriber)
		{
			$request_data = array(
				'data' => 'email^' . $subscriber->getEmail()
			);
			$xml = $this->call('delete', 'DELETE', $request_data);

			return trim($xml[1]);
		}


		/**
		 * @param $subscriber_id
		 *
		 * @return Subscriber
		 * @throws WhatCountsException
		 *
		 */
		public function getSubscriberById($subscriber_id)
		{
			$response_data = $this->call('subscribers/' . $subscriber_id, 'GET');

			$subscriber = new Subscriber;
			$subscriber
				->setSubscriberId($response_data->subscriberId)
				->setRealmId($response_data->realmId)
				->setEmail($response_data->email)
				->setDomainId($response_data->domainId)
				->setFirstName($response_data->firstName)
				->setLastName($response_data->lastName)
				->setCompany($response_data->company)
				->setAddress1($response_data->address1)
				->setAddress2($response_data->address2)
				->setCity($response_data->city)
				->setState($response_data->state)
				->setZip($response_data->zip)
				->setCountry($response_data->country)
				->setPhone($response_data->phone)
				->setFax($response_data->fax)
				->setCreatedDate($response_data->createdDate)
				->setUpdatedDate($response_data->updatedDate)
				->setMd5Encryption($response_data->md5Encryption)
				->setSha1Encryption($response_data->sha1Encryption);

			return $subscriber;
		}

		/**
		 * @param Subscriber $subscriber
		 *
		 * @return string
		 * @throws WhatCountsException
		 *
		 * API documentation: https://whatcounts.zendesk.com/hc/en-us/articles/203969619
		 *
		 */
		public function updateSubscriber(Subscriber $subscriber)
		{
			$request_data = array(
				'list_id'        => $subscriber->getListId(),
				'identity_field' => 'email',
				'data'           => 'email,first,last,address_1,address_2,city,state,zip,country,phone,fax,company^'
					. $subscriber->getEmail() . ','
					. $subscriber->getFirstName() . ','
					. $subscriber->getLastName() . ','
					. $subscriber->getAddress1() . ','
					. $subscriber->getAddress2() . ','
					. $subscriber->getCity() . ','
					. $subscriber->getState() . ','
					. $subscriber->getZip() . ','
					. $subscriber->getCountry() . ','
					. $subscriber->getPhone() . ','
					. $subscriber->getFax() . ','
					. $subscriber->getCompany()
			);
			$xml = $this->call('update', 'PUT', $request_data);

			return trim($xml[1]);
		}

	}

