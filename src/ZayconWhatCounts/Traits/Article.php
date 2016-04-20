<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	trait ArticleTraits
	{
		private $article_stub = 'articles';
		private $article_class_name = 'ZayconWhatCounts\Article';

		public function getArticles()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$articles = $whatcounts->getAll($this->article_stub, $this->article_class_name);

			return $articles;
		}

		public function getArticleById($article_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$article = $whatcounts->getById($this->article_stub, $this->article_class_name, $article_id);

			return $article;
		}

		public function getArticleByName($article_name)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$article = $whatcounts->getByName($this->article_stub, $this->article_class_name, $article_name);

			return $article;
		}

		public function createArticle(Article &$article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->article_stub, $article);

			$article
				->setId($response_data->articleId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateArticle(Article &$article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->article_stub, $article);

			$article
				->setUpdatedDate($response_data->updatedDate);
		}

		public function deleteArticle(Article $article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->article_stub, $article);
		}
	}