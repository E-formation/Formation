<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Form\AdministrateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdministrateurController extends AbstractController
{
    /**
     * @Route("/administrateur", name="administrateur")
     */
    public function index(): Response
    {
        return $this->render('administrateur/index.html.twig', [
            'controller_name' => 'AdministrateurController',
        ]);
    }
/**
* @Route("/administrateur/administrateur", name="administrateur_administrateur")
* @param Request $request
* @return Reponse
*/
    public function administrateur(Request $request): Response{
   return $this->render('administrateur/administrateur.html.twig');
   $administrateur=new Administrateur();
   $form= $this ->createForm (AdministrateurType::class);
   return $this ->render('administrateur/administrateur.html.twig',
   [
       "form"=>$form ->createView()
   ]);
    }
}
