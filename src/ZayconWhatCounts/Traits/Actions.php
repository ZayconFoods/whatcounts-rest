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
		public function getAll($stub, $class_name)
		{
			/** @var WhatCounts $this */
			$response_data = $this->call($stub . '/', 'GET');

			$objects = array();

			foreach ($response_data as $item) {
				$object = new $class_name($item);
				$objects[] = $object;
			}

			return $objects;
		}

		public function getById($stub, $class_name, $id)
		{
			$response_data = $this->call($stub . '/' . $id, 'GET');
			$object = new $class_name($response_data);

			return $object;
		}

		public function getByName($stub, $class_name, $name)
		{
			$response_data = $this->call($stub . '?name=' . $name, 'GET');
			if (is_array($response_data))
			{
				$objects = array();

				foreach ($response_data as $item) {
					$object = new $class_name($item);
					$objects[] = $object;
				}
			}
			else
			{
				$objects = new $class_name($response_data);
			}

			return $objects;
		}
		
		public function create($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|SegmentationRule|Subscriber|Subscription|Template $object */
			$request_data = $object->getRequestArray();
			$response_data = $this->call($stub . '/', 'POST', $request_data);

			return $response_data;
		}
		
		public function update($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|SegmentationRule|Subscriber|Subscription|Template $object */
			$request_data = $object->getRequestArray();
			$response_data = $this->call($stub . '/' . $object->getId(), 'PUT', $request_data);
			
			return $response_data;
		}
		
		public function delete($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|SegmentationRule|Subscriber|Subscription|Template $object */
			$id = $object->getId();
			$request_data = $object->getRequestArray();
			$this->call($stub . $id, 'DELETE', $request_data);

			return TRUE;
		}
		
		public function deleteById($stub, $object)
		{
			/** @var WhatCounts $this */
			/** @var Article|Campaign|MailingList|SegmentationRule|Subscriber|Subscription|Template $object */
			$id = $object->getId();
			$this->call($stub . $id, 'DELETE');
			
			return TRUE;
		}
	}