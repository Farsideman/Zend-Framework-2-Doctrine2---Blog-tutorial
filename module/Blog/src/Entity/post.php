<?php

namespace Blog\Entity;

use Application\Entity\AbstractEntity; //Insert this one
use Doctrine\ORM\Mapping as ORM;

/**
* Class Blog
*
* @ORM\Entity
* @ORM\Table(name="posts")
*/
class Post extends AbstractEntity
{
    /**
    * @var int
    * @ORM\Column(name="id", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    protected $id;

    /**
    * @var string
    * @ORM\Column(name="title", type="string", nullable=false, length=128)
    */
    protected $title;

    /**
    * @var string
    * @ORM\Column(name="slug", type="string", nullable=true, length=128)
    */
    protected $slug;

    /**
    * @var \DateTime
    * @ORM\Column(name="created", type="datetime", nullable=false)
    */
    protected $created;

    /**
    * @var string
    * @ORM\Column(name="body", type="string", nullable=false)
    */
    protected $body;

    public function __construct()
    {
        if (empty($this->created)) {
            $this->created = new \DateTime('NOW');
        }
    }

    public function generateSlug($title = null)
    {
        if (empty($title) && !empty($this->getTitle())) {
            $title = $this->getTitle();
        }

        $slug = str_replace(' ', '-', strtolower(htmlspecialchars($title)));

        $this->setSlug($slug);

        return $this->getSlug();
    }

    /**
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @param int $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
    * @return string
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
    * @param string $title
    */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
    * @return string
    */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
    * @param string $slug
    */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
    * @return \DateTime
    */
    public function getCreated()
    {
        return $this->created;
    }

    /**
    * @param \DateTime $created
    */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
    * @return string
    */
    public function getBody()
    {
        return $this->body;
    }

    /**
    * @param string $body
    */
    public function setBody($body)
    {
        $this->body = $body;
    }
}