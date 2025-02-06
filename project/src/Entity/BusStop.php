<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BusStopRepository;

#[ORM\Entity(repositoryClass: BusStopRepository::class)]
class BusStop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $location;

    public function getId(): int
    {
        return $this->id;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }
}
