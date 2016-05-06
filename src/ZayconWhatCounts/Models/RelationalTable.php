<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/28/16
	 * Time: 8:27 AM
	 */

	namespace ZayconWhatCounts;


	class RelationalTable
	{
		private $id;
		private $row_count;
		private $realm_id;
		private $name;
		private $status;
		private $storage_type;
		private $type;
		private $created_date;
		private $updated_date;

		/**
		 * RelationalTable constructor.
		 *
		 * @param \stdClass|NULL $relational_table_response
		 * @param null $time_zone
		 */
		public function __construct(\stdClass $relational_table_response = NULL, $time_zone = NULL)
		{
			if (isset($relational_table_response))
			{
				$this
					->setId($relational_table_response->id)
					->setRowCount($relational_table_response->rowCount)
					->setRealmId($relational_table_response->realmId)
					->setName($relational_table_response->name)
					->setStatus($relational_table_response->status)
					->setStorageType($relational_table_response->storageType)
					->setType($relational_table_response->type)
					->setCreatedDate($relational_table_response->createdDate, $time_zone)
					->setUpdatedDate($relational_table_response->updatedDate, $time_zone);
			}
		}

		/**
		 * @return array
		 */
		public function getRequestArray()
		{
			$request_array = array(
				'id' => $this->getId(),
				'rowCount' => $this->getRowCount(),
				'realmId' => $this->getRealmId(),
				'name' => $this->getName(),
				'status' => $this->getStatus(),
				'storage_type' => $this->getStorageType(),
				'type' => $this->getType()
			);
			return $request_array;
		}

		/**
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id
		 *
		 * @return RelationalTable
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getRowCount()
		{
			return $this->row_count;
		}

		/**
		 * @param mixed $row_count
		 *
		 * @return RelationalTable
		 */
		public function setRowCount($row_count)
		{
			$this->row_count = (int)$row_count;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * @param mixed $realm_id
		 *
		 * @return RelationalTable
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * @param mixed $name
		 *
		 * @return RelationalTable
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getStatus()
		{
			return $this->status;
		}

		/**
		 * @param mixed $status
		 *
		 * @return RelationalTable
		 */
		public function setStatus($status)
		{
			$this->status = (string)$status;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getStorageType()
		{
			return $this->storage_type;
		}

		/**
		 * @param mixed $storage_type
		 *
		 * @return RelationalTable
		 */
		public function setStorageType($storage_type)
		{
			$this->storage_type = (string)$storage_type;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getType()
		{
			return $this->type;
		}

		/**
		 * @param mixed $type
		 *
		 * @return RelationalTable
		 */
		public function setType($type)
		{
			$this->type = (string)$type;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCreatedDate()
		{
			return $this->created_date;
		}

		/**
		 * @param mixed $created_date
		 * @param \DateTimeZone $time_zone
		 *
		 * @return RelationalTable
		 */
		public function setCreatedDate($created_date, $time_zone)
		{
			$this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date, $time_zone);

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUpdatedDate()
		{
			return $this->updated_date;
		}

		/**
		 * @param mixed $updated_date
		 * @param \DateTimeZone $time_zone
		 *
		 * @return RelationalTable
		 */
		public function setUpdatedDate($updated_date, $time_zone)
		{
			$this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date, $time_zone);

			return $this;
		}

	}