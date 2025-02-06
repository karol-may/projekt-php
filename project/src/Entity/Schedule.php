<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ScheduleRepository;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $time;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTime(): \DateTime
    {
        return $this->time;
    }

    public function setTime(\DateTime $time): self
    {
        $this->time = $time;
        return $this;
    }
}
