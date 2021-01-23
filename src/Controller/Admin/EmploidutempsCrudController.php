<?php

namespace App\Controller\Admin;

use App\Entity\Emploidutemps;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmploidutempsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emploidutemps::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
