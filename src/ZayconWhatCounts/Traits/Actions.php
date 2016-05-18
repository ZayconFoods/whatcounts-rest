<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/19/16
	 * Time: 2:44 PM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class ActionsTraits
	 * @package ZayconWhatCounts
	 */
	trait ActionsTraits
	{
		/**
		 * @param $stub
		 * @param $class_name
		 * @param null $skip
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getAll($stub, $class_name, $skip = NULL)
		{
			$skipParameter = (!is_null($skip) ? '?skip=' . $skip : '');
			/** @var WhatCounts $this */
			$response_data = $this->call($stub . '/' . $skipParameter, 'GET');

			$objects = array();

			foreach ($response_data as $item) {
				if (is_array($item))
				{
					foreach ($item as $arrayItem)
					{
						$object = new $class_name($arrayItem, new \DateTimeZone($this->getTimeZone()));
						$objects[] = $object;
					}
				}
				else
				{
					if (is_object($item))
					{
						$object = new $class_name($item, new \DateTimeZone($this->getTimeZone()));
						$objects[] = $object;
					}
					else
					{
						//var_dump($item);
							
					}
				}
			}

			return $objects;
		}

		/**
		 * @param $stub
		 * @param $class_name
		 * @param $id
		 *
		 * @return mixed
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getById($stub, $class_name, $id)
		{
			$response_data = $this->call($stub . '/' . $id, 'GET');
			$object = new $class_name($response_data, new \DateTimeZone($this->getTimeZone()));

			return $object;
		}

		/**
		 * @param $stub
		 * @param $class_name
		 * @param $name
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getByName($stub, $class_name, $name)
		{
			$response_data = $this->call($stub . '?name=' . $name, 'GET');
			if (is_array($response_data))
			{
				$objects = array();

				foreach ($response_data as $item) {
					$object = new $class_name($item, new \DateTimeZone($this->getTimeZone()));
					$objects[] = $object;
				}
			}
			else
			{
				$objects = new $class_name($response_data, new \DateTimeZone($this->getTimeZone()));
			}

			return $objects;
		}

		/**
		 * @param $stub
		 * @param $object
		 *
		 * @return bool|object
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function create($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template|RelationalData $object */
			if (is_a($object, 'stdClass')) {
				$request_data = $object;
			} else {
				$request_data = $object->getRequestArray();
			}

			$response_data = $this->call($stub . '/', 'POST', $request_data);

			return $response_data;
		}

		/**
		 * @param $stub
		 * @param $object
		 *
		 * @return bool|object
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function update($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template|RelationalData $object */
			if (is_a($object, 'stdClass')) {
				$request_data = $object;
				$id = '';
			} else {
				$request_data = $object->getRequestArray();
				$id = $object->getId();
			}
			$response_data = $this->call($stub . '/' . $id, 'PUT', $request_data);
			
			return $response_data;
		}

		/**
		 * @param $stub
		 * @param $object
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function delete($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template|RelationalData $object */

			if (is_a($object, 'stdClass')) {
				$request_data = $object;
				$id = '';
			} else {
				$request_data = $object->getRequestArray();
				$id = $object->getId();
			}

			$this->call($stub . '/' . $id, 'DELETE', $request_data);

			return TRUE;
		}

		/**
		 * @param $stub
		 * @param $object
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteById($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template $object */
			if (is_int($object)) {
				$id = $object;
			} else {
				$id = $object->getId();
			}

			$this->call($stub . '/' . $id, 'DELETE');
			
			return TRUE;
		}

		/**
		 * @param $stub
		 * @param $object
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteByCustomerKey($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template $object */
			$id = $object->getCustomerKey();
			$this->call($stub . '/' . $id, 'DELETE');

			return TRUE;
		}

	}