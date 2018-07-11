<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Track
 * @package AppBundle\Entity

 * @ORM\Entity()
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $thumb;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="thumb")
     * @var File
     */
    private $thumbFile;

    /**
     * @ORM\Column(type="string", nullable=true, options={"collation":"utf8mb4_unicode_ci"})
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
    public function __toString(): ?string
    {
        return $this->title;
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
    public function getDescription(): ?string
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
     * @return null|string
     */
    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    /**
     * @param null|string $thumb
     * @return Track
     */
    public function setThumb(?string $thumb): Track
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getThumbFile(): ?File
    {
        return $this->thumbFile;
    }

    /**
     * @param null|File $thumbFile
     * @return Track
     */
    public function setThumbFile(?File $thumbFile): Track
    {
        $this->thumbFile = $thumbFile;
        if ($thumbFile) {
            $this->updated = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLink(): ?string
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
    public function getCourses()
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
