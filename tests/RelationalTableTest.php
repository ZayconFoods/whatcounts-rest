<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/28/16
	 * Time: 8:30 AM
	 */

	namespace Zaycon\Whatcounts_Rest;


	class RelationalTableTest extends WhatCountsTest
	{
		private $relational_table;
		private $relational_tables;

		public function setUp()
		{
			parent::setUp();

			$this->relational_table = new Models\RelationalTable();
		}

		public function tearDown()
		{
			parent::tearDown();

			if (isset($this->relational_table))
			{
				unset($this->relational_table);
			}
		}
		
		public function testGetRelationalTables()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->relational_tables = $whatcounts->getRelationalTables();

			$this->assertInternalType('array',$this->relational_tables);

			foreach ($this->relational_tables as $relational_table)
			{
				/** @var Models\RelationalTable $relational_table */
				$this->assertInstanceOf('Zaycon\Whatcounts_Rest\Models\RelationalTable', $relational_table);
			}
		}
		
	}
