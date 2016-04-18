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
			$response_data = $this->call('lists', 'GET');

			$segmentation_rules = array();

			foreach ($response_data as $segmentationRuleItem) {
				$segmentation_rule = new Template();
				$segmentation_rule
					->setId($segmentationRuleItem->id);

				$segmentation_rules[] = $segmentation_rule;
			}

			return $segmentation_rules;

		}

		public function getSegmentationById($segmentation_id)
		{
			$response_data = $this->call('segmentation/' . $segmentation_id, 'GET');

			$segmentation_rule = new SegmentationRule();
			$segmentation_rule
				->setId($response_data->id);

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