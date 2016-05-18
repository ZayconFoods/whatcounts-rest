<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class ArticleTraits
	 * @package ZayconWhatCounts
	 */
	trait ArticleTraits
	{
		/**
		 * URL Stub
		 *
		 * @var string $article_stub
		 */
		private $article_stub = 'articles';

		/**
		 * Article Class Name
		 *
		 * @var string $article_class_name
		 */
		private $article_class_name = 'ZayconWhatCounts\Article';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getArticles()
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$articles = $whatcounts->getAll($this->article_stub, $this->article_class_name);

			return $articles;
		}

		/**
		 * @param $article_id
		 *
		 * @return Article
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getArticleById($article_id)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$article = $whatcounts->getById($this->article_stub, $this->article_class_name, $article_id);

			return $article;
		}

		/**
		 * @param $article_name
		 *
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getArticleByName($article_name)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$article = $whatcounts->getByName($this->article_stub, $this->article_class_name, $article_name);

			return $article;
		}

		/**
		 * @param Article $article
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createArticle(Article &$article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->article_stub, $article);

			$article
				->setId($response_data->articleId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
				->setSkip($response_data->skip)
				->setMax($response_data->max);
		}

		/**
		 * @param Article $article
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateArticle(Article &$article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->article_stub, $article);

			$article
				->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param Article $article
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteArticle(Article $article)
		{
			$whatcounts = $this;
			/** @var WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->article_stub, $article);
		}
	}