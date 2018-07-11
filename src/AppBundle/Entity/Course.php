<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Course
 * @package AppBundle\Entity

 * @ORM\Entity()
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $download;

    /**
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="download")
     * @var File
     */
    private $downloadFile;

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
     * @return null|string
     */
    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    /**
     * @param null|string $thumb
     * @return Course
     */
    public function setThumb(?string $thumb): Course
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
     * @return Course
     */
    public function setThumbFile(?File $thumbFile): Course
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
    public function getDownload(): ?string
    {
        return $this->download;
    }

    /**
     * @param null|string $download
     * @return Course
     */
    public function setDownload(?string $download): Course
    {
        $this->download = $download;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getDownloadFile(): ?File
    {
        return $this->downloadFile;
    }

    /**
     * @param null|File $downloadFile
     * @return Course
     */
    public function setDownloadFile(?File $downloadFile): Course
    {
        $this->downloadFile = $downloadFile;
        if ($downloadFile) {
            $this->updated = new \DateTime('now');
        }
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
    public function getTracks()
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
    public function getTags()
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
