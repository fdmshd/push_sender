<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/healthcheck', name: 'app_healthcheck')]
class HealthcheckController
{
    public function __invoke(): Response
    {
        return new JsonResponse(['status' => 'ok']);
    }
}