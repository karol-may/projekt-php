<?php

namespace App\Controller;

use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BusStopController extends AbstractController
{
    #[Route('/api/stops/{stopId}/departures', methods: ['GET'])]
    public function getDepartures($stopId, ScheduleRepository $scheduleRepository): JsonResponse
    {
        $departures = $scheduleRepository->findBy(['stop' => $stopId]);

        $response = array_map(function ($departure) {
            return [
                'line' => $departure->getRoute()->getLine()->getName(),
                'destination' => $departure->getRoute()->getStops()->last()->getName(),
                'departure_time' => $departure->getDepartureTime()->format('H:i')
            ];
        }, $departures);

        return new JsonResponse($response);
    }
}
