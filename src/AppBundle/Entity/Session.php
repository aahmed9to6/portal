<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Session
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class Session
{
    /**
     * @var string
     *
     * @ORM\Column(name="sess_id", type="string", length=128)
     * @ORM\Id
     */
    private $sessId;

    /**
     * @ORM\Column(type="blob")
     */
    private $sessData;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $sessTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $sessLifetime;

    /**
     * @return string
     */
    public function getSessId(): string
    {
        return $this->sessId;
    }

    /**
     * @param string $sessId
     */
    public function setSessId(string $sessId)
    {
        $this->sessId = $sessId;
    }

    /**
     * @return mixed
     */
    public function getSessData()
    {
        return $this->sessData;
    }

    /**
     * @param mixed $sessData
     */
    public function setSessData($sessData)
    {
        $this->sessData = $sessData;
    }

    /**
     * @return mixed
     */
    public function getSessTime()
    {
        return $this->sessTime;
    }

    /**
     * @param mixed $sessTime
     */
    public function setSessTime($sessTime)
    {
        $this->sessTime = $sessTime;
    }

    /**
     * @return mixed
     */
    public function getSessLifetime()
    {
        return $this->sessLifetime;
    }

    /**
     * @param mixed $sessLifetime
     */
    public function setSessLifetime($sessLifetime)
    {
        $this->sessLifetime = $sessLifetime;
    }
}
