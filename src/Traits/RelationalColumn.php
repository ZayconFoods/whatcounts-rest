<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/6/16
	 * Time: 10:39 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;
	
	/**
	 * Class RelationalColumn
	 * @package Whatcounts_Rest
	 */
	trait RelationalColumn
	{
		/**
		 * RelationalColumns Class Name
		 * 
		 * @var string $relational_column_class_name
		 */
		private $relational_column_class_name = '\Zaycon\Whatcounts_Rest\Models\RelationalColumns';

		/**
		 * @param $relational_table_name
		 *
		 * @return array
		 */
		public function getRelationalColumns($relational_table_name)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;
			$relational_columns = $whatcounts->getAll($this->relational_table_stub . '/' . $relational_table_name . '/columns', $this->relational_column_class_name);

			return $relational_columns;
		}
	}