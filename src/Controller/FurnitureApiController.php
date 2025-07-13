<?php

namespace App\Controller;

use App\Entity\Furniture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FurnitureApiController extends AbstractController
{
    #[Route('/api/furnitures', name: 'api_furnitures', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $furnitures = $em->getRepository(Furniture::class)->findAll();

        $data = [];

        foreach ($furnitures as $furniture) {
            $data[] = [
                'id' => $furniture->getId(),
                'name' => $furniture->getName(),
                'description' => $furniture->getDescription(),
                'image' => $furniture->getImage(),
                'material' => $furniture->getMaterial(),
                'color' => $furniture->getColor(),
                'price' => $furniture->getPrice(),
                'isGreen' => $furniture->IsGreen(),
                'createdAt' => $furniture->getCreatedAt()->format('Y-m-d\TH:i:s'),
                'outDoor' => $furniture->isOutDoor(),
                'category' => $furniture->getCategory(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/furnitures/furniture/{id}', name: 'api_furniture_show', methods: ['GET'])]
    public function show(EntityManagerInterface $em, int $id): JsonResponse
    {
        $furniture = $em->getRepository(Furniture::class)->find($id);

        if (!$furniture) {
            return $this->json(['error' => 'Elemento non trovato'], 404);
        }

        $data = [
            'id' => $furniture->getId(),
            'name' => $furniture->getName(),
            'description' => $furniture->getDescription(),
            'image' => $furniture->getImage(),
            'material' => $furniture->getMaterial(),
            'color' => $furniture->getColor(),
            'price' => $furniture->getPrice(),
            'isGreen' => $furniture->isGreen(),
            'createdAt' => $furniture->getCreatedAt()->format('Y-m-d\TH:i:s'),
            'outDoor' => $furniture->isOutDoor(),
            'category' => $furniture->getCategory(),
        ];

        return $this->json($data);
    }

    #[Route('/api/furnitures/populate', name: 'api_furnitures-populate', methods: ['GET'])]
    public function populate(EntityManagerInterface $em): Response
    {
        $furniture1 = new Furniture();
        $furniture1->setName('Divano Rund');
        $furniture1->setPrice(98.99);
        $furniture1->setMaterial('Stoffa riciclata');
        $furniture1->setColor('Grigio chiaro');
        $furniture1->setIsGreen(true);
        $furniture1->setCreatedAt(new \DateTimeImmutable());
        $furniture1->setImage('images/divano-rund-grigino.png');
        $furniture1->isOutDoor(true);
        $furniture1->setCategory('poltrone e divani');

        $existing = $em->getRepository(Furniture::class)
            ->findOneBy(['name' => 'Divano Rund']);

        if (!$existing) {
            $em->persist($furniture1);
            $em->flush();
        }

        return new Response('Dati inseriti con successo!');
    }
}
