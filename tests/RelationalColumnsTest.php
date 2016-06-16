<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/6/16
	 * Time: 10:51 AM
	 */

	namespace Zaycon\Whatcounts_Rest;


	class RelationalColumnsTest extends WhatCountsTest
	{
		private $relational_column;
		private $relational_columns;
		private $relational_table_name;
		private $relational_data;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$relational_tables = $whatcounts->getRelationalTables();

			/** @var Models\RelationalTable $relational_table */
			$relational_table = $relational_tables[0];
			$this->relational_table_name = $relational_table->getName();

			$this->relational_column = new Models\RelationalColumns();
		}

		public function tearDown()
		{
			parent::tearDown();

			if (isset($this->relational_column))
			{
				unset($this->relational_column);
			}
			if (isset($this->relational_data))
			{
				unset($this->relational_data);
			}
		}

		public function testGetRelationalColumns()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->relational_columns = $whatcounts->getRelationalColumns($this->relational_table_name);

			$this->assertInternalType('array',$this->relational_columns);

			foreach ($this->relational_columns as $relational_column)
			{
				/** @var Models\RelationalColumns $relational_column */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\RelationalColumns', $relational_column);
			}
		}
	}
