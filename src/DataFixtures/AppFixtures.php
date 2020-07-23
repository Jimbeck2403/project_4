<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Performance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Création de fixtures artist
        for ($i = 1; $i <= 12; $i++) {
            $artist = new Artist();
            $artist->setName("Nom de l'Artiste")
                ->setDescription("Une bio rapide")
                ->setImage("http://palcehold.it/350X250");
            $manager->persist($artist);
        }



    //Création de fixtures shows
    for ($i = 1; $i <= 9; $i++) {
        $performance = new Performance();
        $performance->setName("Nom du spectacle")
            ->setDescription("Un rapide aperçu")
            ->setImage("http://palcehold.it/350X250")
            ->setShowedAt(new \DateTime());
        $manager->persist($performance);
    }
    $manager->flush();
}
}

