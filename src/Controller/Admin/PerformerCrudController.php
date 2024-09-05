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
            TextField::new('nom'),
            TextField::new('TypeMusique'),
            TextField::new('youtube')
        ];
    }
}
