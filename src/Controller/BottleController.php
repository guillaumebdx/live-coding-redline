<?php

namespace App\Controller;

use App\Entity\Bottle;
use App\Repository\BottleRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
     * @Route("/bottle/add/{id}", name="bottle_add_one", methods={"POST"})
     */
    public function addOneBottle(Bottle $bottle, EntityManagerInterface $entityManager): Response
    {
        $bottle->addOne();
        $entityManager->flush();
        return $this->json($bottle->getQuantity(), Response::HTTP_OK);
    }

    /**
     * @Route("/bottle/remove/{id}", name="bottle_remove_one", methods={"POST"})
     */
    public function removeOneBottle(Bottle $bottle, EntityManagerInterface $entityManager): Response
    {
        $bottle->removeOne();
        $entityManager->flush();
        return $this->json($bottle->getQuantity(), Response::HTTP_OK);
    }
}
