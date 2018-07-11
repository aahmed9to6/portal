<?php
namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package AppBundle\Entity
 */
abstract class AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;

    /**
     * @ORM\Column( name = "status", type="boolean", options={"default"=true, "comment":"0 => InActive, 1 => Active"})
     */
    protected $status;

    /**
     * AbstractEntity constructor.
     */
    public function __construct()
    {
        $this->status = true;
    }


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AbstractEntity
     */
    public function setId(int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return AbstractEntity
     */
    public function setCreated(\DateTime $created): AbstractEntity
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return AbstractEntity
     */
    public function setUpdated(\DateTime $updated): AbstractEntity
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return AbstractEntity
     */
    public function setStatus($status): AbstractEntity
    {
        $this->status = $status;
        return $this;
    }
}
