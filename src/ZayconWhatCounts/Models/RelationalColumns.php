<?php
	/**
	 * Created by PhpStorm.
	 * Author: Mark Simonds
	 * Date: 5/23/16
	 * Time: 11:00 AM
	 *
	 * Copyright of Zaycon Fresh, LLC.
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class RelationalColumns
	 * @package ZayconWhatCounts
	 */
	class RelationalColumns
	{
		/**
		 * id field from API
		 *
		 * @var integer $id
		 */
		private $id;

		/**
		 * realmId field from API
		 *
		 * @var integer $realm_id
		 */
		private $realm_id;

		/**
		 * parentTableId field from API
		 *
		 * @var integer $parent_table_id
		 */
		private $parent_table_id;

		/**
		 * foreignKey field from API
		 *
		 * @var bool $foreign_key
		 */
		private $foreign_key;

		/**
		 * uniqueField field from API
		 *
		 * @var bool $unique_field
		 */
		private $unique_field;

		/**
		 * columnLength field from API
		 *
		 * @var integer $column_length
		 */
		private $column_length;

		/**
		 * name field from API
		 *
		 * @var string $name
		 */
		private $name;

		/**
		 * status field from API
		 *
		 * @var string $status
		 */
		private $status;

		/**
		 * storageType field from API
		 *
		 * @var string $storage_type
		 */
		private $storage_type;

		/**
		 * type field from API
		 *
		 * @var string $type
		 */
		private $type;

		/**
		 * createdDate field from API
		 *
		 * @var \DateTime $created_date
		 */
		private $created_date;

		/**
		 * updatedDate field from API
		 *
		 * @var \DateTime $updated_date
		 */
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
					->setCreatedDate($relational_columns_response->createdDate, 'M j, Y g:i:s A', $time_zone)
					->setUpdatedDate($relational_columns_response->updatedDate, 'M j, Y g:i:s A', $time_zone);
			}
		}

		/**
		 * Generates array for API request.
		 *
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
		 * Gets the private variable $id value.
		 *
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Sets the private variable $id value.
		 *
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
		 * Gets the private variable $realm_id value.
		 *
		 * @return mixed
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * Sets the private variable $realm_id value.
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
		 * Gets the private variable $parent_table_id value.
		 *
		 * @return mixed
		 */
		public function getParentTableId()
		{
			return $this->parent_table_id;
		}

		/**
		 * Sets the private variable $parent_table_id value.
		 *
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
		 * Gets the private variable $foreign_key value.
		 *
		 * @return mixed
		 */
		public function getForeignKey()
		{
			return $this->foreign_key;
		}

		/**
		 * Sets the private variable $foreign_key value.
		 *
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
		 * Gets the private variable $unique_field value.
		 *
		 * @return mixed
		 */
		public function getUniqueField()
		{
			return $this->unique_field;
		}

		/**
		 * Sets the private variable $unique_field value.
		 *
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
		 * Gets the private variable $column_length value.
		 *
		 * @return mixed
		 */
		public function getColumnLength()
		{
			return $this->column_length;
		}

		/**
		 * Sets the private variable $column_length value.
		 *
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
		 * Gets the private variable $name value.
		 *
		 * @return mixed
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * Sets the private variable $name value.
		 *
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
		 * Gets the private variable $status value.
		 *
		 * @return mixed
		 */
		public function getStatus()
		{
			return $this->status;
		}

		/**
		 * Sets the private variable $status value.
		 *
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
		 * Gets the private variable $storage_type value.
		 *
		 * @return mixed
		 */
		public function getStorageType()
		{
			return $this->storage_type;
		}

		/**
		 * Sets the private variable $storage_type value.
		 *
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
		 * Gets the private variable $type value.
		 *
		 * @return mixed
		 */
		public function getType()
		{
			return $this->type;
		}

		/**
		 * Sets the private variable $type value.
		 *
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
		 * Gets the private variable $created_date value.
		 *
		 * @return mixed
		 */
		public function getCreatedDate()
		{
			return $this->created_date;
		}

		/**
		 * Sets the private variable $created_date value.
		 *
		 * @param mixed $created_date
		 * @param string $format
		 * @param \DateTimeZone $time_zone
		 *
		 * @return RelationalColumns
		 */
		public function setCreatedDate($created_date, $format, $time_zone)
		{
			$this->created_date = date_create_from_format($format, $created_date, $time_zone);

			return $this;
		}

		/**
		 * Gets the private variable $updated_date value.
		 *
		 * @return mixed
		 */
		public function getUpdatedDate()
		{
			return $this->updated_date;
		}

		/**
		 * Sets the private variable $updated_date value.
		 *
		 * @param mixed $updated_date
		 * @param string $format
		 * @param \DateTimeZone $time_zone
		 *
		 * @return RelationalColumns
		 */
		public function setUpdatedDate($updated_date, $format, $time_zone)
		{
			$this->$updated_date = date_create_from_format($format, $updated_date, $time_zone);

			return $this;
		}

	}