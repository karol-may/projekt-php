<?php

namespace App\Controller;

use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use OpenApi\Annotations as OA;

class BusStopController extends AbstractController
{
    /**
     * @Route("/api/stops/{stop_id}/departures", methods={"GET"})
     * @OA\Get(
     *     path="/api/stops/{stop_id}/departures",
     *     summary="Pobiera najbliższe odjazdy z danego przystanku",
     *     tags={"Przystanki"},
     *     @OA\Parameter(
     *         name="stop_id",
     *         in="path",
     *         required=true,
     *         description="ID przystanku",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista nadchodzących odjazdów",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="line", type="string", example="Linia 10"),
     *                 @OA\Property(property="destination", type="string", example="Centrum"),
     *                 @OA\Property(property="departure_time", type="string", format="time", example="14:30")
     *             )
     *         )
     *     )
     * )
     */
    #[Route('/api/stops/{stop_id}/departures', methods: ['GET'])]
    #[IsGranted('ROLE_DISPLAY')]
    public function getDepartures(int $stop_id, ScheduleRepository $scheduleRepository): JsonResponse
    {
        $departures = $scheduleRepository->findBy(['stop' => $stop_id], ['departureTime' => 'ASC']);
        return $this->json($departures);
    }
}
