<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/22/16
	 * Time: 3:21 PM
	 */
	class TemplateTest extends PHPUnit_Framework_TestCase
	{
		const ENV = 'development';

		private $whatcounts;
		private $template;
		private $templates;
		private $time_zone;

		public function setUp()
		{
			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			PHPUnit_Framework_Error_Notice::$enabled = FALSE;

			$this->template = new ZayconWhatCounts\Template;
			$this->template
				->setName("Unit Test Template")
				->setSubject("Unit Test from WhatCounts")
				->setDescription("This is the description");

			$this->whatcounts->createTemplate($this->template);

			$this->time_zone = new DateTimeZone($this->whatcounts->getTimeZone());
		}

		public function tearDown()
		{
			unset($this->templates);

			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			if (isset($this->template))
			{
				$this->whatcounts->deleteTemplate($this->template);
				unset($this->list);
			}
		}

		public function testGetTemplates()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->templates = $whatcounts->getTemplates();

			$this->assertInternalType('array',$this->templates);

			foreach ($this->templates as $template)
			{
				$this->assertInstanceOf('ZayconWhatCounts\Template', $template);
			}
		}

		public function testGetTemplateById()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Template $template */
			$template = $this->template;

			$template = $whatcounts->getTemplateById($template->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Template', $template);
		}

		public function testGetTemplateByName()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Template $template */
			$template = $this->template;

			$this->templates = $whatcounts->getTemplateByName($template->getName());

			$this->assertInternalType('array',$this->templates);

			foreach ($this->templates as $template)
			{
				$this->assertInstanceOf('ZayconWhatCounts\Template', $template);
			}
		}

		public function testCreateTemplate()
		{
			/** @var ZayconWhatCounts\Template $template */
			$template = $this->template;
			
			$this->assertObjectHasAttribute('id', $this->template);
			$this->assertAttributeInternalType('int', 'id', $this->template);

			$this->assertObjectHasAttribute('created_date', $this->template);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $template->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateTemplate()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Template $template */
			$template = $this->template;
			
			$template = $whatcounts->getTemplateById($template->getId());

			$template->setName('Unit Test Template (updated)');

			$whatcounts->updateTemplate($template);

			$this->assertObjectHasAttribute('updated_date', $template);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $template->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteTemplate()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Template $template */
			$template = $this->template;

			$template = $whatcounts->getTemplateById($template->getId());

			$is_deleted = $whatcounts->deleteTemplate($template);

			$this->assertTrue($is_deleted);

			unset($template);
		}

	}
