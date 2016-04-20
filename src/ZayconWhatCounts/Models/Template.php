<?php
/**
 * Created by PhpStorm.
 * User: marksimonds
 * Date: 1/27/16
 * Time: 8:52 AM
 */

namespace ZayconWhatCounts;


class Template
{
    private $id;
    private $realm_id;
    private $name;
    private $description;
    private $subject;
    private $created_date;
    private $updated_date;
    private $deleted_flag;
    private $folder_id;
    private $has_video;
    private $permission_mask;
    private $inherited;
    private $data_plaintext;
    private $data_html;
    private $data_mobile;
    private $data_wap;
    private $data_avantgo;
    private $data_aol;
    private $data_xml;
    private $replace_fields;
    private $notes;
    private $plain_has_relational;
    private $html_has_relational;
    private $library_id;
    private $layout_id;

    public function __construct(\stdClass $template_response = NULL)
    {
        if (isset($template_response))
        {
            $this
                ->setId($template_response->id)
                ->setRealmId($template_response->realmId)
                ->setName($template_response->name)
                ->setDescription($template_response->description)
                ->setSubject($template_response->subject)
                ->setCreatedDate($template_response->createdDate)
                ->setUpdatedDate($template_response->updatedDate)
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
                ->setLayoutId($template_response->templateLayoutId);
        }
    }

    public function getRequestArray()
    {
        $request_array = array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'subject' => $this->getSubject(),
            'deletedFlag' => $this->getDeletedFlag(),
            'templateFolderId' => $this->getFolderId(),
            'hasVideo' => $this->getHasVideo(),
            'permissionMask' => $this->getPermissionMask(),
            'templateInherited' => $this->getInherited(),
            'templateDataPlaintext' => $this->getDataPlaintext(),
            'templateDataHtml' => $this->getDataHtml(),
            'templateDataMobile' => $this->getDataMobile(),
            'templateDataWap' => $this->getDataWap(),
            'templateDataAvantgo' => $this->getDataAvantgo(),
            'templateDataAol' => $this->getDataAol(),
            'templateDataXml' => $this->getDataXml(),
            'templateReplaceFields' => $this->getReplaceFields(),
            'plainHasRelational' => $this->getPlainHasRelational(),
            'htmlHasRelational' => $this->getHtmlHasRelational(),
            'templateLibraryId' => $this->getLibraryId(),
            'templateLayoutId)' => $this->getLayoutId()
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
     * @return Template
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
     * @param $realm_id
     *
     * @return Template
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
     * @return Template
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
     * @return Template
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     *
     * @return Template
     */
    public function setSubject($subject)
    {
        $this->subject = (string)$subject;

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
     * @param $created_date
     *
     * @return Template
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
     * @return Template
     */
    public function setUpdatedDate($updated_date)
    {
        $this->updated_date = date_create_from_format('M j, Y g:i:s A', $updated_date);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeletedFlag()
    {
        return $this->deleted_flag;
    }

    /**
     * @param mixed $deleted_flag
     *
     * @return Template
     */
    public function setDeletedFlag($deleted_flag)
    {
        $this->deleted_flag = (bool)$deleted_flag;

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
     * @return Template
     */
    public function setFolderId($folder_id)
    {
        $this->folder_id = (int)$folder_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHasVideo()
    {
        return $this->has_video;
    }

    /**
     * @param mixed $has_video
     *
     * @return Template
     */
    public function setHasVideo($has_video)
    {
        $this->has_video = (bool)$has_video;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermissionMask()
    {
        return $this->permission_mask;
    }

    /**
     * @param mixed $permission_mask
     *
     * @return Template
     */
    public function setPermissionMask($permission_mask)
    {
        $this->permission_mask = (int)$permission_mask;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInherited()
    {
        return $this->inherited;
    }

    /**
     * @param mixed $inherited
     *
     * @return Template
     */
    public function setInherited($inherited)
    {
        $this->inherited = (bool)$inherited;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataPlaintext()
    {
        return $this->data_plaintext;
    }

    /**
     * @param mixed $data_plaintext
     *
     * @return Template
     */
    public function setDataPlaintext($data_plaintext)
    {
        $this->data_plaintext = (string)$data_plaintext;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataHtml()
    {
        return $this->data_html;
    }

    /**
     * @param mixed $data_html
     *
     * @return Template
     */
    public function setDataHtml($data_html)
    {
        $this->data_html = (string)$data_html;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataMobile()
    {
        return $this->data_mobile;
    }

    /**
     * @param mixed $data_mobile
     *
     * @return Template
     */
    public function setDataMobile($data_mobile)
    {
        $this->data_mobile = (string)$data_mobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataWap()
    {
        return $this->data_wap;
    }

    /**
     * @param mixed $data_wap
     *
     * @return Template
     */
    public function setDataWap($data_wap)
    {
        $this->data_wap = (string)$data_wap;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAvantgo()
    {
        return $this->data_avantgo;
    }

    /**
     * @param mixed $data_avantgo
     *
     * @return Template
     */
    public function setDataAvantgo($data_avantgo)
    {
        $this->data_avantgo = (string)$data_avantgo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAol()
    {
        return $this->data_aol;
    }

    /**
     * @param mixed $data_aol
     *
     * @return Template
     */
    public function setDataAol($data_aol)
    {
        $this->data_aol = (string)$data_aol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataXml()
    {
        return $this->data_xml;
    }

    /**
     * @param mixed $data_xml
     *
     * @return Template
     */
    public function setDataXml($data_xml)
    {
        try
        {
            $this->data_xml = new \SimpleXMLElement('<data_xml>' . $data_xml . '</data_xml>');
        }
        catch (\Exception $e)
        {

        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReplaceFields()
    {
        return $this->replace_fields;
    }

    /**
     * @param mixed $replace_fields
     *
     * @return Template
     */
    public function setReplaceFields($replace_fields)
    {
        $this->replace_fields = (string)$replace_fields;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     *
     * @return Template
     */
    public function setNotes($notes)
    {
        $this->notes = (string)$notes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlainHasRelational()
    {
        return $this->plain_has_relational;
    }

    /**
     * @param mixed $plain_has_relational
     *
     * @return Template
     */
    public function setPlainHasRelational($plain_has_relational)
    {
        $this->plain_has_relational = (bool)$plain_has_relational;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHtmlHasRelational()
    {
        return $this->html_has_relational;
    }

    /**
     * @param mixed $html_has_relational
     *
     * @return Template
     */
    public function setHtmlHasRelational($html_has_relational)
    {
        $this->html_has_relational = (bool)$html_has_relational;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibraryId()
    {
        return $this->library_id;
    }

    /**
     * @param mixed $library_id
     *
     * @return Template
     */
    public function setLibraryId($library_id)
    {
        $this->library_id = (int)$library_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLayoutId()
    {
        return $this->layout_id;
    }

    /**
     * @param mixed $layout_id
     *
     * @return Template
     */
    public function setLayoutId($layout_id)
    {
        $this->layout_id = (int)$layout_id;

        return $this;
    }

}