<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Course
 * @package AppBundle\Entity

 * @ORM\Entity()
 * @ORM\Table()
 */
class Course extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", options={"collation":"utf8mb4_unicode_ci"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", options={"collation":"utf8mb4_unicode_ci"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", options={"collation":"utf8mb4_unicode_ci"})
     */
    private $link;

    /**
     * @ORM\Column(type="boolean", options={"comment":"0 => Upto Date, 1 => Out Dated"})
     */
    protected $outDated;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Track", mappedBy="courses", cascade={"remove"})
     */
    private $tracks;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", mappedBy="courses", cascade={"remove"})
     */
    private $tags;

    /**
     * Course constructor.
     */
    public function __construct()
    {
        AbstractEntity::__construct();
        $this->tracks = new ArrayCollection();
        $this->tags = new ArrayCollection();
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
     * @return Course
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return Course
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutDated()
    {
        return $this->outDated;
    }

    /**
     * @param mixed $outDated
     * @return Course
     */
    public function setOutDated($outDated)
    {
        $this->outDated = $outDated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @param mixed $tracks
     * @return Course
     */
    public function setTracks($tracks)
    {
        $this->tracks = $tracks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     * @return Course
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }


}
