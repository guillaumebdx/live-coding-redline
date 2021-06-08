<?php

namespace App\Controller;

use App\Repository\BottleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BottleController extends AbstractController
{
    /**
     * @Route("/bottle", name="bottle")
     */
    public function index(BottleRepository $repository): Response
    {
        return $this->render('bottle/index.html.twig', [
            'bottles' => $repository->findAll(),
        ]);
    }
}
