<?php

namespace App\Controller;

use App\Entity\Castle;
use App\Form\CastleType;
use App\Repository\CastleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CastleController extends AbstractController
{
    private $castleRepository;

    public function __construct(CastleRepository $castleRepository)
    {
        $this->castleRepository = $castleRepository;
    }

    /**
     * @Route("/castle", name="castle")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $castle = new Castle();
        $form = $this->createForm(CastleType::class, $castle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($castle);
            $entityManager->flush();
        }
        return $this->render('castle/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
