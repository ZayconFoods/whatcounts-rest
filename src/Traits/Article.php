<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace Zaycon\Whatcounts_Rest\Traits;

	use Zaycon\Whatcounts_Rest\Models;

	/**
	 * Class Article
	 * @package Whatcounts_Rest
	 */
	trait Article
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
		private $article_class_name = 'Zaycon\Whatcounts_Rest\Models\Article';

		/**
		 * @return array
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function getArticles()
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
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
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$article = $whatcounts->getByName($this->article_stub, $this->article_class_name, $article_name);

			return $article;
		}

		/**
		 * @param Models\Article $article
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function createArticle(Models\Article &$article)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->create($this->article_stub, $article);

			$article
				->setId($response_data->articleId)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()))
				->setSkip($response_data->skip)
				->setMax($response_data->max);
		}

		/**
		 * @param Models\Article $article
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function updateArticle(Models\Article &$article)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			$response_data = $whatcounts->update($this->article_stub, $article);

			$article
				->setUpdatedDate($response_data->updatedDate, 'M j, Y g:i:s A', new \DateTimeZone($whatcounts->getTimeZone()));
		}

		/**
		 * @param Models\Article $article
		 *
		 * @return bool
		 *
		 * @throws \GuzzleHttp\Exception\ServerException
		 * @throws \GuzzleHttp\Exception\RequestException
		 */
		public function deleteArticle(Models\Article $article)
		{
			$whatcounts = $this;
			/** @var \Zaycon\Whatcounts_Rest\WhatCounts $whatcounts */
			return $whatcounts->deleteById($this->article_stub, $article);
		}
	}