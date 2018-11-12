<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\SortablePosition;

trait SortablePositionTrait
{
    /**
     * @var integer $position
     * @SortablePosition
     * @ORM\Column(type="integer", options={"default" : 1})
     */
    protected $position;

    /**
     * @return int
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return self
     */
    public function setPosition(int $position): ?self
    {
        $this->position = $position;

        return $this;
    }



}