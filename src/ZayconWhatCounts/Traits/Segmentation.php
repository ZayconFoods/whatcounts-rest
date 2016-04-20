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

		public function getSegmentations()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rules = $whatcounts->getAll($this->segmentation_stub, $this->segmentation_class_name);

			return $segmentation_rules;
		}

		public function getSegmentationById($segmentation_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rule = $whatcounts->getById($this->segmentation_stub, $this->segmentation_class_name, $segmentation_id);

			return $segmentation_rule;
		}

		public function getSegmentationByName($segmentation_name)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$segmentation_rule = $whatcounts->getByName($this->segmentation_stub, $this->segmentation_class_name, $segmentation_name);

			return $segmentation_rule;
		}

		public function createSegmentation(SegmentationRule &$segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->segmentation_stub, $segmentation_rule);

			$segmentation_rule
				->setId($response_data->segmentationId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateSegmentation(SegmentationRule &$segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->segmentation_stub, $segmentation_rule);

			$segmentation_rule
				->setUpdatedDate($response_data->updatedDate);
		}

		public function deleteSegmentation(SegmentationRule $segmentation_rule)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->segmentation_stub, $segmentation_rule);
		}
	}