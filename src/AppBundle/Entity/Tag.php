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
     * @ORM\ManyToMany(targetEntity="Training", inversedBy="tags", cascade={"remove"})
     */
    private $trainings;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        AbstractEntity::__construct();
        $this->trainings = new ArrayCollection();
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
    public function getTrainings(): ?ArrayCollection
    {
        return $this->trainings;
    }

    /**
     * @param Training[] $trainings
     * @return Tag
     */
    public function setTrainings($trainings): Tag
    {
        $this->trainings = $trainings;
        return $this;
    }
}
