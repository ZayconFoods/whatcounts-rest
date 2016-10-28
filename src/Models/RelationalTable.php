<?php
	/**
	 * Created by PhpStorm.
	 * Author: Mark Simonds
	 * Date: 5/23/16
	 * Time: 10:59 AM
	 *
	 * Copyright of Zaycon Fresh, LLC.
	 */

	namespace Zaycon\Whatcounts_Rest\Models;


	/**
	 * Class RelationalTable
	 * @package Whatcounts_Rest
	 */
	class RelationalTable
	{
		/**
		 * id field from API
		 *
		 * @var integer $id
		 */
		private $id;

		/**
		 * rowCount field from API
		 *
		 * @var integer $row_count
		 */
		private $row_count;

		/**
		 * realmId field from API
		 *
		 * @var integer $realm_id
		 */
		private $realm_id;

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
					->setCreatedDate($relational_table_response->createdDate, 'M j, Y g:i:s A', $time_zone)
					->setUpdatedDate($relational_table_response->updatedDate, 'M j, Y g:i:s A', $time_zone);
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
		 * Gets the private variable id
		 *
		 * @return int
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Sets the private variable id
		 *
		 * @param int $id
		 *
		 * @return RelationalTable
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * Gets the private variable row_count
		 *
		 * @return int
		 */
		public function getRowCount()
		{
			return $this->row_count;
		}

		/**
		 * Sets the private variable row_count
		 *
		 * @param int $row_count
		 *
		 * @return RelationalTable
		 */
		public function setRowCount($row_count)
		{
			$this->row_count = (int)$row_count;

			return $this;
		}

		/**
		 * Gets the private variable realm_id
		 *
		 * @return int
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * Sets the private variable realm_id
		 *
		 * @param int $realm_id
		 *
		 * @return RelationalTable
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * Gets the private variable name
		 *
		 * @return string
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * Sets the private variable name
		 *
		 * @param string $name
		 *
		 * @return RelationalTable
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * Gets the private variable status
		 *
		 * @return string
		 */
		public function getStatus()
		{
			return $this->status;
		}

		/**
		 * Sets the private variable status
		 *
		 * @param string $status
		 *
		 * @return RelationalTable
		 */
		public function setStatus($status)
		{
			$this->status = (string)$status;

			return $this;
		}

		/**
		 * Gets the private variable storage_type
		 *
		 * @return string
		 */
		public function getStorageType()
		{
			return $this->storage_type;
		}

		/**
		 * Sets the private variable storage_type
		 *
		 * @param string $storage_type
		 *
		 * @return RelationalTable
		 */
		public function setStorageType($storage_type)
		{
			$this->storage_type = (string)$storage_type;

			return $this;
		}

		/**
		 * Gets the private variable type
		 *
		 * @return string
		 */
		public function getType()
		{
			return $this->type;
		}

		/**
		 * Sets the private variable type
		 *
		 * @param string $type
		 *
		 * @return RelationalTable
		 */
		public function setType($type)
		{
			$this->type = (string)$type;

			return $this;
		}

		/**
		 * Gets the private variable created_date
		 *
		 * @return \DateTime
		 */
		public function getCreatedDate()
		{
			return $this->created_date;
		}

		/**
		 * Sets the private variable created_date
		 *
		 * @param \DateTime $created_date
		 * @param string $format
		 * @param string $time_zone
		 *
		 * @return RelationalTable
		 */
		public function setCreatedDate($created_date, $format, $time_zone)
		{
			$this->created_date = date_create_from_format($format, $created_date, $time_zone);

			return $this;
		}

		/**
		 * Gets the private variable updated_date
		 *
		 * @return \DateTime
		 */
		public function getUpdatedDate()
		{
			return $this->updated_date;
		}

		/**
		 * Sets the private variable updated_date
		 *
		 * @param \DateTime $updated_date
		 * @param string $format
		 * @param string $time_zone
		 *
		 * @return RelationalTable
		 */
		public function setUpdatedDate($updated_date, $format, $time_zone)
		{
			$this->updated_date = date_create_from_format($format, $updated_date, $time_zone);

			return $this;
		}

	}
