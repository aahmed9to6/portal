<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Track
 * @package AppBundle\Entity

 * @ORM\Entity()
 * @ORM\Table()
 */
class Track extends AbstractEntity
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Course", inversedBy="tracks")
     */
    private $courses;

    /**
     * Track constructor.
     */
    public function __construct()
    {
        AbstractEntity::__construct();
        $this->courses = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Track
     */
    public function setTitle($title): Track
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Track
     */
    public function setDescription($description): Track
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Track
     */
    public function setLink($link): Track
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCourses(): ArrayCollection
    {
        return $this->courses;
    }

    /**
     * @param Course[] $courses
     * @return Track
     */
    public function setCourses($courses): Track
    {
        $this->courses = $courses;
        return $this;
    }
}
