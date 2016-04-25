<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/21/16
	 * Time: 3:01 PM
	 */
	class ArticleTest extends PHPUnit_Framework_TestCase
	{
		const ENV = 'development';
		
		private $whatcounts;
		private $article;
		private $articles;
		private $time_zone;
		
		public function setUp()
		{
			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			PHPUnit_Framework_Error_Notice::$enabled = FALSE;

			$this->article = new ZayconWhatCounts\Article;
			$this->article
				->setName("Unit Test Article")
				->setTitle("Unit Test from WhatCounts")
				->setDescription("This is the description");

			$this->whatcounts->createArticle($this->article);

			$this->time_zone = new DateTimeZone($this->whatcounts->getTimeZone());
		}

		public function tearDown()
		{
			unset($this->articles);

			$this->whatcounts = new ZayconWhatCounts\WhatCounts(self::ENV);
			if (isset($this->article))
			{
				//$this->whatcounts->deleteArticle($this->article);
				unset($this->list);
			}
		}

		public function testGetArticles()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->articles = $whatcounts->getArticles();

			$this->assertInternalType('array',$this->articles);

			foreach ($this->articles as $article)
			{
				/** @var ZayconWhatCounts\Article $article */
				$this->assertInstanceOf('ZayconWhatCounts\Article', $article);
			}
		}

		public function testGetArticleById()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Article', $article);
		}

		public function testGetArticleByName()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Article $article */
			$article = $this->article;

			$this->articles = $whatcounts->getArticleByName($article->getName());

			$this->assertInternalType('array',$this->articles);

			foreach ($this->articles as $article)
			{
				$this->assertInstanceOf('ZayconWhatCounts\Article', $article);
			}
		}

		public function testCreateArticle()
		{
			/** @var ZayconWhatCounts\Article $article */
			$article = $this->article;

			$this->assertObjectHasAttribute('id', $article);
			$this->assertAttributeInternalType('int', 'id', $article);

			$this->assertObjectHasAttribute('created_date', $article);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $article->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateArticle()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$article->setName('Unit Test Article (updated)');

			$whatcounts->updateArticle($article);

			$this->assertObjectHasAttribute('updated_date', $article);

			$now = new DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $article->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteArticle()
		{
			/** @var ZayconWhatCounts\WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var ZayconWhatCounts\Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$is_deleted = $whatcounts->deleteArticle($article);

			$this->assertTrue($is_deleted);

			unset($this->article);
		}

	}
