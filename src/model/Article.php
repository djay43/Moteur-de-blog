<?php

namespace App\src\model;

class Article
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $date_added;

    /*
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /*
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /*
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /*
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /*
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /*
     * @return mixed
     */
    public function getExtract()
    {
        return $this->extract;
    }

    /*
     * @param mixed $author
     */
    public function setExtract($extract)
    {
        $this->extract = $extract;
    }

    /*
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /*
     * @param mixed $date_added
     */
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }
}