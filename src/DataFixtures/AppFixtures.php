<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher =$hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $userSuperAdmin = new User();
        $userSuperAdmin
            ->setFirstName($faker->firstName)
            ->setLastName($faker->lastName)
            ->setEmail($faker->email)
            ->setPassword($this->hasher->hashPassword($userSuperAdmin,'123456'))
            ->setRoles(['ROLE_SUPER_ADMIN'])
            ;
        $manager->persist($userSuperAdmin);


        for ($i = 0; $i < 10; $i++){
            $user = new User();
            $user
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setEmail($faker->email)
                ->setPassword($this->hasher->hashPassword($user,'123456'))
            ;
            $manager->persist($user);
        }
        $manager->flush();
    }
}
