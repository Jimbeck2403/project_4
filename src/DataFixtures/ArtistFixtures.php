<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for($i = 1; $i <= 9; $i++){
           $artist = new Artist();
           $artist->setName('Name')
                  ->setImage('http://placehold.it/350x150')
                  ->setDescription('Le meilleur');
           $manager->persist($artist);
       }
        $manager->flush();
    }
}
