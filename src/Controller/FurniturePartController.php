<?php

namespace App\Controller;

use App\Repository\FurnitureLegRepository;
use App\Repository\FurnitureSeatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FurniturePartController extends AbstractController
{
    #[Route('/api/furniture-legs', name: 'api_furniture_legs', methods: ['GET'])]
    public function getFurnitureLegs(FurnitureLegRepository $furnitureLegRepository): JsonResponse
    {
        $legs = $furnitureLegRepository->findAll();

        $data = [];
        foreach ($legs as $leg) {
            $data[] = [
                'id' => $leg->getId(),
                'name' => $leg->getName(),
                'image' => $leg->getImage(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/furniture-seats', name: 'api_furniture_seats', methods: ['GET'])]
    public function getFurnitureSeats(FurnitureSeatRepository $furnitureSeatRepository): JsonResponse
    {
        $seats = $furnitureSeatRepository->findAll();

        $data = [];
        foreach ($seats as $seat) {
            $data[] = [
                'id' => $seat->getId(),
                'name' => $seat->getName(),
                'image' => $seat->getImage(),
            ];
        }

        return $this->json($data);
    }
}
