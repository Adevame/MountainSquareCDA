<?php

namespace App\DataFixtures;

use App\Entity\Formule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1 ; $i <5; $i++){
            $formule = new Formule();
        $formule->setNom('formule :'.$i)
            ->setDescription('description :'.$i)
            ->setTarif($i);

            $manager->persist($formule);
        }

        $manager->flush();
    }
}
