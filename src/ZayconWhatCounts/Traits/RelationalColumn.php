<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/6/16
	 * Time: 10:39 AM
	 */

	namespace ZayconWhatCounts;


	trait RelationalColumnTraits
	{
		private $relational_column_class_name = '\ZayconWhatCounts\RelationalColumns';

		public function getRelationalColumns($relational_table_name)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;
			$relational_columns = $whatcounts->getAll($this->relational_table_stub . '/' . $relational_table_name . '/columns', $this->relational_column_class_name);

			return $relational_columns;
		}

		/**
		 * @param RelationalTable $relational_table
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createRelationalData(RelationalTable &$relational_table)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;
			$response_data = $whatcounts->create($this->relational_table_stub, $relational_table);

			$relational_table
				->setId($response_data->articleId)
				->setCreatedDate($response_data->createdDate, new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param RelationalTable $relational_table
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateRelationalData(RelationalTable &$relational_table)
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;
			$response_data = $whatcounts->update($this->relational_table_stub, $relational_table);

			$relational_table
				->setUpdatedDate($response_data->updatedDate, new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param RelationalTable $relational_table
		 *
		 * @return boolean
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteRelationalData(RelationalTable &$relational_table)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->relational_table_stub, $relational_table);
		}
	}