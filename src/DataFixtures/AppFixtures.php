<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Location;
use App\Entity\Memory;
use App\Entity\Model;
use App\Entity\Status;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public const BRAND = [
        1 => ['name'=>'LG',
            'image'=>'' ],
        2 => ['name'=>'Samsung',
            'image'=>'' ],
        3 => ['name'=>'Apple',
            'image'=>'' ],
        4 => ['name'=>'Huawei',
            'image'=>'' ],
        5 => ['name'=>'Xiaomi',
            'image'=>'' ],
        6 => ['name'=>'Sony',
            'image'=>'' ],
    ];

    public const CONDITION = [
        1 => [
            'name' => 'HS',
            'price' => 100
        ],
        2 => [
            'name' => 'REPARABLE',
            'price' => 50],
        3 => [
            'name' => 'BLOQUER',
            'price' => 10],
        4 => [
            'name' => 'RECONDITIONNABLE',
            'price' => 5],
        5 => [
            'name' => 'RECONDITIONNE',
            'price' => 0],
    ];

    public const MEMORY = [
        1 => ['name' => '16',
            'price' => 31],
        2 => ['name' => '32',
            'price' => 45],
        3 => ['name' => '64',
            'price' => 60],
        4 => ['name' => '128',
            'price' => 80],
        5 => ['name' => '256',
            'price' => 100],
    ];

    public const RAM = [
        1 => ['name' => '1',
            'price' => 10],
        2 => ['name' => '2',
            'price' => 20],
        3 => ['name' => '3',
            'price' => 30],
        4 => ['name' => '4',
            'price' => 40],
        5 => ['name' => '6',
            'price' => 50],
        6 => ['name' => '8',
            'price' => 60],
        7 => ['name' => '12',
            'price' => 70],
        8 => ['name' => '16',
            'price' => 80],
    ];

    public const LOCATION = [
        'Paris',
        'Lyon',
        'Marseille',
        'Bordeaux',
        'Lille',
    ];

    public const MODEL = [
        1 => ['name' => 'Iphone 11',
            'price' => 100],
        2 => ['name' => 'Iphone 8',
            'price' => 50],
        3 => ['name' => 'samsumg s10',
            'price' => 50],
        4 => ['name' => 'samsumg s20',
            'price' => 60],
        5 => ['name' => 'LG G8X',
            'price' => 50],
        6 => ['name' => 'LG G8S',
            'price' => 60],
        7 => ['name' => 'XIAOMI MI 10',
            'price' => 50],
        8 => ['name' => 'XIAOMI 11T 5G',
            'price' => 60],
        9 => ['name' => 'Huawei P10',
            'price' => 30],
        10 => ['name' => 'Huawei P30',
            'price' => 60],
        11 => ['name' => 'Sony Xperia 1',
            'price' => 30],
        12 => ['name' => 'Sony Xperia 5',
            'price' => 60],
    ];
    public const NETWORK = [
        1 => ['name' => '2G',
            'price' => 5],
        2 => ['name' => '3G',
            'price' => 10],
        3 => ['name' => '4G',
            'price' => 15],
        4 => ['name' => '5G',
            'price' => 20],
    ];
    public const USER = [
        1 => [
            'email' => 'user@me.fr',
            'roles' => ['ROLE_USER'],
            'password' => '123456',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'isVerified' => true],
        2 => [
            'email' => 'admin@me.fr',
            'roles' => ['ROLE_ADMIN'],
            'password' => '123456',
            'firstName' => 'paul',
            'lastName' => 'Doe',
            'isVerified' => true],
    ];

    public function load(ObjectManager $manager): void
    {

        $brands = [];
        foreach (self::BRAND as $value) {
            $brand = new BRAND();
            $brand->setName($value);
            $brand->setImage($value);
            $manager->persist($brand);

            $brands[] = $brand;
        }

        $conditions = [];
        foreach (self::CONDITION as $value) {
            $condition = new STATUS();
            $condition->setName($value);
            $manager->persist($condition);

            $conditions[] = $condition;
        }
        $locations = [];
        foreach (self::LOCATION as $value) {
            $location = new LOCATION();
            $location->setCity($value);
            $manager->persist($location);

            $locations[] = $location;
        }
        $memories = [];
        foreach (self::MEMORY as $value) {
            $memory = new MEMORY();
            $memory->setName($value);
            $memory->setPrice($value);
            $manager->persist($memory);

            $memories[] = $memory;
        }
        $models = [];
        foreach (self::MODEL as $value) {
            $model = new MODEL();
            $model->setName($value);
            $model->setPrice($value);
            $manager->persist($model);

            $models[] = $model;
        }
        $manager->flush();
    }
}

