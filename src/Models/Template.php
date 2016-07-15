<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/27/16
 * Time: 8:52 AM
 */

namespace Zaycon\Whatcounts_Rest\Models;
use Zaycon\Whatcounts_Rest\WhatCounts;

/**
 * Class Template
 * @package Whatcounts_Rest
 */
class Template
{
	/**
     * id field from API
     *
     * @var integer $id
     */
    private $id;

	/**
     * realmId field from API
     *
     * @var integer $realm_id
     */
    private $realm_id;

	/**
     * name field from API
     *
     * @var string $name
     */
    private $name;

	/**
     * description field from API
     *
     * @var string $description
     */
    private $description;

	/**
     * subject field from API
     *
     * @var string $subject
     */
    private $subject;

	/**
     * createdDate field from API
     *
     * @var \DateTime $created_date
     */
    private $created_date;

	/**
     * updatedDate field from API
     *
     * @var \DateTime $updated_date
     */
    private $updated_date;

	/**
     * deletedFlag field from API
     *
     * @var bool $deleted_flag
     */
    private $deleted_flag;

	/**
     * folderId field from API
     *
     * @var integer $folder_id
     */
    private $folder_id;

	/**
     * hasVideo field from API
     *
     * @var bool $has_video
     */
    private $has_video;

	/**
     * permissionMask field from API
     *
     * @var integer $permission_mask
     */
    private $permission_mask;

	/**
     * templateInherited field from API
     *
     * @var bool $inherited
     */
    private $inherited;

	/**
     * templateDataPlaintext field from API
     *
     * @var string $data_plaintext
     */
    private $data_plaintext;

	/**
     * templateDataHtml field from API
     *
     * @var string $data_html
     */
    private $data_html;

	/**
     * templateDataMobile field from API
     *
     * @var string $data_mobile
     */
    private $data_mobile;

	/**
     * templateDataWap field from API
     *
     * @var string $data_wap
     */
    private $data_wap;

	/**
     * templateDataAvantgo field from API
     *
     * @var string $data_avantgo
     */
    private $data_avantgo;

	/**
     * templateDataAol field from API
     *
     * @var string $data_aol
     */
    private $data_aol;

	/**
     * templateDataXml field from API
     *
     * @var $data_xml
     */
    private $data_xml;

	/**
     * templateReplaceFields field from API
     *
     * @var string $replace_fields
     */
    private $replace_fields;

	/**
     * templateNotes field from API
     *
     * @var string $notes
     */
    private $notes;

	/**
     * plainHasRelational field from API
     *
     * @var bool $plain_has_relational
     */
    private $plain_has_relational;

	/**
     * htmlHasDirectional field from API
     *
     * @var bool $html_has_relational
     */
    private $html_has_relational;

	/**
     * libraryId field from API
     *
     * @var integer $library_id
     */
    private $library_id;

	/**
     * layoutId field from API
     *
     * @var integer $layout_id
     */
    private $layout_id;

	/**
     * skip field from API
     *
     * @var integer $skip
     */
    private $skip;

	/**
     * max field from API
     *
     * @var integer $max
     */
    private $max;

	/**
     * Template constructor.
     *
     * @param \stdClass|NULL $template_response
     * @param null           $time_zone
     */
    public function __construct(\stdClass $template_response = NULL, $time_zone = NULL)
    {
        if (isset($template_response))
        {
            $this
                ->setId($template_response->id)
                ->setRealmId($template_response->realmId)
                ->setName($template_response->name)
                ->setDescription($template_response->description)
                ->setSubject($template_response->subject)
                ->setCreatedDate($template_response->createdDate, 'M j, Y g:i:s A', $time_zone)
                ->setUpdatedDate(WhatCounts::existsOrNull($template_response, 'updatedDate'), 'M j, Y g:i:s A', $time_zone)
                ->setDeletedFlag($template_response->deletedFlag)
                ->setFolderId($template_response->templateFolderId)
                ->setHasVideo($template_response->hasVideo)
                ->setPermissionMask($template_response->permissionMask)
                ->setInherited($template_response->templateInherited)
                ->setDataPlaintext($template_response->templateDataPlaintext)
                ->setDataHtml($template_response->templateDataHtml)
                ->setDataMobile($template_response->templateDataMobile)
                ->setDataWap($template_response->templateDataWap)
                ->setDataAvantgo($template_response->templateDataAvantgo)
                ->setDataAol($template_response->templateDataAol)
                ->setDataXml($template_response->templateDataXml)
                ->setReplaceFields($template_response->templateReplaceFields)
                ->setNotes(WhatCounts::existsOrNull($template_response, 'templateNotes'))
                ->setPlainHasRelational($template_response->plainHasRelational)
                ->setHtmlHasRelational($template_response->htmlHasRelational)
                ->setLibraryId($template_response->templateLibraryId)
                ->setLayoutId($template_response->templateLayoutId)
                ->setSkip($template_response->skip)
                ->setMax($template_response->max);
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
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'subject' => $this->getSubject(),
            'deletedFlag' => $this->isDeletedFlag(),
            'templateFolderId' => $this->getFolderId(),
            'hasVideo' => $this->isHasVideo(),
            'permissionMask' => $this->getPermissionMask(),
            'templateInherited' => $this->isInherited(),
            'templateDataPlaintext' => $this->getDataPlaintext(),
            'templateDataHtml' => $this->getDataHtml(),
            'templateDataMobile' => $this->getDataMobile(),
            'templateDataWap' => $this->getDataWap(),
            'templateDataAvantgo' => $this->getDataAvantgo(),
            'templateDataAol' => $this->getDataAol(),
            //'templateDataXml' => $this->getDataXml()->asXML(),
            'templateDataXml' => $this->getDataXml(),
            'templateReplaceFields' => $this->getReplaceFields(),
	        'templateNotes' => $this->getNotes(),
            'plainHasRelational' => $this->isPlainHasRelational(),
            'htmlHasRelational' => $this->isHtmlHasRelational(),
            'templateLibraryId' => $this->getLibraryId(),
            'templateLayoutId' => $this->getLayoutId()
        );
        return $request_array;
    }


    /**
     * Gets the private variable id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the private variable id
     *
     * @param int $id
     *
     * @return Template
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the private variable realm_id
     *
     * @return int
     */
    public function getRealmId()
    {
        return $this->realm_id;
    }

    /**
     * Sets the private variable realm_id
     *
     * @param int $realm_id
     *
     * @return Template
     */
    public function setRealmId($realm_id)
    {
        $this->realm_id = (int)$realm_id;

        return $this;
    }

    /**
     * Gets the private variable name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the private variable name
     *
     * @param string $name
     *
     * @return Template
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * Gets the private variable description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the private variable description
     *
     * @param string $description
     *
     * @return Template
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * Gets the private variable subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the private variable subject
     *
     * @param string $subject
     *
     * @return Template
     */
    public function setSubject($subject)
    {
        $this->subject = (string)$subject;

        return $this;
    }

    /**
     * Gets the private variable created_date
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Sets the private variable created_date
     *
     * @param \DateTime $created_date
     * @param string $format
     * @param string $time_zone
     *
     * @return Template
     */
    public function setCreatedDate($created_date, $format, $time_zone)
    {
        $this->created_date = date_create_from_format($format, $created_date, $time_zone);

        return $this;
    }

    /**
     * Gets the private variable updated_date
     *
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * Sets the private variable updated_date
     *
     * @param \DateTime $updated_date
     * @param string $format
     * @param string $time_zone
     *
     * @return Template
     */
    public function setUpdatedDate($updated_date, $format, $time_zone)
    {
        $this->updated_date = date_create_from_format($format, $updated_date, $time_zone);

        return $this;
    }

    /**
     * Sets the private variable deleted_flag
     *
     * @return boolean
     */
    public function isDeletedFlag()
    {
        return $this->deleted_flag;
    }

    /**
     * Sets the private variable deleted_flag
     *
     * @param boolean $deleted_flag
     *
     * @return Template
     */
    public function setDeletedFlag($deleted_flag)
    {
        $this->deleted_flag = (boolean)($deleted_flag === TRUE);

        return $this;
    }
    
    /**
     * Gets the private variable folder_id
     *
     * @return int
     */
    public function getFolderId()
    {
        return $this->folder_id;
    }

    /**
     * Sets the private variable folder_id
     *
     * @param int $folder_id
     *
     * @return Template
     */
    public function setFolderId($folder_id)
    {
        $this->folder_id = (int)$folder_id;

        return $this;
    }

    /**
     * Sets the private variable has_video
     *
     * @return boolean
     */
    public function isHasVideo()
    {
        return $this->has_video;
    }

    /**
     * Sets the private variable has_video
     *
     * @param boolean $has_video
     *
     * @return Template
     */
    public function setHasVideo($has_video)
    {
        $this->has_video = (boolean)$has_video;

        return $this;
    }

    /**
     * Gets the private variable permission_mask
     *
     * @return int
     */
    public function getPermissionMask()
    {
        return $this->permission_mask;
    }

    /**
     * Sets the private variable permission_mask
     *
     * @param int $permission_mask
     *
     * @return Template
     */
    public function setPermissionMask($permission_mask)
    {
        $this->permission_mask = (int)$permission_mask;

        return $this;
    }

    /**
     * Sets the private variable inherited
     *
     * @return boolean
     */
    public function isInherited()
    {
        return $this->inherited;
    }

    /**
     * Sets the private variable inherited
     *
     * @param boolean $inherited
     *
     * @return Template
     */
    public function setInherited($inherited)
    {
        $this->inherited = (boolean)$inherited;

        return $this;
    }

    /**
     * Gets the private variable data_plaintext
     *
     * @return string
     */
    public function getDataPlaintext()
    {
        return $this->data_plaintext;
    }

    /**
     * Sets the private variable data_plaintext
     *
     * @param string $data_plaintext
     *
     * @return Template
     */
    public function setDataPlaintext($data_plaintext)
    {
        $this->data_plaintext = (string)$data_plaintext;

        return $this;
    }

    /**
     * Gets the private variable data_html
     *
     * @return string
     */
    public function getDataHtml()
    {
        return $this->data_html;
    }

    /**
     * Sets the private variable data_html
     *
     * @param string $data_html
     *
     * @return Template
     */
    public function setDataHtml($data_html)
    {
        $this->data_html = (string)$data_html;

        return $this;
    }

    /**
     * Gets the private variable data_mobile
     *
     * @return string
     */
    public function getDataMobile()
    {
        return $this->data_mobile;
    }

    /**
     * Sets the private variable data_mobile
     *
     * @param string $data_mobile
     *
     * @return Template
     */
    public function setDataMobile($data_mobile)
    {
        $this->data_mobile = (string)$data_mobile;

        return $this;
    }

    /**
     * Gets the private variable data_wap
     *
     * @return string
     */
    public function getDataWap()
    {
        return $this->data_wap;
    }

    /**
     * Sets the private variable data_wap
     *
     * @param string $data_wap
     *
     * @return Template
     */
    public function setDataWap($data_wap)
    {
        $this->data_wap = (string)$data_wap;

        return $this;
    }

    /**
     * Gets the private variable data_avantgo
     *
     * @return string
     */
    public function getDataAvantgo()
    {
        return $this->data_avantgo;
    }

    /**
     * Sets the private variable data_avantgo
     *
     * @param string $data_avantgo
     *
     * @return Template
     */
    public function setDataAvantgo($data_avantgo)
    {
        $this->data_avantgo = (string)$data_avantgo;

        return $this;
    }

    /**
     * Gets the private variable data_aol
     *
     * @return string
     */
    public function getDataAol()
    {
        return $this->data_aol;
    }

    /**
     * Sets the private variable data_aol
     *
     * @param string $data_aol
     *
     * @return Template
     */
    public function setDataAol($data_aol)
    {
        $this->data_aol = (string)$data_aol;

        return $this;
    }

    /**
     * Gets the private variable data_xml
     *
     * @return mixed
     */
    public function getDataXml()
    {
        return $this->data_xml;
    }

    /**
     * Sets the private variable data_xml
     *
     * @param mixed $data_xml
     *
     * @return Template
     */
    public function setDataXml($data_xml)
    {
        try
        {
            //$this->data_xml = new \SimpleXMLElement('<data_xml>' . $data_xml . '</data_xml>');
            $this->data_xml = $data_xml;
        }
        catch (\Exception $e)
        {

        }

        return $this;
    }

    /**
     * Gets the private variable replace_fields
     *
     * @return string
     */
    public function getReplaceFields()
    {
        return $this->replace_fields;
    }

    /**
     * Sets the private variable replace_fields
     *
     * @param string $replace_fields
     *
     * @return Template
     */
    public function setReplaceFields($replace_fields)
    {
        $this->replace_fields = (string)$replace_fields;

        return $this;
    }

    /**
     * Gets the private variable notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the private variable notes
     *
     * @param string $notes
     *
     * @return Template
     */
    public function setNotes($notes)
    {
        $this->notes = (string)$notes;

        return $this;
    }

    /**
     * Sets the private variable plain_has_relational
     *
     * @return boolean
     */
    public function isPlainHasRelational()
    {
        return $this->plain_has_relational;
    }

    /**
     * Sets the private variable plain_has_relational
     *
     * @param boolean $plain_has_relational
     *
     * @return Template
     */
    public function setPlainHasRelational($plain_has_relational)
    {
        $this->plain_has_relational = (boolean)$plain_has_relational;

        return $this;
    }

    /**
     * Sets the private variable html_has_relational
     *
     * @return boolean
     */
    public function isHtmlHasRelational()
    {
        return $this->html_has_relational;
    }

    /**
     * Sets the private variable html_has_relational
     *
     * @param boolean $html_has_relational
     *
     * @return Template
     */
    public function setHtmlHasRelational($html_has_relational)
    {
        $this->html_has_relational = (boolean)$html_has_relational;

        return $this;
    }

    /**
     * Gets the private variable library_id
     *
     * @return int
     */
    public function getLibraryId()
    {
        return $this->library_id;
    }

    /**
     * Sets the private variable library_id
     *
     * @param int $library_id
     *
     * @return Template
     */
    public function setLibraryId($library_id)
    {
        $this->library_id = (int)$library_id;

        return $this;
    }

    /**
     * Gets the private variable layout_id
     *
     * @return int
     */
    public function getLayoutId()
    {
        return $this->layout_id;
    }

    /**
     * Sets the private variable layout_id
     *
     * @param int $layout_id
     *
     * @return Template
     */
    public function setLayoutId($layout_id)
    {
        $this->layout_id = (int)$layout_id;

        return $this;
    }

    /**
     * Gets the private variable skip
     *
     * @return int
     */
    public function getSkip()
    {
        return $this->skip;
    }

    /**
     * Sets the private variable skip
     *
     * @param int $skip
     *
     * @return Template
     */
    public function setSkip($skip)
    {
        $this->skip = (int)$skip;

        return $this;
    }

    /**
     * Gets the private variable max
     *
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Sets the private variable max
     *
     * @param int $max
     *
     * @return Template
     */
    public function setMax($max)
    {
        $this->max = (int)$max;

        return $this;
    }


}