<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface as ORMEntityManagerInterface;
use App\Service\UserInfoService;

class HomeController extends AbstractController
{
    private $userInfoService;

    public function __construct(UserInfoService $userInfoService)
    {
        $this->userInfoService = $userInfoService;
    }

    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/test', name: 'app_test')]
    public function test(ORMEntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $userInfo       = $this->userInfoService->getUserInfo();
        $userRepository = $entityManager->getRepository(User::class);
        $users          = $userRepository->findAll();
        return $this->render('test/index.html.twig', [
            'users'    => $users,
            'userInfo' => $userInfo,
        ]);
    }
}
