<?php

namespace App\Entity\Traits;


use Gedmo\Mapping\Annotation\Timestampable;

trait TimestampableTrait
{
    /**
     * @var \DateTime $createdAt
     * @Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime $updatedAt
     * @Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return TimestampableTrait
     */
    public function setCreatedAt(\DateTime $createdAt): ?self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return TimestampableTrait
     */
    public function setUpdatedAt(\DateTime $updatedAt): ?self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}