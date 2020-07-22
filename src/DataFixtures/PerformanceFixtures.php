<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Performance;

class PerformanceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 9; $i++){
            $performance = new Performance();
            $performance->setName('Name')
                        ->setImage('http://placehold.it/350x150')
                        ->setDescription('Le meilleur')
                        ->setShowedAt(new \DateTime());
            $manager->persist($performance);
        }

        $manager->flush();
    }
}
