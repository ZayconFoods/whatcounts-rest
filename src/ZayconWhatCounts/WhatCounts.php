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

		use ActionsTraits;
		use ListTraits;
		use SubscriberTraits;
		use SubscriptionTraits;
		use TemplateTraits;
		use ArticleTraits;
		use CampaignTraits;
		use RelationalTableTraits;
		use RelationalColumnTraits;
		use RelationalDataTraits;

		private $time_zone;
		private $url;
		private $realm;
		private $password;
		private $version;

		/**
		 * WhatCounts constructor.
		 *
		 * @param string $environment
		 * @param null $realm
		 * @param null $password
		 * @param null $url
		 * @param null $version
		 * @param null $time_zone
		 */
		public function __construct($environment = 'production', $realm = NULL, $password = NULL, $url = NULL, $version = NULL, $time_zone = NULL)
		{
			$this
				->setRealm(($realm === NULL) ? Config::get($environment . '.realm') : $realm)
				->setPassword(($password === NULL) ? Config::get($environment . '.password') : $password)
				->setUrl(($url === NULL) ? Config::get($environment . '.url') : $url)
				->setVersion(($version === NULL) ? Config::get($environment . '.version') : $version)
				->setTimeZone(($time_zone === NULL) ? Config::get($environment . '.time_zone') : $time_zone);
			
			if (class_exists('Rollbar')) \Rollbar::init(array('access_token' => '44b1331cfa4c41f5b8045a4326a8b0bb'));
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
		 * @return mixed
		 */
		public function getTimeZone()
		{
			return $this->time_zone;
		}

		/**
		 * @param mixed $time_zone
		 *
		 * @return WhatCounts
		 */
		public function setTimeZone($time_zone)
		{
			$this->time_zone =$time_zone;
			return $this;
		}

		
		
		/**
		 * @return bool
		 * @throws \InvalidArgumentException
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
		 * 
		 * @throws GuzzleHttp\Exception\ServerException
		 * @throws GuzzleHttp\Exception\RequestException
		 */
		public function call($command, $method, $request_data = NULL)
		{
			if ($this->checkStatus()) {

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
						$this->url . '/' . $command . $params,
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
		
		public function handleException($e)
		{
			if (class_exists('Kint')) {
				\Kint::dump($e);
			} else {
				var_dump($e);
			}
			if (class_exists('Rollbar')) {
				\Rollbar::report_exception($e);
			}
		}
		
		public function handleDump($object)
		{
			if (class_exists('Kint')) {
				\Kint::dump($object);
			} else {
				var_dump($object);
			}

		}
	}

