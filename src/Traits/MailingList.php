<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:40 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;
	
	/**
	 * Class List
	 * @package Whatcounts_Rest
	 */
	trait MailingList
	{
		/**
		 * URL Stub
		 * 
		 * @var string $list_stub
		 */
		private $list_stub = 'lists';

		/**
		 * MailingList Class Name
		 * 
		 * @var string $list_class_name
		 */
		private $list_class_name = '\Zaycon\Whatcounts_Rest\Models\MailingList';

		/**
		 * @return array
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getLists()
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$lists = $whatcounts->getAll($this->list_stub, $this->list_class_name);

			return $lists;
		}

		/**
		 * @param $list_id
		 *
		 * @return Models\MailingList
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getListById($list_id)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$list = $whatcounts->getById($this->list_stub, $this->list_class_name, $list_id);

			return $list;
		}

		/**
		 * @param $list_name
		 *
		 * @return Models\MailingList
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 *
		 */
		public function getListByName($list_name)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$list = $whatcounts->getByName($this->list_stub, $this->list_class_name, $list_name);

			return $list;
		}

		/**
		 * @param Models\MailingList $list
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 *
		 */
		public function createList(Models\MailingList &$list)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->list_stub, $list);

			$list
				->setId($response_data->listId)
				->setCreatedDate($response_data->listCreatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
				->setSkip($response_data->skip)
				->setMax($response_data->max);
		}

		/**
		 * @param Models\MailingList $list
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 *
		 */
		public function updateList(Models\MailingList &$list)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->list_stub, $list);

			$list
				->setUpdatedDate($response_data->listUpdatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param Models\MailingList $list
		 *
		 * @return bool
		 * 
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 *
		 */
		public function deleteList(Models\MailingList $list)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->list_stub, $list);
		}

	}