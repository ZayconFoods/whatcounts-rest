<?php
	/**
	 * Created by PhpStorm.
	 * User: Mark Simonds
	 * Date: 4/18/16
	 * Time: 1:09 PM
	 */

	namespace ZayconWhatCounts;


	/**
	 * Class Article
	 * @package ZayconWhatCounts
	 */
	class Article
	{
		/**
		 * @var integer $id
		 */
		private $id;

		/**
		 * @var integer $realm_id
		 */
		private $realm_id;

		/**
		 * @var string $name
		 */
		private $name;

		/**
		 * @var string $description
		 */
		private $description;

		/**
		 * @var string $author_email
		 */
		private $author_email;

		/**
		 * @var string $author_name
		 */
		private $author_name;

		/**
		 * @var string $author_bio
		 */
		private $author_bio;

		/**
		 * @var string $title
		 */
		private $title;

		/**
		 * @var \DateTime $created_date
		 */
		private $created_date;

		/**
		 * @var \DateTime $updated_date
		 */
		private $updated_date;

		/**
		 * @var integer $folder_id
		 */
		private $folder_id;

		/**
		 * @var string $deck
		 */
		private $deck;

		/**
		 * @var string $callout
		 */
		private $callout;

		/**
		 * @var string $body
		 */
		private $body;

		/**
		 * @var integer $parent_article_id
		 */
		private $parent_article_id;

		/**
		 * @var integer $skip
		 */
		private $skip;

		/**
		 * @var integer $max
		 */
		private $max;

		/**
		 * Article constructor.
		 *
		 * @param \stdClass|NULL $article_response
		 * @param null           $time_zone
		 */
		public function __construct(\stdClass $article_response = NULL, $time_zone = NULL)
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
					->setCreatedDate($article_response->createdDate, 'M j, Y g:i:s A', $time_zone)
					->setUpdatedDate($article_response->updatedDate, 'M j, Y g:i:s A', $time_zone)
					->setFolderId($article_response->folderId)
					->setDeck($article_response->dek)
					->setCallout($article_response->callout)
					->setBody($article_response->body)
					->setParentArticleId($article_response->parentArticleId)
					->setSkip($article_response->skip)
					->setMax($article_response->max);
			}
		}

		/**
		 * Generates array for API request.
		 * 
		 * @return array
		 */
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
				'folderId' => $this->getFolderId(),
				'dek' => $this->getDeck(),
				'callout' => $this->getCallout(),
				'body' => $this->getBody(),
				'parentArticleId)' => $this->getParentArticleId()
			);
			return $request_array;
		}

		/**
		 * Sets the private variable id
		 *
		 * @return int
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Gets the private variable id
		 *
		 * @param int $id
		 *
		 * @return Article
		 */
		public function setId($id)
		{
			$this->id = (int)$id;

			return $this;
		}

		/**
		 * Sets the private variable realm_id
		 *
		 * @return int
		 */
		public function getRealmId()
		{
			return $this->realm_id;
		}

		/**
		 * Gets the private variable realm_id
		 *
		 * @param int $realm_id
		 *
		 * @return Article
		 */
		public function setRealmId($realm_id)
		{
			$this->realm_id = (int)$realm_id;

			return $this;
		}

		/**
		 * Sets the private variable name
		 *
		 * @return string
		 */
		public function getName()
		{
			return $this->name;
		}

		/**
		 * Gets the private variable name
		 *
		 * @param string $name
		 *
		 * @return Article
		 */
		public function setName($name)
		{
			$this->name = (string)$name;

			return $this;
		}

		/**
		 * Sets the private variable description
		 *
		 * @return string
		 */
		public function getDescription()
		{
			return $this->description;
		}

		/**
		 * Gets the private variable description
		 *
		 * @param string $description
		 *
		 * @return Article
		 */
		public function setDescription($description)
		{
			$this->description = (string)$description;

			return $this;
		}

		/**
		 * Sets the private variable author_email
		 *
		 * @return string
		 */
		public function getAuthorEmail()
		{
			return $this->author_email;
		}

		/**
		 * Gets the private variable author_email
		 *
		 * @param string $author_email
		 *
		 * @return Article
		 */
		public function setAuthorEmail($author_email)
		{
			$this->author_email = (string)$author_email;

			return $this;
		}

		/**
		 * Sets the private variable author_name
		 *
		 * @return string
		 */
		public function getAuthorName()
		{
			return $this->author_name;
		}

		/**
		 * Gets the private variable author_name
		 *
		 * @param string $author_name
		 *
		 * @return Article
		 */
		public function setAuthorName($author_name)
		{
			$this->author_name = (string)$author_name;

			return $this;
		}

		/**
		 * Sets the private variable author_bio
		 *
		 * @return string
		 */
		public function getAuthorBio()
		{
			return $this->author_bio;
		}

		/**
		 * Gets the private variable author_bio
		 *
		 * @param string $author_bio
		 *
		 * @return Article
		 */
		public function setAuthorBio($author_bio)
		{
			$this->author_bio = (string)$author_bio;

			return $this;
		}

		/**
		 * Sets the private variable title
		 *
		 * @return string
		 */
		public function getTitle()
		{
			return $this->title;
		}

		/**
		 * Gets the private variable title
		 *
		 * @param string $title
		 *
		 * @return Article
		 */
		public function setTitle($title)
		{
			$this->title = (string)$title;

			return $this;
		}

		/**
		 * Sets the private variable created_date
		 *
		 * @return \DateTime
		 */
		public function getCreatedDate()
		{
			return $this->created_date;
		}

		/**
		 * Gets the private variable created_date
		 *
		 * @param \DateTime $created_date
		 * @param string $format
		 * @param string $time_zone
		 *
		 * @return Article
		 */
		public function setCreatedDate($created_date, $format, $time_zone)
		{
			$this->created_date = date_create_from_format($format, $created_date, $time_zone);

			return $this;
		}

		/**
		 * Sets the private variable updated_date
		 *
		 * @return \DateTime
		 */
		public function getUpdatedDate()
		{
			return $this->updated_date;
		}

		/**
		 * Gets the private variable updated_date
		 *
		 * @param \DateTime $updated_date
		 * @param string $format
		 * @param string $time_zone
		 *
		 * @return Article
		 */
		public function setUpdatedDate($updated_date, $format, $time_zone)
		{
			$this->updated_date = date_create_from_format($format, $updated_date, $time_zone);

			return $this;
		}

		/**
		 * Sets the private variable folder_id
		 *
		 * @return int
		 */
		public function getFolderId()
		{
			return $this->folder_id;
		}

		/**
		 * Gets the private variable folder_id
		 *
		 * @param int $folder_id
		 *
		 * @return Article
		 */
		public function setFolderId($folder_id)
		{
			$this->folder_id = (int)$folder_id;

			return $this;
		}

		/**
		 * Sets the private variable deck
		 *
		 * @return string
		 */
		public function getDeck()
		{
			return $this->deck;
		}

		/**
		 * Gets the private variable deck
		 *
		 * @param string $deck
		 *
		 * @return Article
		 */
		public function setDeck($deck)
		{
			$this->deck = (string)$deck;

			return $this;
		}

		/**
		 * Sets the private variable callout
		 *
		 * @return string
		 */
		public function getCallout()
		{
			return $this->callout;
		}

		/**
		 * Gets the private variable callout
		 *
		 * @param string $callout
		 *
		 * @return Article
		 */
		public function setCallout($callout)
		{
			$this->callout = (string)$callout;

			return $this;
		}

		/**
		 * Sets the private variable body
		 *
		 * @return string
		 */
		public function getBody()
		{
			return $this->body;
		}

		/**
		 * Gets the private variable body
		 *
		 * @param string $body
		 *
		 * @return Article
		 */
		public function setBody($body)
		{
			$this->body = (string)$body;

			return $this;
		}

		/**
		 * Sets the private variable parent_article_id
		 *
		 * @return int
		 */
		public function getParentArticleId()
		{
			return $this->parent_article_id;
		}

		/**
		 * Gets the private variable parent_article_id
		 *
		 * @param int $parent_article_id
		 *
		 * @return Article
		 */
		public function setParentArticleId($parent_article_id)
		{
			$this->parent_article_id = (int)$parent_article_id;

			return $this;
		}

		/**
		 * Sets the private variable skip
		 *
		 * @return int
		 */
		public function getSkip()
		{
			return $this->skip;
		}

		/**
		 * Gets the private variable skip
		 *
		 * @param int $skip
		 *
		 * @return Article
		 */
		public function setSkip($skip)
		{
			$this->skip = (int)$skip;

			return $this;
		}

		/**
		 * Sets the private variable max
		 *
		 * @return int
		 */
		public function getMax()
		{
			return $this->max;
		}

		/**
		 * Gets the private variable max
		 *
		 * @param int $max
		 *
		 * @return Article
		 */
		public function setMax($max)
		{
			$this->max = (int)$max;

			return $this;
		}
		
	}