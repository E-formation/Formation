<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    /**
     * @Route("/note", name="note")
     */
    public function index(): Response
    {
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }
    /**
     * @Route("/note/note.html", name="note_note")
     * @param Request $request
     * @return Reponse
     */
    public function note(Request $request): Response{
        return $this->render('note/note.html.twig');
        $note=new Note();
        $form= $this ->createForm (NoteType::class);
        return $this ->render('note/note.html.twig',
        [
            "form"=>$form ->createView()
        ]);
    }
}
