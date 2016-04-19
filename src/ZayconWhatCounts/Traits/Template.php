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
		public function getTemplates()
		{
			$response_data = $this->call('templates/', 'GET');

			$templates = array();

			foreach ($response_data as $templateItem) {
				$template = new Template($templateItem);
				$templates[] = $template;
			}
			
			return $templates;
		}
		
		public function getTemplateById($template_id)
		{
			$response_data = $this->call('templates/' . $template_id, 'GET');
			$template = new Template($response_data);

			return $template;

		}

		public function getTemplateByName($template_name)
		{
			$response_data = $this->call('templates?name=' . $template_name, 'GET');
			$response_data = $response_data[0];

			$template = new Template($response_data);

			return $template;

		}

		public function createTemplate(Template &$template)
		{
			$request_data = $template->getRequestArray();
			$response_data = $this->call('templates', 'POST', $request_data);

			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateTemplate(Template &$template)
		{
			$request_data = $template->getRequestArray();
			$response_data = $this->call('templates/' . $template->getId(), 'PUT', $request_data);

			$template
				->setUpdatedDate($response_data->updatedDate);
		}

		public function deleteTemplate(Template $template)
		{
			$id = $template->getId();
			$this->call('templates/' . $id, 'DELETE');

			return TRUE;
		}
	}