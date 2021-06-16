<?php

namespace App\Controller\Admin;

use App\Entity\Appelation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AppelationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appelation::class;
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
