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
	}