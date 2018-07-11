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
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Course
     */
    public function setTitle($title): Course
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Course
     */
    public function setDescription($description): Course
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Course
     */
    public function setLink($link): Course
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getOutDated(): ?bool
    {
        return $this->outDated;
    }

    /**
     * @param mixed $outDated
     * @return Course
     */
    public function setOutDated($outDated): Course
    {
        $this->outDated = $outDated;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTracks(): ?ArrayCollection
    {
        return $this->tracks;
    }

    /**
     * @param Track[] $tracks
     * @return Course
     */
    public function setTracks($tracks): Course
    {
        $this->tracks = $tracks;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags(): ?ArrayCollection
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     * @return Course
     */
    public function setTags($tags): Course
    {
        $this->tags = $tags;
        return $this;
    }
}
