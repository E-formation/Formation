<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Form\EnseignantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant", name="enseignant")
     */
    public function index(): Response
    {
        return $this->render('enseignant/index.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }
    /**
     * @Route("/enseignant/enseignant", name="enseignant_enseignant")
     * @param Request $request
     * @return Reponse
     */
    public function enseignant(Request $request): Response{
        return $this->render('enseignant/enseignant.html.twig');
        $enseignant=new Enseignant();
        $form= $this ->createForm (EnseignantType::class);
        return $this ->render('enseignant/enseignant.html.twig',
        [
            "form"=>$form ->createView()
        ]);
    }
}
