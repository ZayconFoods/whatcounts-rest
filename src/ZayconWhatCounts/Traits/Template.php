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
				$template = new Template();
				$template
					->setId($templateItem->id)
					->setRealmId($templateItem->realmId)
					->setName($templateItem->name)
					->setDescription($templateItem->description)
					->setSubject($templateItem->subject)
					->setCreatedDate($templateItem->createdDate)
					->setUpdatedDate($templateItem->updatedDate)
					->setDeletedFlag($templateItem->deletedFlag)
					->setFolderId($templateItem->templateFolderId)
					->setHasVideo($templateItem->hasVideo)
					->setPermissionMask($templateItem->permissionMask)
					->setInherited($templateItem->templateInherited)
					->setDataPlaintext($templateItem->templateDataPlaintext)
					->setDataHtml($templateItem->templateDataHtml)
					->setDataMobile($templateItem->templateDataMobile)
					->setDataWap($templateItem->templateDataWap)
					->setDataAvantgo($templateItem->templateDataAvantgo)
					->setDataAol($templateItem->templateDataAol)
					->setDataXml($templateItem->templateDataXml)
					->setReplaceFields($templateItem->templateReplaceFields)
					->setPlainHasRelational($templateItem->plainHasRelational)
					->setHtmlHasRelational($templateItem->htmlHasRelational)
					->setLibraryId($templateItem->templateLibraryId)
					->setLayoutId($templateItem->templateLayoutId);

				$templates[] = $template;
			}
			
			return $templates;
		}
		
		public function getTemplateById($template_id)
		{
			$response_data = $this->call('templates/' . $template_id, 'GET');

			$template = new Template();
			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setName($response_data->name)
				->setDescription($response_data->description)
				->setSubject($response_data->subject)
				->setCreatedDate($response_data->createdDate)
				->setUpdatedDate($response_data->updatedDate)
				->setDeletedFlag($response_data->deletedFlag)
				->setFolderId($response_data->templateFolderId)
				->setHasVideo($response_data->hasVideo)
				->setPermissionMask($response_data->permissionMask)
				->setInherited($response_data->templateInherited)
				->setDataPlaintext($response_data->templateDataPlaintext)
				->setDataHtml($response_data->templateDataHtml)
				->setDataMobile($response_data->templateDataMobile)
				->setDataWap($response_data->templateDataWap)
				->setDataAvantgo($response_data->templateDataAvantgo)
				->setDataAol($response_data->templateDataAol)
				->setDataXml($response_data->templateDataXml)
				->setReplaceFields($response_data->templateReplaceFields)
				->setPlainHasRelational($response_data->plainHasRelational)
				->setHtmlHasRelational($response_data->htmlHasRelational)
				->setLibraryId($response_data->templateLibraryId)
				->setLayoutId($response_data->templateLayoutId);

			return $template;

		}

		public function getTemplateByName($template_name)
		{
			$response_data = $this->call('templates?name=' . $template_name, 'GET');
			$response_data = $response_data[0];

			$template = new Template();
			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setName($response_data->name)
				->setDescription($response_data->description)
				->setSubject($response_data->subject)
				->setCreatedDate($response_data->createdDate)
				->setUpdatedDate($response_data->updatedDate)
				->setDeletedFlag($response_data->deletedFlag)
				->setFolderId($response_data->templateFolderId)
				->setHasVideo($response_data->hasVideo)
				->setPermissionMask($response_data->permissionMask)
				->setInherited($response_data->templateInherited)
				->setDataPlaintext($response_data->templateDataPlaintext)
				->setDataHtml($response_data->templateDataHtml)
				->setDataMobile($response_data->templateDataMobile)
				->setDataWap($response_data->templateDataWap)
				->setDataAvantgo($response_data->templateDataAvantgo)
				->setDataAol($response_data->templateDataAol)
				->setDataXml($response_data->templateDataXml)
				->setReplaceFields($response_data->templateReplaceFields)
				->setPlainHasRelational($response_data->plainHasRelational)
				->setHtmlHasRelational($response_data->htmlHasRelational)
				->setLibraryId($response_data->templateLibraryId)
				->setLayoutId($response_data->templateLayoutId);

			return $template;

		}

		public function createTemplate(Template &$template)
		{
			$request_data = array(
				'name' => $template->getName(),
				'description' => $template->getDescription(),
				'subject' => $template->getSubject(),
				'deletedFlag' => $template->getDeletedFlag(),
				'templateFolderId' => $template->getFolderId(),
				'hasVideo' => $template->getHasVideo(),
				'permissionMask' => $template->getPermissionMask(),
				'templateInherited' => $template->getInherited(),
				'templateDataPlaintext' => $template->getDataPlaintext(),
				'templateDataHtml' => $template->getDataHtml(),
				'templateDataMobile' => $template->getDataMobile(),
				'templateDataWap' => $template->getDataWap(),
				'templateDataAvantgo' => $template->getDataAvantgo(),
				'templateDataAol' => $template->getDataAol(),
				'templateDataXml' => $template->getDataXml(),
				'templateReplaceFields' => $template->getReplaceFields(),
				'plainHasRelational' => $template->getPlainHasRelational(),
				'htmlHasRelational' => $template->getHtmlHasRelational(),
				'templateLibraryId' => $template->getLibraryId(),
				'templateLayoutId)' => $template->getLayoutId()
			);
			$response_data = $this->call('templates', 'POST', $request_data);

			\Kint::dump($response_data);

			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateTemplate(Template &$template)
		{
			$request_data = array(
				'name' => $template->getName(),
				'description' => $template->getDescription(),
				'subject' => $template->getSubject(),
				'deletedFlag' => $template->getDeletedFlag(),
				'templateFolderId' => $template->getFolderId(),
				'hasVideo' => $template->getHasVideo(),
				'permissionMask' => $template->getPermissionMask(),
				'templateInherited' => $template->getInherited(),
				'templateDataPlaintext' => $template->getDataPlaintext(),
				'templateDataHtml' => $template->getDataHtml(),
				'templateDataMobile' => $template->getDataMobile(),
				'templateDataWap' => $template->getDataWap(),
				'templateDataAvantgo' => $template->getDataAvantgo(),
				'templateDataAol' => $template->getDataAol(),
				'templateDataXml' => $template->getDataXml(),
				'templateReplaceFields' => $template->getReplaceFields(),
				'plainHasRelational' => $template->getPlainHasRelational(),
				'htmlHasRelational' => $template->getHtmlHasRelational(),
				'templateLibraryId' => $template->getLibraryId(),
				'templateLayoutId)' => $template->getLayoutId()
			);
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