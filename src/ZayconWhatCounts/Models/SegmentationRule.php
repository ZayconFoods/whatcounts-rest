<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/27/16
 * Time: 8:52 AM
 */

namespace ZayconWhatCounts;


class SegmentationRule
{
    private $id;
    private $realm_id;
    private $name;
    private $list_id;
    private $rules;
    private $description;
    private $created_date;
    private $updated_date;

    public function __construct(\stdClass $article_response = NULL, $time_zone = NULL)
    {
        if (isset($article_response))
        {
            $this
                ->setId($article_response->articleId)
                ->setRealmId($article_response->realmId)
                ->setName($article_response->name)
                ->setDescription($article_response->description)
                ->setCreatedDate($article_response->createdDate, $time_zone)
                ->setUpdatedDate($article_response->updatedDate, $time_zone)
                ->setListId($article_response->listId)
                ->setRules($article_response->rules);
        }
    }

    public function getRequestArray()
    {
        $request_array = array(
            'id' => $this->getId(),
            'realmId' => $this->getRealmId(),
            'name' => $this->getName(),
            'listId' => $this->getListId(),
            'rules' => $this->getRules(),
            'description' => $this->getDescription()
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
     * @return SegmentationRule
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
     * @return SegmentationRule
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
     * @return SegmentationRule
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getListId()
    {
        return $this->list_id;
    }

    /**
     * @param mixed $list_id
     *
     * @return SegmentationRule
     */
    public function setListId($list_id)
    {
        $this->list_id = (int)$list_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param mixed $rules
     *
     * @return SegmentationRule
     */
    public function setRules($rules)
    {
        $this->rules = (string)$rules;

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
     * @return SegmentationRule
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

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
     * @param \DateTimeZone $time_zone
     *
     * @return SegmentationRule
     */
    public function setCreatedDate($created_date, $time_zone)
    {
        $this->created_date = date_create_from_format('M j, Y g:i:s A', $created_date, $time_zone);

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
     * @param \DateTimeZone $time_zone
     *
     * @return SegmentationRule
     */
    public function setUpdatedDate($updated_date, $time_zone)
    {
        $this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date, $time_zone);

        return $this;
    }

}
