<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 9:07 AM
	 */

	namespace ZayconWhatCounts;


	trait TemplateTraits
	{
		private $template_stub = 'templates';
		private $template_class_name = 'ZayconWhatCounts\Template';

		public function getTemplates()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$templates = $whatcounts->getAll($this->template_stub, $this->template_class_name);

			return $templates;
		}
		
		public function getTemplateById($template_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$template = $whatcounts->getById($this->template_stub, $this->template_class_name, $template_id);

			return $template;
		}

		public function getTemplateByName($template_name)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$template = $whatcounts->getByName($this->template_stub, $this->template_class_name, $template_name);

			return $template;
		}

		public function createTemplate(Template &$template)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->template_stub, $template);

			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateTemplate(Template &$template)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->template_stub, $template);

			$template
				->setUpdatedDate($response_data->updatedDate);
		}

		public function deleteTemplate(Template $template)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->template_stub, $template);
		}
	}