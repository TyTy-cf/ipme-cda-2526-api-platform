<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class SlugController extends AbstractController
{
    #[Route(path: '/api/brands/slug/{slug}', name: 'brands_show_by_slug', methods: ['GET'])]
    public function __invoke(string $slug, BrandRepository $brandRepository): JsonResponse
    {
        return $this->json($brandRepository->findOneBy(['slug' => $slug]));
    }
}
