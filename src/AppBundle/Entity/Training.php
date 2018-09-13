<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Training
 * @package AppBundle\Entity

 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrainingRepository")
 * @Vich\Uploadable
 */
class Training extends AbstractEntity
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Track", mappedBy="trainings", cascade={"remove"})
     */
    private $tracks;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", mappedBy="trainings", cascade={"remove"})
     */
    private $tags;

    /**
     * Training constructor.
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
     * @return Training
     */
    public function setTitle($title): Training
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
     * @return Training
     */
    public function setDescription($description): Training
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
     * @return Training
     */
    public function setThumb(?string $thumb): Training
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
     * @return Training
     */
    public function setThumbFile(?File $thumbFile): Training
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
     * @return Training
     */
    public function setDownload(?string $download): Training
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
     * @return Training
     */
    public function setDownloadFile(?File $downloadFile): Training
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
     * @return Training
     */
    public function setLink($link): Training
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
     * @return Training
     */
    public function setOutDated($outDated): Training
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
     * @return Training
     */
    public function setTracks($tracks): Training
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
     * @return Training
     */
    public function setTags($tags): Training
    {
        $this->tags = $tags;
        return $this;
    }
}
