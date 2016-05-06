<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/19/16
	 * Time: 2:44 PM
	 */

	namespace ZayconWhatCounts;


	trait ActionsTraits
	{
		/**
		 * @param $stub
		 * @param $class_name
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getAll($stub, $class_name)
		{
			/** @var WhatCounts $this */
			$response_data = $this->call($stub . '/', 'GET');

			$objects = array();

			foreach ($response_data as $item) {
				$object = new $class_name($item, new \DateTimeZone($this->getTimeZone()));
				$objects[] = $object;
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
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template $object */
			$request_data = $object->getRequestArray();
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
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template $object */
			$request_data = $object->getRequestArray();
			$response_data = $this->call($stub . '/' . $object->getId(), 'PUT', $request_data);
			
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
			/** @var Article|Campaign|MailingList|Subscriber|Subscription|Template $object */
			$id = $object->getId();
			$request_data = $object->getRequestArray();
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
			$id = $object->getId();
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