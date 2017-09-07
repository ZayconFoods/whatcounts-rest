<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/28/16
	 * Time: 8:27 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;


	/**
	 * Class RelationalTable
	 * @package Whatcounts_Rest
	 */
	trait RelationalTable
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
		private $relational_table_class_name = '\Zaycon\Whatcounts_Rest\Models\RelationalTable';

        /**
         * @param bool $retry
         * @param bool $do_async
         *
         * @return array
         */
		public function getRelationalTables($retry = TRUE, $do_async = FALSE)
		{
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$whatcounts = $this;

			if ($do_async)
            {
                return $whatcounts->getAll($this->relational_table_stub, $this->relational_table_class_name, $retry, $do_async);
            }
            else
            {
                $relational_tables = $whatcounts->getAll($this->relational_table_stub, $this->relational_table_class_name, $retry, $do_async);
                return $relational_tables;
            }
		}
		
	}