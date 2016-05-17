<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/27/16
 * Time: 8:52 AM
 */

namespace ZayconWhatCounts;


/**
 * Class Template
 * @package ZayconWhatCounts
 */
class Template
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
     * @var string $subject
     */
    private $subject;

	/**
     * @var \DateTime $created_date
     */
    private $created_date;

	/**
     * @var \DateTime $updated_date
     */
    private $updated_date;

	/**
     * @var bool $deleted_flag
     */
    private $deleted_flag;

	/**
     * @var integer $folder_id
     */
    private $folder_id;

	/**
     * @var bool $has_video
     */
    private $has_video;

	/**
     * @var integer $permission_mask
     */
    private $permission_mask;

	/**
     * @var bool $inherited
     */
    private $inherited;

	/**
     * @var string $data_plaintext
     */
    private $data_plaintext;

	/**
     * @var string $data_html
     */
    private $data_html;

	/**
     * @var string $data_mobile
     */
    private $data_mobile;

	/**
     * @var string $data_wap
     */
    private $data_wap;

	/**
     * @var string $data_avantgo
     */
    private $data_avantgo;

	/**
     * @var string $data_aol
     */
    private $data_aol;

	/**
     * @var $data_xml
     */
    private $data_xml;

	/**
     * @var string $replace_fields
     */
    private $replace_fields;

	/**
     * @var string $notes
     */
    private $notes;

	/**
     * @var bool $plain_has_relational
     */
    private $plain_has_relational;

	/**
     * @var bool $html_has_relational
     */
    private $html_has_relational;

	/**
     * @var integer $library_id
     */
    private $library_id;

	/**
     * @var integer $layout_id
     */
    private $layout_id;

	/**
     * @var integer $skip
     */
    private $skip;

	/**
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
                ->setUpdatedDate(isset($template_response->updatedDate) ? $template_response->updatedDate : NULL, 'M j, Y g:i:s A', $time_zone)
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
            'plainHasRelational' => $this->isPlainHasRelational(),
            'htmlHasRelational' => $this->isHtmlHasRelational(),
            'templateLibraryId' => $this->getLibraryId(),
            'templateLayoutId)' => $this->getLayoutId()
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * Sets the private variable subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Gets the private variable subject
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
     * @return Template
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
     * Gets the private variable deleted_flag
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
     * Gets the private variable has_video
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
     * Sets the private variable permission_mask
     *
     * @return int
     */
    public function getPermissionMask()
    {
        return $this->permission_mask;
    }

    /**
     * Gets the private variable permission_mask
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
     * Gets the private variable inherited
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
     * Sets the private variable data_plaintext
     *
     * @return string
     */
    public function getDataPlaintext()
    {
        return $this->data_plaintext;
    }

    /**
     * Gets the private variable data_plaintext
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
     * Sets the private variable data_html
     *
     * @return string
     */
    public function getDataHtml()
    {
        return $this->data_html;
    }

    /**
     * Gets the private variable data_html
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
     * Sets the private variable data_mobile
     *
     * @return string
     */
    public function getDataMobile()
    {
        return $this->data_mobile;
    }

    /**
     * Gets the private variable data_mobile
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
     * Sets the private variable data_wap
     *
     * @return string
     */
    public function getDataWap()
    {
        return $this->data_wap;
    }

    /**
     * Gets the private variable data_wap
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
     * Sets the private variable data_avantgo
     *
     * @return string
     */
    public function getDataAvantgo()
    {
        return $this->data_avantgo;
    }

    /**
     * Gets the private variable data_avantgo
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
     * Sets the private variable data_aol
     *
     * @return string
     */
    public function getDataAol()
    {
        return $this->data_aol;
    }

    /**
     * Gets the private variable data_aol
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
     * Sets the private variable data_xml
     *
     * @return mixed
     */
    public function getDataXml()
    {
        return $this->data_xml;
    }

    /**
     * Gets the private variable data_xml
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
     * Sets the private variable replace_fields
     *
     * @return string
     */
    public function getReplaceFields()
    {
        return $this->replace_fields;
    }

    /**
     * Gets the private variable replace_fields
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
     * Sets the private variable notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Gets the private variable notes
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
     * Gets the private variable plain_has_relational
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
     * Gets the private variable html_has_relational
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
     * Sets the private variable library_id
     *
     * @return int
     */
    public function getLibraryId()
    {
        return $this->library_id;
    }

    /**
     * Gets the private variable library_id
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
     * Sets the private variable layout_id
     *
     * @return int
     */
    public function getLayoutId()
    {
        return $this->layout_id;
    }

    /**
     * Gets the private variable layout_id
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
     * @return Template
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
     * @return Template
     */
    public function setMax($max)
    {
        $this->max = (int)$max;

        return $this;
    }


}