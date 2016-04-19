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
		public function getArticles()
		{
			$response_data = $this->call('articles/', 'GET');

			$articles = array();

			foreach ($response_data as $articleItem) {
				$article = new Article($articleItem);
				$articles[] = $article;
			}

			return $articles;
		}

		public function getArticleById($article_id)
		{
			$response_data = $this->call('articles/' . $article_id, 'GET');
			$article = new Article($response_data);

			return $article;

		}

		public function getArticleByName($article_name)
		{
			$response_data = $this->call('articles?name=' . $article_name, 'GET');
			$response_data = $response_data[0];

			$article = new Article($response_data);

			return $article;

		}

		public function createArticle(Article &$article)
		{
			$request_data = $article->getRequestArray();
			$response_data = $this->call('articles', 'POST', $request_data);

			$article
				->setId($response_data->id)
				->setRealmId($response_data->realmId)
				->setCreatedDate($response_data->createdDate);
		}

		public function updateArticle(Article &$article)
		{
			$request_data = $article->getRequestArray();
			$response_data = $this->call('articles/' . $article->getId(), 'PUT', $request_data);

			$article
				->setUpdatedDate($response_data->updatedDate);
		}

		public function deleteArticle(Article $article)
		{
			$id = $article->getId();
			$this->call('articles/' . $id, 'DELETE');

			return TRUE;
		}
	}