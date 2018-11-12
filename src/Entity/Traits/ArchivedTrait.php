<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait ArchivedTrait
{
    /**
     * @var string $slug
     * @ORM\Column(type="string", nullable=true, options={"default" : false})
     */
    protected $archived = false;

    /**
     * @return string
     */
    public function isArchived(): ?string
    {
        return $this->archived;
    }

    /**
     * @param string $archived
     * @return ArchivedTrait
     */
    public function setArchived(string $archived): ?self
    {
        $this->archived = $archived;

        return $this;
    }
}