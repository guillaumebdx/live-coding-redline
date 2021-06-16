<?php

namespace App\Controller\Admin;

use App\Entity\Castle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CastleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Castle::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            'name',
            'image',
            AssociationField::new('appelation')
        ];
    }

}
