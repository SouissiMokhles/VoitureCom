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
        $marque->setDescription("BMW (ou Bayerische Motoren Werke en allemand, litt. « Manufacture bavaroise de moteurs »), est un constructeur allemand d'automobiles haut-de-gamme, sportives et luxueuses et de motos, après avoir été un grand constructeur de moteurs d'avions. L'entreprise a été fondée en 1916 par Gustav Otto et Karl Friedrich Rapp");
        $manager->persist($marque);
        $manager->flush();
    }
}
