<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/9/16
	 * Time: 10:26 AM
	 */

	namespace ZayconWhatCounts;

	
	class RelationalDataTest extends WhatCountsTest
	{
		private $relational_table_name;
		private $relational_data;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$relational_tables = $whatcounts->getRelationalTables();

			/** @var RelationalTable $relational_table */
			$relational_table = $relational_tables[0];
			$this->relational_table_name = $relational_table->getName();

			$data = (object) array(
				'address' => '4321 Other Pl.',
				'campaign_id' => 332244,
				'city' => 'Somewhere',
				'ends_at' => '2016-06-01 17:00:00',
				'event_id' => 2,
				'lat' => 23.563235,
				'lng' => 33.2232,
				'location' => 'The Other Place',
				'route_id' => 1122,
				'starts_at' => '2016-06-01 16:00:00',
				'state' => 'WA',
				'title' => 'The Other Big Event',
				'zip' => 12345
			);

			$this->relational_data = new RelationalData;
			$this->relational_data->setData($data);

			$whatcounts->createRelationalData($this->relational_table_name, $this->relational_data);

		}

		public function tearDown()
		{
			parent::tearDown();
			
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			if (isset($this->relational_data))
			{
				$whatcounts->deleteRelationalData($this->relational_table_name, 2);
				unset($this->relational_data);
			}
			if (isset($this->relational_table_name))
			{
				unset($this->relational_table_name);
			}
		}

		public function testGetRelationalData()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->relational_data = $whatcounts->getRelationalData($this->relational_table_name, 2);

			$this->assertInstanceOf('ZayconWhatCounts\RelationalData', $this->relational_data);
		}

		public function testCreateRelationalData()
		{
			$this->assertInstanceOf('ZayconWhatCounts\RelationalData', $this->relational_data);
		}

		public function testUpdateRelationalData()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$data = (object) array(
				'zip' => '99999'
			);

			$relational_data = new RelationalData;
			$relational_data->setData($data);

			$this->relational_data = $whatcounts->updateRelationalData($this->relational_table_name, 2, $relational_data);

			$response_data = new RelationalData($this->relational_data);

			$this->assertInstanceOf('ZayconWhatCounts\RelationalData', $response_data);
		}

		public function testDeleteRelationalData()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$is_deleted = $whatcounts->deleteRelationalData($this->relational_table_name, 2);

			$this->assertTrue($is_deleted);
			unset($this->relational_data);
		}

	}
