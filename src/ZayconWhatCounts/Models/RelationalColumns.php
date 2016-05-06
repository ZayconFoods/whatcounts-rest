<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/6/16
	 * Time: 9:29 AM
	 */

	namespace ZayconWhatCounts;


	class RelationalColumns
	{
		private $id;
		private $realm_id;
		private $parent_table_id;
		private $foreign_key;
		private $unique_field;
		private $column_length;
		private $name;
		private $status;
		private $storage_type;
		private $type;
		private $created_date;
		private $updated_date;

		/**
		 * RelationalColumns constructor.
		 *
		 * @param \stdClass|NULL $relational_columns_response
		 * @param null $time_zone
		 */
		public function __construct(\stdClass $relational_columns_response = NULL, $time_zone = NULL)
		{
			if (isset($relational_columns_response))
			{
				$this
					->setId($relational_columns_response->id)
					->setRealmId($relational_columns_response->realmId)
					->setParentTableId($relational_columns_response->parentTableId)
					->setForeignKey($relational_columns_response->foreignKey)
					->setUniqueField($relational_columns_response->uniqueField)
					->setColumnLength(isset($relational_columns_response->columnLength) ? $relational_columns_response->columnLength : NULL)
					->setName($relational_columns_response->name)
					->setStatus($relational_columns_response->status)
					->setStorageType($relational_columns_response->storageType)
					->setType($relational_columns_response->type)
					->setCreatedDate($relational_columns_response->createdDate, $time_zone)
					->setUpdatedDate($relational_columns_response->updatedDate, $time_zone);
			}
		}

		/**
		 * @return array
		 */
		public function getRequestArray()
		{
			$request_array = array(
				'id' => $this->getId(),
				'realmId' => $this->getRealmId(),
				'parentTableId' => $this->getParentTableId(),
				'foreignKey' => $this->getForeignKey(),
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
		 * @return RelationalColumns
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

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
		 * @return RelationalColumns
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getParentTableId()
		{
			return $this->parent_table_id;
		}

		/**
		 * @param mixed $parent_table_id
		 *
		 * @return RelationalColumns
		 */
		public function setParentTableId($parent_table_id)
		{
			$this->parent_table_id = (int)$parent_table_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getForeignKey()
		{
			return $this->foreign_key;
		}

		/**
		 * @param mixed $foreign_key
		 *
		 * @return RelationalColumns
		 */
		public function setForeignKey($foreign_key)
		{
			$this->foreign_key = (bool)$foreign_key;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUniqueField()
		{
			return $this->unique_field;
		}

		/**
		 * @param mixed $unique_field
		 *
		 * @return RelationalColumns
		 */
		public function setUniqueField($unique_field)
		{
			$this->unique_field = (bool)$unique_field;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getColumnLength()
		{
			return $this->column_length;
		}

		/**
		 * @param mixed $column_length
		 *
		 * @return RelationalColumns
		 */
		public function setColumnLength($column_length)
		{
			$this->column_length = (int)$column_length;

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
		 * @return RelationalColumns
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
		 * @return RelationalColumns
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
		 * @return RelationalColumns
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
		 * @return RelationalColumns
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
		 * @return RelationalColumns
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
		 * @return RelationalColumns
		 */
		public function setUpdatedDate($updated_date, $time_zone)
		{
			$this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date, $time_zone);

			return $this;
		}
		
		
	}