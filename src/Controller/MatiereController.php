<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\MatiereType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MatiereController extends AbstractController
{
    /**
     * @Route("/matiere", name="matiere")
     */
    public function index(): Response
    {
        return $this->render('matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
        ]);
    }
     /**
     * @Route("/matiere/matiere", name="matiere_matiere")
     * @param Request $request
     * @return Reponse
     */
    public function matiere(Request $request): Response{
        return $this->render('matiere/matiere.html.twig');
        $matiere=new Matiere();
        $form= $this ->createForm (MatiereType::class);
        return $this ->render('matiere/matiere.html.twig',
        [
            "form"=>$form ->createView()
        ]);
    }
}
