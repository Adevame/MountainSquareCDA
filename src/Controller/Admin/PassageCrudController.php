<?php

namespace App\Controller\Admin;

use App\Entity\Passage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class PassageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Passage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('numero', 'Passage'),
            AssociationField::new('jour', 'Jour'),
            AssociationField::new('scene', 'Scene'),
            AssociationField::new('horaires', 'Date et Horaire'),
            AssociationField::new('performers', 'Artiste / groupe affecté(s)'),
        ];
    }
}
