<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/tests', name: 'app_tests')]
    public function test(): Response
    {
        return $this->render('test/test.html.twig', []);
    }
}
