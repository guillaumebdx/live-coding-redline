<?php

namespace App\Controller;

use App\Entity\Appelation;
use App\Form\AppelationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppelationController extends AbstractController
{
    /**
     * @Route("/appelation", name="appelation")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appelation = new Appelation();
        $form = $this->createForm(AppelationType::class, $appelation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appelation);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('appelation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
