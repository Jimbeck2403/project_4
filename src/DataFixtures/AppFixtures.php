<?php

namespace App\DataFixtures;


use App\Entity\Artist;
use App\Entity\Category;
use App\Entity\Performance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        //Création des 3 Catégories Fake pour les spectacles et les artistes
       for($i = 1; $i <= 3; $i++){
           $category = new Category();
           $category->setName($faker->word());

           $manager->persist($category);

           //Création de 12 Artistes Fake
           for ($j = 1; $j <= 4; $j++) {
               $artist = new Artist();

               $artist->setName($faker->name())
                      ->setDescription($faker->text())
                      ->setImage($faker->imageUrl())
                      ->setCategoryId($category);
               $manager->persist($artist);

               //Création de fixtures shows
               for ($k = 1; $k <= 3; $k++) {
                   $performance = new Performance();

                   $performance->setName($faker->word())
                               ->setDescription($faker->text())
                               ->setImage($faker->imageUrl)
                               ->setShowedAt($faker->dateTimeBetween('now', '+2 years'))
                               ->setCategoryId($category);
                   $manager->persist($performance);

       }

        }

    }
    $manager->flush();
}
}

