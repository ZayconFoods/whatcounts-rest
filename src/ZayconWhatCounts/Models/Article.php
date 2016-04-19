<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	class Article
	{
		private $id;
		private $realm_id;
		private $name;
		private $description;
		private $author_email;
		private $author_name;
		private $author_bio;
		private $title;
		private $created_date;
		private $updated_date;
		private $folder_id;
		private $deck;
		private $callout;
		private $body;
		private $parent_article_id;

		public function __construct($article_response = NULL)
		{
			if (isset($article_response))
			{
				$this
					->setId($article_response->articleId)
					->setRealmId($article_response->realmId)
					->setName($article_response->name)
					->setDescription($article_response->description)
					->setAuthorEmail($article_response->authorEmail)
					->setAuthorName($article_response->authorName)
					->setAuthorBio($article_response->authorBio)
					->setTitle($article_response->title)
					->setCreatedDate($article_response->createdDate)
					->setUpdatedDate($article_response->updatedDate)
					->setFolderId($article_response->folderId)
					->setDeck($article_response->dek)
					->setCallout($article_response->callout)
					->setBody($article_response->body)
					->setParentArticleId($article_response->parentArticleId);
			}
		}

		public function getRequestArray()
		{
			$request_array = array(
				'articleId' => $this->getId(),
				'realmId' => $this->getRealmId(),
				'name' => $this->getName(),
				'description' => $this->getDescription(),
				'authorEmail' => $this->getAuthorEmail(),
				'authorName' => $this->getAuthorName(),
				'authorBio' => $this->getAuthorBio(),
				'title' => $this->getTitle(),
				'createdDate' => $this->getCreatedDate(),
				'updatedDate' => $this->getUpdatedDate(),
				'folderId' => $this->getFolderId(),
				'dek' => $this->getDeck(),
				'callout' => $this->getCallout(),
				'body' => $this->getBody(),
				'parentArticleId)' => $this->getParentArticleId()
			);
			return $request_array;
		}

		/**
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id
		 *
		 * @return Article
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * @param mixed $realm_id
		 *
		 * @return Article
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * @param mixed $name
		 *
		 * @return Article
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDescription()
		{
			return $this->description;
		}

		/**
		 * @param mixed $description
		 *
		 * @return Article
		 */
		public function setDescription($description)
		{
			$this->description = (string)$description;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getAuthorEmail()
		{
			return $this->author_email;
		}

		/**
		 * @param mixed $author_email
		 *
		 * @return Article
		 */
		public function setAuthorEmail($author_email)
		{
			$this->author_email = (string)$author_email;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getAuthorName()
		{
			return $this->author_name;
		}

		/**
		 * @param mixed $author_name
		 *
		 * @return Article
		 */
		public function setAuthorName($author_name)
		{
			$this->author_name = (string)$author_name;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getAuthorBio()
		{
			return $this->author_bio;
		}

		/**
		 * @param mixed $author_bio
		 *
		 * @return Article
		 */
		public function setAuthorBio($author_bio)
		{
			$this->author_bio = (string)$author_bio;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getTitle()
		{
			return $this->title;
		}

		/**
		 * @param mixed $title
		 *
		 * @return Article
		 */
		public function setTitle($title)
		{
			$this->title = (string)$title;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCreatedDate()
		{
			return $this->created_date;
		}

		/**
		 * @param mixed $created_date
		 *
		 * @return Article
		 */
		public function setCreatedDate($created_date)
		{
			$this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date);

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getUpdatedDate()
		{
			return $this->updated_date;
		}

		/**
		 * @param mixed $updated_date
		 *
		 * @return Article
		 */
		public function setUpdatedDate($updated_date)
		{
			$this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date);

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getFolderId()
		{
			return $this->folder_id;
		}

		/**
		 * @param mixed $folder_id
		 *
		 * @return Article
		 */
		public function setFolderId($folder_id)
		{
			$this->folder_id = (string)$folder_id;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getDeck()
		{
			return $this->deck;
		}

		/**
		 * @param mixed $deck
		 *
		 * @return Article
		 */
		public function setDeck($deck)
		{
			$this->deck = (string)$deck;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getCallout()
		{
			return $this->callout;
		}

		/**
		 * @param mixed $callout
		 *
		 * @return Article
		 */
		public function setCallout($callout)
		{
			$this->callout = (string)$callout;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getBody()
		{
			return $this->body;
		}

		/**
		 * @param mixed $body
		 *
		 * @return Article
		 */
		public function setBody($body)
		{
			$this->body = (string)$body;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getParentArticleId()
		{
			return $this->parent_article_id;
		}

		/**
		 * @param mixed $parent_article_id
		 *
		 * @return Article
		 */
		public function setParentArticleId($parent_article_id)
		{
			$this->parent_article_id = (int)$parent_article_id;

			return $this;
		}


	}