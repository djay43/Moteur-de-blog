<?php

namespace App\src\model;

class Comment
{
    private $id;
    
    private $author;
    
    private $comment;

    private $alert;
    
    private $dateAdded;

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
    public function getPostId()
    {
        return $this->id;
    }

    /*
     * @param mixed $id
     */
    public function setPostId($id)
    {
        $this->id = $id;
    }

    /*
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /*
     * @param mixed $pseudo
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /*
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /*
     * @param mixed $content
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    /*
     * @return mixed
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /*
     * @param mixed $content
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    /*
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /*
     * @param mixed $dateAdded
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }
}

