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
		
		use ListTraits;
		use SubscriberTraits;
		use SegmentationTraits;
		use TemplateTraits;

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
		
	}

