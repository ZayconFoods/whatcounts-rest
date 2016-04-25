<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 8:54 AM
	 */

	namespace ZayconWhatCounts;


	trait SegmentationTraits
	{
		private $segmentation_stub = 'segmentation';
		private $segmentation_class_name = '\ZayconWhatCounts\SegmentationRule';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSegmentations()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rules = $whatcounts->getAll($this->segmentation_stub, $this->segmentation_class_name);

			return $segmentation_rules;
		}

		/**
		 * @param $segmentation_id
		 *
		 * @return mixed
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSegmentationById($segmentation_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rule = $whatcounts->getById($this->segmentation_stub, $this->segmentation_class_name, $segmentation_id);

			return $segmentation_rule;
		}

		/**
		 * @param $segmentation_name
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getSegmentationByName($segmentation_name)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rule = $whatcounts->getByName($this->segmentation_stub, $this->segmentation_class_name, $segmentation_name);

			return $segmentation_rule;
		}

		/**
		 * @param SegmentationRule $segmentation_rule
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createSegmentation(SegmentationRule &$segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->segmentation_stub, $segmentation_rule);

			$segmentation_rule
				->setId($response_data->segmentationId)
				->setCreatedDate($response_data->createdDate, new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param SegmentationRule $segmentation_rule
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateSegmentation(SegmentationRule &$segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->segmentation_stub, $segmentation_rule);

			$segmentation_rule
				->setUpdatedDate($response_data->updatedDate, new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param SegmentationRule $segmentation_rule
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteSegmentation(SegmentationRule $segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->segmentation_stub, $segmentation_rule);
		}
	}