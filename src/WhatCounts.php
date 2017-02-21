<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/15/16
	 * Time: 1:48 PM
	 */

	namespace Zaycon\Whatcounts_Rest;

	use GuzzleHttp;
	use GuzzleHttp\TransferStats;

	/**
	 * Class WhatCounts
	 * @package Whatcounts_Rest
	 */
	class WhatCounts
	{

		use Traits\Actions;
		use Traits\MailingList;
		use Traits\Subscriber;
		use Traits\Subscription;
		use Traits\Template;
		use Traits\Article;
		use Traits\Campaign;
		use Traits\RelationalTable;
		use Traits\RelationalColumn;
		use Traits\RelationalData;

		/**
		 * Time zone to use locally
		 *
		 * @var string $time_zone
		 */
		private $time_zone;

		/**
		 * Base URL of WhatCounts API
		 *
		 * @var string $url
		 */
		private $url;

		/**
		 * Realm to use with API
		 *
		 * @var string $realm
		 */
		private $realm;

		/**
		 * Password to use with API
		 *
		 * @var string $password
		 */
		private $password;

		/**
		 * Version of API to use
		 *
		 * @var string $version
		 */
		private $version;

		private $transfer_stats;

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
		 * Gets the private variable time_zone
		 *
		 * @return string
		 */
		public function getTimeZone()
		{
			return $this->time_zone;
		}

		/**
		 * Sets the private variable time_zone
		 *
		 * @param string $time_zone
		 *
		 * @return WhatCounts
		 */
		public function setTimeZone($time_zone)
		{
			$this->time_zone = (string)$time_zone;

			return $this;
		}

		/**
		 * Gets the private variable url
		 *
		 * @return string
		 */
		public function getUrl()
		{
			return $this->url;
		}

		/**
		 * Sets the private variable url
		 *
		 * @param string $url
		 *
		 * @return WhatCounts
		 */
		public function setUrl($url)
		{
			$this->url = (string)$url;

			return $this;
		}

		/**
		 * Gets the private variable realm
		 *
		 * @return string
		 */
		public function getRealm()
		{
			return $this->realm;
		}

		/**
		 * Sets the private variable realm
		 *
		 * @param string $realm
		 *
		 * @return WhatCounts
		 */
		public function setRealm($realm)
		{
			$this->realm = (string)$realm;

			return $this;
		}

		/**
		 * Gets the private variable password
		 *
		 * @return string
		 */
		public function getPassword()
		{
			return $this->password;
		}

		/**
		 * Sets the private variable password
		 *
		 * @param string $password
		 *
		 * @return WhatCounts
		 */
		public function setPassword($password)
		{
			$this->password = (string)$password;

			return $this;
		}

		/**
		 * Gets the private variable version
		 *
		 * @return string
		 */
		public function getVersion()
		{
			return $this->version;
		}

		/**
		 * Sets the private variable version
		 *
		 * @param string $version
		 *
		 * @return WhatCounts
		 */
		public function setVersion($version)
		{
			$this->version = (string)$version;

			return $this;
		}

		/**
		 * Gets the private variable transfer_stats
		 *
		 * @return mixed
		 */
		public function getTransferStats()
		{
			return $this->transfer_stats;
		}

		/**
		 * Sets the private variable transfer_stats
		 *
		 * @param mixed $transfer_stats
		 *
		 * @return WhatCounts
		 */
		public function setTransferStats($transfer_stats)
		{
			$this->transfer_stats = $transfer_stats;
            return $this;
		}


		
		/**
		 * Making sure realm and password are set before making calls to WhatCounts API
		 * 
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
		 * Method for making actual calls to WhatCounts API
		 *
		 * @param $command
		 * @param $method
		 * @param null $request_data
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return bool|object
		 * 
		 * @throws \Zaycon\Whatcounts_Rest\WhatCountsException
		 */
		public function call($command, $method, $request_data = NULL, $retry = TRUE, $do_async = FALSE)
		{
			if ($this->checkStatus()) {

				$params = '';

				// Servers with cURL using NSS have issues making secure HTTP connections using TLS 1.2. We detect it and fall back to TLS 1.1.
				// https://serverfault.com/questions/537495/centos-php-curl-nss-error-5938/
				//PHP Notice:  Use of undefined constant CURL_SSLVERSION_TLSv1_2 - assumed 'CURL_SSLVERSION_TLSv1_2' in /home/travis/build/ZayconFoods/whatcounts-rest/src/WhatCounts.php on line 285
				if (
					(
						(PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION == 5 && PHP_RELEASE_VERSION >= 19)
						|| (PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION == 6 && PHP_RELEASE_VERSION >= 3)
						|| (PHP_MAJOR_VERSION >= 7)
					)
					&&
					(
						defined('CURL_SSLVERSION_TLSv1_1') && defined('CURL_SSLVERSION_TLSv1_2')
					)
				)
				{
					$curl_info = curl_version();
					if (strpos($curl_info['ssl_version'], 'NSS') === 0)
					{
						$tls_version = CURL_SSLVERSION_TLSv1_1;
					}
					else
					{
						$tls_version = CURL_SSLVERSION_TLSv1_2;
					}
				}
				else
				{
					$tls_version = CURL_SSLVERSION_DEFAULT;
				}

				$request = array(
					'auth' => [
						$this->realm,
						$this->password
					],
					'headers' => [
						'Accept' => 'application/vnd.whatcounts-' . $this->version . '+json'
					],
					'json' => $request_data,
					'curl' => array(
						CURLOPT_SSLVERSION => $tls_version
					),
                    'stream' => TRUE,
					'on_stats' => function (TransferStats $stats) {
						$this->setTransferStats($stats);
					}
				);

				if (strtolower($method) == 'get' && is_array($request_data))
				{
					$request['json'] = NULL;
					$params .= '?'. http_build_query($request_data);
				}

				try
				{
                    if ($retry)
                    {
                        $handlerStack = GuzzleHttp\HandlerStack::create( new GuzzleHttp\Handler\CurlHandler() );
                        $handlerStack->push( GuzzleHttp\Middleware::retry( $this->retryDecider(), $this->retryDelay() ) );
                        $guzzle = new GuzzleHttp\Client( array( 'handler' => $handlerStack ));
                    }
                    else
                    {
                        $guzzle = new GuzzleHttp\Client();
                    }

                    $uri = $this->url . '/' . $command . $params;

                    if ($do_async)
                    {
                        // requestAsync($method, $uri = '', array $options = [])
                        return $guzzle->requestAsync(
                            $method,
                            $uri,
                            $request
                        );
                    }
                    else
                    {
                        $response = $guzzle->request(
                            $method,
                            $uri,
                            $request
                        );
                        return json_decode($response->getBody()->getContents());
                    }

				}
				catch (GuzzleHttp\Exception\ServerException $e)
				{
					throw new WhatCountsException($e->getMessage(), $e->getCode(), $e);
				}
				catch (GuzzleHttp\Exception\RequestException $e)
				{
                    throw new WhatCountsException($e->getMessage(), $e->getCode(), $e);
				}

			}

			return FALSE;
		}

		/**
		 * Dump handler
		 *
		 * @param $object
		 */
		public function handleDump($object)
		{
			if (class_exists('Kint')) {
				\Kint::dump($object);
			} else {
				var_dump($object);
			}

		}

		public function retryDecider() {
			return function (
				$retries,
				GuzzleHttp\Psr7\Request $request,
				GuzzleHttp\Psr7\Response $response = null,
				GuzzleHttp\Exception\RequestException $exception = null
			)
			{
				// Limit the number of retries to 5
				if ($retries >= 5)
				{
					return false;
				}

				// Retry connection exceptions
				if ($exception instanceof GuzzleHttp\Exception\ConnectException)
				{
					return true;
				}

				if ($response)
				{
					// Retry on server errors
					if ($response->getStatusCode() >= 500)
					{
						return true;
					}
					if ($response->getStatusCode() >= 404 && $request->getMethod() != 'GET')
					{
						return true;
					}
				}
				else
				{
					return TRUE;
				}

				return false;
			};
		}

		public function retryDelay() {
			return function( $numberOfRetries ) {
				return 1000 * $numberOfRetries;
			};
		}

        public function generateObject($class_name, $data, $timezone = NULL)
        {
            if ($timezone === NULL)
            {
                $timezone = new \DateTimeZone($this->getTimeZone());
            }
            $object = new $class_name($data, $timezone);
            return $object;
        }

        public static function existsOrNull($object, $attribute)
		{
			return property_exists(get_class($object), $attribute) ? $object->{$attribute} : NULL;
		}
	}

