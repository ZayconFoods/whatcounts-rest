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
		private $list_stub = 'lists';
		private $list_class_name = '\ZayconWhatCounts\List';

		/**
		 * @return array
		 * @throws WhatCountsException
		 *
		 */
		public function getLists()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$lists = $whatcounts->getAll($this->list_stub, $this->list_class_name);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$list = $whatcounts->getById($this->list_stub, $this->list_class_name, $list_id);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$list = $whatcounts->getByName($this->list_stub, $this->list_class_name, $list_name);

			return $list;
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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->list_stub, $list);

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
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->list_stub, $list);

			$list
				->setUpdatedDate($response_data->listUpdatedDate);
		}

		public function deleteList(MailingList $list)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->list_stub, $list);
		}

	}