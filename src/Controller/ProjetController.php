<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjetController extends AbstractController
{

    // API definition de route avec le prefix api/
    #[Route('/api/projet', name: 'app_projet')]
    public function index(): Response
    {
        // retourne un json 
        return new Response(content: json_encode(value: ['test' => 'ok']));
    }
}
