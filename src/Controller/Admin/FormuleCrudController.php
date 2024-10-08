<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom Formule'),
            IntegerField::new('tarif', 'Tarif'),
            TextField::new('description', 'Description')
        ];
    }
}
