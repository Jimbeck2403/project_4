<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setPassword($this->passwordEncoder->encodePassword($user, 'the_new_password'));


        // Création d’un utilisateur de type “user”
        $subscriber = new User();
        $subscriber->setEmail('user@user.com');
        $subscriber->setRoles(['ROLE_USER']);
        $subscriber->setPassword($this->passwordEncoder->encodePassword($subscriber, 'subscriberpassword'));

        $manager->persist($subscriber);

        // Création d’un utilisateur de type “admin”
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'adminpassword'));

        $manager->persist($admin);

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();

    }
}