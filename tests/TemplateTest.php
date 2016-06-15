<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/22/16
	 * Time: 3:21 PM
	 */
	
	namespace ZayconWhatCounts;

	class TemplateTest extends WhatCountsTest
	{
		private $template;
		private $templates;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->template = new Template;
			$this->template
				->setName("Unit Test Template")
				->setSubject("Unit Test from WhatCounts")
				->setDescription("This is the description")
				->setPermissionMask(0)
				->setDataPlaintext("This is the plain text template")
				->setDataHtml("<p>This is the HTML template</p>")
				->setDataMobile("This is the mobile template")
				->setDataAol("Does anyone still use AOL?")
				->setDataAvantgo("AvantGo? Really?")
				->setDataWap("Maybe my grandpa will see this")
				->setDataXml("<unicode>0</unicode><encode_base64>0</encode_base64><utf_charset></utf_charset><encode_quoted>0</encode_quoted>")
				->setReplaceFields("")
				->setNotes("Some notes.");

			$whatcounts->createTemplate($this->template);
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			
			unset($this->templates);

			if (isset($this->template))
			{
				$whatcounts->deleteTemplate($this->template);
				unset($this->article);
			}
		}

		public function testGetTemplates()
		{
			/** @var WhatCounts $whatcounts */
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
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Template $template */
			$template = $this->template;

			$template = $whatcounts->getTemplateById($template->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Template', $template);
		}

		public function testGetTemplateByName()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Template $template */
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
			/** @var Template $template */
			$template = $this->template;
			
			$this->assertObjectHasAttribute('id', $this->template);
			$this->assertAttributeInternalType('int', 'id', $this->template);

			$this->assertObjectHasAttribute('created_date', $this->template);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $template->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateTemplate()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Template $template */
			$template = $this->template;
			
			$template = $whatcounts->getTemplateById($template->getId());

			$template->setName('Unit Test Template (updated)');

			$whatcounts->updateTemplate($template);

			$this->assertObjectHasAttribute('updated_date', $template);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $template->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteTemplate()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Template $template */
			$template = $this->template;

			$template = $whatcounts->getTemplateById($template->getId());

			$is_deleted = $whatcounts->deleteTemplate($template);

			$this->assertTrue($is_deleted);

			unset($this->template);
		}

	}
