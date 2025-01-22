<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Route::class)]
    private $route;

    #[ORM\ManyToOne(targetEntity: BusStop::class)]
    private $stop;

    #[ORM\Column(type: 'datetime')]
    private $departureTime;

    // Getters and setters...
}
