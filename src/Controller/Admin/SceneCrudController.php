<?php

namespace App\Controller\Admin;

use App\Entity\Scene;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SceneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Scene::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('numero', 'Numéro'),
            // AssociationField::new('dateHoraire', 'Date et Horaire'),
            // AssociationField::new('performers', 'Artiste(s)'),
            // AssociationField::new('jourNumero', 'Jour'),
        ];
    }
}
