<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 5/9/16
	 * Time: 10:19 AM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class RelationalData
	 * @package ZayconWhatCounts
	 */
	class RelationalData
	{
		/**
		 * data field from API
		 * @var object $data
		 */
		private $data;

		/**
		 * RelationalData constructor.
		 *
		 * @param \stdClass|NULL $relational_data_response
		 * @param null           $time_zone
		 */
		public function __construct(\stdClass $relational_data_response = NULL, $time_zone = NULL)
		{
			if (isset($relational_data_response))
			{
				$this->setData($relational_data_response);
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
				$this->getData()
			);
			return $request_array;
		}

		/**
		 * Gets the private variable data
		 *
		 * @return object
		 */
		public function getData()
		{
			return $this->data;
		}

		/**
		 * Sets the private variable data
		 *
		 * @param object $data
		 *
		 * @return RelationalData
		 */
		public function setData($data)
		{
			$this->data = (object)$data;

			return $this;
		}

	}