<?php

namespace App\Controller;

use App\Entity\Emploidutemps;
use App\Form\EmploidutempsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmploidutempsController extends AbstractController
{
    /**
     * @Route("/emploidutemps", name="emploidutemps")
     */
    public function index(): Response
    {
        return $this->render('emploidutemps/index.html.twig', [
            'controller_name' => 'EmploidutempsController',
        ]);
    }
     /**
     * @Route("/empoidutemps/empoidutemps", name="empoidutemps_empoidutemps")
     * @param Request $request
     * @return Reponse
     */
    public function emploidutemps(Request $request): Response{
        return $this->render('emploidutemps/emploidutemps.html.twig');
        $emploidutemps=new Emploidutemps();
        $form= $this ->createForm (EmploidutempsType::class);
        return $this ->render('emploidutemps/emploidutemps.html.twig',
        [
            "form"=>$form ->createView()
        ]);
    }
}
