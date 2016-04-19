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
		public function getSegmentations()
		{
			/** @var WhatCounts $this */
			$response_data = $this->call('lists', 'GET');

			$segmentation_rules = array();

			foreach ($response_data as $segmentationRuleItem) {
				$segmentation_rule = new SegmentationRule($segmentationRuleItem);
				$segmentation_rules[] = $segmentation_rule;
			}

			return $segmentation_rules;

		}

		public function getSegmentationById($segmentation_id)
		{
			/** @var WhatCounts $this */
			$response_data = $this->call('segmentation/' . $segmentation_id, 'GET');
			$segmentation_rule = new SegmentationRule($response_data);

			return $segmentation_rule;
		}

		public function getSegmentationByName($segmentation_name)
		{

		}

		public function createSegmentation(SegmentationRule $segmentation_rule)
		{

		}

		public function updateSegmentation(SegmentationRule $segmentation_rule)
		{

		}

		public function deleteSegmentation(SegmentationRule $segmentation_rule)
		{

		}
	}