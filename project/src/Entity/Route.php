<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Route
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: BusLine::class)]
    private $line;

    #[ORM\ManyToMany(targetEntity: BusStop::class)]
    private $stops;

    public function __construct()
    {
        $this->stops = new ArrayCollection();
    }

    // Getters and setters...
}
