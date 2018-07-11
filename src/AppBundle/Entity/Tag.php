<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 * @package AppBundle\Entity

 * @ORM\Entity()
 */
class Tag extends AbstractEntity
{
    /**
     * @ORM\Column(type="string", options={"collation":"utf8mb4_unicode_ci"})
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Course", inversedBy="tags", cascade={"remove"})
     */
    private $courses;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        AbstractEntity::__construct();
        $this->courses = new ArrayCollection();
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
     * @return Tag
     */
    public function setTitle($title): Tag
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCourses(): ?ArrayCollection
    {
        return $this->courses;
    }

    /**
     * @param Course[] $courses
     * @return Tag
     */
    public function setCourses($courses): Tag
    {
        $this->courses = $courses;
        return $this;
    }
}
