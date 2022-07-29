<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Marques;
use App\Entity\Models;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $marque=new Marques();
        $marque->setNom("BMW");
        $marque->setDescription('test');
        $manager->persist($marque);
        $manager->flush();
    }
}
