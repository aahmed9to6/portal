<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 * @package AppBundle\Entity

 * @ORM\Entity()
 * @ORM\Table()
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Tag
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @param mixed $courses
     * @return Tag
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;
        return $this;
    }

}
