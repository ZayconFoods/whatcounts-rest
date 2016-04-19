<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:40 AM
	 */

	namespace ZayconWhatCounts;

	trait ListTraits
	{
		/**
		 * @return array
		 * @throws WhatCountsException
		 *
		 */
		public function getLists()
		{
			/** @var WhatCounts $this */
			$response_data = $this->call('lists', 'GET');

			$lists = array();

			foreach ($response_data as $listItem) {
				$list = new MailingList($listItem);
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
			/** @var WhatCounts $this */
			$response_data = $this->call('lists/' . $list_id, 'GET');

			$list = new MailingList($response_data);
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
			/** @var WhatCounts $this */
			$response_data = $this->call('lists?name=' . $list_name, 'GET');

			$lists = array();

			foreach ($response_data as $listItem) {
				$list = new MailingList($listItem);
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
			$request_data = $list->getRequestArray();
			/** @var WhatCounts $this */
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
			$request_data = $list->getRequestArray();
			/** @var WhatCounts $this */
			$response_data = $this->call('lists/' . $list->getId(), 'PUT', $request_data);

			$list
				->setUpdatedDate($response_data->listUpdatedDate);

		}

		public function deleteList(MailingList $list)
		{
			$id = $list->getId();
			/** @var WhatCounts $this */
			$this->call('lists/' . $id, 'DELETE');

			return TRUE;
		}

	}