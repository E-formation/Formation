<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
    /**
     * @Route("/etudiant/etudiant", name="etudiant_etudiant")
     * @param Request $request
     * @return Reponse
     */
    public function etudiant(Request $request): Response{
        return $this->render('etudiant/etudiant.html.twig');
        $etudiant=new Etudiant();
        $form= $this ->createForm (EtudiantType::class);
        return $this ->render('etudiant/etudiant.html.twig',
        [
            "form"=>$form ->createView()
        ]);
    }
}