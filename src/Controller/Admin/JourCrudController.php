<?php

namespace App\Controller\Admin;

use App\Entity\Jour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class JourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Jour::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return
            [
                IntegerField::new('numero', 'Numéro'),
                AssociationField::new('scene', 'Scène'),
            ];
    }
}
