<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;


trait PublishedTrait
{
    /**
     * @var string $slug
     * @ORM\Column(type="string", nullable=true, options={"default" : false})
     */
    protected $published = false;

    /**
     * @return string
     */
    public function isArchived(): ?string
    {
        return $this->published;
    }

    /**
     * @param string $published
     * @return PublishedTrait
     */
    public function setPublished(string $published): ?self
    {
        $this->published = $published;

        return $this;
    }

}