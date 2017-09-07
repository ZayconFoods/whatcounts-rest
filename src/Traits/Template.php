<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 9:07 AM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;

	/**
	 * Class Template
	 * @package Zaycon\Whatcounts_Rest
	 */
	trait Template
	{
		/**
		 * URL Stub
		 *
		 * @var string $template_stub
		 */
		private $template_stub = 'templates';

		/**
		 * Template class name
		 * 
		 * @var string $template_class_name
		 */
		private $template_class_name = 'Zaycon\Whatcounts_Rest\Models\Template';

		/**
		 * Get all templates from the API.
         *
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getTemplates($retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$templates = $whatcounts->getAll($this->template_stub, $this->template_class_name);

			return $templates;
		}

		/**
		 * Get a template from the API.
		 * Must pass a template id to method.
		 * Passes template id to API.
		 *
		 * @param $template_id
		 *
		 * @return Models\Template
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getTemplateById($template_id, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$template = $whatcounts->getById($this->template_stub, $this->template_class_name, $template_id);

			return $template;
		}

		/**
		 * Get a template from the  API.
		 * Must pass a template name to method.
		 * Passes template name to API.
		 *
		 * @param string $template_name
         * @param bool $retry
         * @param bool $do_async
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getTemplateByName($template_name, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$templates = $whatcounts->getByName($this->template_stub, $this->template_class_name, $template_name, $retry, $do_async);

			return $templates;
		}

		/**
		 * Create a Template in API.
		 * Must pass a Template object to method.
		 * Passes Template object to API.
		 *
		 * @param Models\Template $template
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createTemplate(Models\Template &$template, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->template_stub, $template, $retry, $do_async);

			$template
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
				->setSkip($response_data->skip)
				->setMax($response_data->max);
		}

		/**
		 * Update a Subscription in API.
		 * Must pass a Template object to method.
		 * Passes Template object to API.
		 *
		 * @param Models\Template $template
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateTemplate(Models\Template &$template, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->template_stub, $template, $retry, $do_async);

			$template
				->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * Delete a Subscription in API.
		 * Must pass a Template object to method.
		 * Passes Template object to API.
		 * 
		 * @param Models\Template $template
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteTemplate(Models\Template $template, $retry = TRUE, $do_async = FALSE)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->template_stub, $template, $retry, $do_async);
		}
	}