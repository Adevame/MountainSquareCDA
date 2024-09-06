<?php

namespace App\Controller\Admin;

use App\Entity\Performer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PerformerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Performer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', "Nom de l'artiste / du groupe"),
            TextField::new('TypeMusique', 'Type de musique'),
            TextField::new('youtube', 'Lien vers la chaîne youtube')
        ];
    }
}
