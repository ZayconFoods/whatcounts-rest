<?php

	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/21/16
	 * Time: 3:01 PM
	 */
	
	namespace ZayconWhatCounts;
	
	class ArticleTest extends WhatCountsTest
	{
		private $article;
		private $articles;

		public function setUp()
		{
			parent::setUp();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->article = new Article;
			$this->article
				->setName("Unit Test Article")
				->setTitle("Unit Test from WhatCounts")
				->setDescription("This is the description");

			$whatcounts->createArticle($this->article);
		}

		public function tearDown()
		{
			parent::tearDown();

			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			unset($this->articles);

			if (isset($this->article))
			{
				$whatcounts->deleteArticle($this->article);
				unset($this->list);
			}
		}

		public function testGetArticles()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;

			$this->articles = $whatcounts->getArticles();

			$this->assertInternalType('array',$this->articles);

			foreach ($this->articles as $article)
			{
				/** @var Article $article */
				$this->assertInstanceOf('ZayconWhatCounts\Article', $article);
			}
		}

		public function testGetArticleById()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$this->assertInstanceOf('ZayconWhatCounts\Article', $article);
		}

		public function testGetArticleByName()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Article $article */
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
			/** @var Article $article */
			$article = $this->article;

			$this->assertObjectHasAttribute('id', $article);
			$this->assertAttributeInternalType('int', 'id', $article);

			$this->assertObjectHasAttribute('created_date', $article);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$created_date = $article->getCreatedDate();

			$this->assertEquals($now->getTimestamp(), $created_date->getTimestamp(), '', 5.0);
		}

		public function testUpdateArticle()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$article->setName('Unit Test Article (updated)');

			$whatcounts->updateArticle($article);

			$this->assertObjectHasAttribute('updated_date', $article);

			$now = new \DateTime();
			$now->setTimezone($this->time_zone);

			$updated_date = $article->getUpdatedDate();

			$this->assertEquals($now->getTimestamp(), $updated_date->getTimestamp(), '', 5.0);
		}

		public function testDeleteArticle()
		{
			/** @var WhatCounts $whatcounts */
			$whatcounts = $this->whatcounts;
			/** @var Article $article */
			$article = $this->article;

			$article = $whatcounts->getArticleById($article->getId());

			$is_deleted = $whatcounts->deleteArticle($article);

			$this->assertTrue($is_deleted);

			unset($this->article);
		}

	}