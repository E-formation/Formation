<?php

namespace App\Form;

use App\Entity\Emploidutemps;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmploidutempsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('salle_de_cours')
            ->add('code_matiere')
            ->add('nom_matiere')
            ->add('nombre_heure_cours')
            ->add('enseignant')
            ->add('etudiant')
            ->add('administrateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emploidutemps::class,
        ]);
    }
}
