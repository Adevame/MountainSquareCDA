<?php

namespace App\Controller\Admin;

use App\Entity\DateHoraire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class DateHoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DateHoraire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('time')->setFormat('short', 'short')
                ->setFormTypeOptions([
                    'widget' => 'single_text',
                    'html5'  => true,
                ])
        ];
    }
}
