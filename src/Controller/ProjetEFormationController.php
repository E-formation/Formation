<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetEFormationController extends AbstractController
{
    function bonjour(){
        return new Response("bonjour tout le monde");
		
    }
    function Accueil(){
        return $this->render('projet_e_formation/Accueil.html.twig');
		
    }
}
