<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/28/16
	 * Time: 8:27 AM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class RelationalTableTraits
	 * @package ZayconWhatCounts
	 */
	trait RelationalTableTraits
	{
		/**
		 * URL Stub
		 * 
		 * @var string $relational_table_stub
		 */
		private $relational_table_stub = 'relationalTables';

		/**
		 * RelationalTable Class Name
		 * 
		 * @var string $relational_table_class_name
		 */
		private $relational_table_class_name = '\ZayconWhatCounts\RelationalTable';

		/**
		 * @return array
		 */
		public function getRelationalTables()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this;
			$relational_tables = $whatcounts->getAll($this->relational_table_stub, $this->relational_table_class_name);
			
			return $relational_tables;
		}
		
	}