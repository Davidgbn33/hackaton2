<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Location;
use App\Entity\Memory;
use App\Entity\Model;
use App\Entity\Network;
use App\Entity\RAM;
use App\Entity\Status;
use App\Entity\Telephone;
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
        1 => ['name' => 'LG',
            'image' => ''],
        2 => ['name' => 'Samsung',
            'image' => ''],
        3 => ['name' => 'Apple',
            'image' => ''],
        4 => ['name' => 'Huawei',
            'image' => ''],
        5 => ['name' => 'Xiaomi',
            'image' => ''],
        6 => ['name' => 'Sony',
            'image' => ''],
    ];

    public const STATUS = [
     1 => [
            'name' => 'HS',
            'price' => 0.5],
        2 => [
            'name' => 'REPARABLE',
            'price' => 0.5],
        3 => [
            'name' => 'BLOQUER',
            'price' => 0.9],
        4 => [
            'name' => 'RECONDITIONNABLE',
            'price' => 0.95],
        5=> [
            'name' => 'RECONDITIONNE',
            'price' => 1],
      6=> [
            'name' => 'COMME NEUF',
            'price' => 1.1],

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
      5 => ['name' => '128',
            'price' => 60],
        6 => ['name' => '512',
            'price' => 80],
    ];

    public const RAM = [
        
        1 => ['name' => '3',
            'price' => 30],
        2 => ['name' => '4',
            'price' => 40],
        3 => ['name' => '6',
            'price' => 50],
        4 => ['name' => '8',
            'price' => 60],
        5 => ['name' => '12',
            'price' => 70],
        6 => ['name' => '16',
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
            'price' => 100,
            'image' => 'public/images/phone/iphone11-300.png',
            'brand' => 3],
        2 => ['name' => 'Iphone 8',
            'price' => 50,
            'image' => 'public/images/phone/iphone8-300.png',
            'brand' => '3'],
        3 => ['name' => 'samsumg s10',
            'price' => 50,
            'image' => 'public/images/phone/s10-300.png',
            'brand' => '2'],
        4 => ['name' => 'samsumg s20',
            'price' => 60,
            'image' => 'public/images/phone/s20-300.png',
            'brand' => '2'],
        5 => ['name' => 'LG G8X',
            'price' => 50,
            'image' => 'public/images/phone/LG-G8X-300.png',
            'brand' => '1'],
        6 => ['name' => 'LG G8S',
            'price' => 60,
            'image' => 'public/images/phone/LG-G8S-300.png',
            'brand' => '1'],
        7 => ['name' => 'XIAOMI MI 10',
            'price' => 50,
            'image' => 'public/images/phone/XIAOMI-MI10-300.png',
            'brand' => '5'],
        8 => ['name' => 'XIAOMI 11T 5G',
            'price' => 60,
            'image' => 'public/images/phone/XIAOMI-11T-300.png',
            'brand' => '5'],
        9 => ['name' => 'Huawei P10',
            'price' => 30,
            'image' => 'public/images/phone/huawei-p10-300.png',
            'brand' => '4'],
        10 => ['name' => 'Huawei P30',
            'price' => 60,
            'image' => 'public/images/phone/Huawei-P30-300.png',
            'brand' => '4'],
        11 => ['name' => 'Sony Xperia 1',
            'price' => 30,
            'image' => 'public/images/phone/Sonny1-300.png',
            'brand' => '6'],
        12 => ['name' => 'Sony Xperia 5',
            'price' => 60,
            'image' => 'public/images/phone/Sonny5-300.png',
            'brand' => '6'],
    ];
    public const NETWORK = [
       
        1 => ['name' => '3G',
            'price' => 10],
        2 => ['name' => '4G',
            'price' => 15],
        3 => ['name' => '5G',
            'price' => 20],
    ];
    public const USER = [
        1 => [
            'email' => 'user@me.fr',
            'roles' => ['ROLE_USER'],
            'password' => '123456',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'isVerified' => true,
            'location' => 'Paris',
        ],

        2 => [
            'email' => 'admin@me.fr',
            'roles' => ['ROLE_ADMIN'],
            'password' => '123456',
            'firstName' => 'paul',
            'lastName' => 'Doe',
            'isVerified' => true,
            'location' => 'Paris',
        ],
    ];
  /*  public const TELEPHONE = [
        1=>['user'=> '1',
        'model'=> '1',
        'memory'=> '1',
        'ram'=> '1',
        'network'=> '1',
        'status'=> '1',
        'cableCharger'=> true,
        'estimatedPrice'=> '100',
    ]];*/

    public function load(ObjectManager $manager): void
    {

        $brands = [];
        foreach (self::BRAND as $keys => $value) {
            $brand = new BRAND();
            $brand->setName($value['name']);
            $brand->setImage($value['image']);
            $manager->persist($brand);

            $brands[] = $brand;
        }

        $status = [];
        foreach (self::STATUS as $keys => $value) {
            $status = new STATUS();
            $status->setName($value['name']);
            $status->setPrice($value['price']);
            $manager->persist($status);

            $conditions[] = $status;
        }
        $locations = [];
        foreach (self::LOCATION as $value) {
            $location = new LOCATION();
            $location->setCity($value);
            $manager->persist($location);

            $locations[] = $location;
        }
        $memories = [];
        foreach (self::MEMORY as $keys => $value) {
            $memory = new MEMORY();
            $memory->setName($value['name']);
            $memory->setPrice($value['price']);
            $manager->persist($memory);

            $memories[] = $memory;
        }
        $models = [];
        foreach (self::MODEL as $keys =>$value) {
            $model = new MODEL();
            $model->setName($value['name']);
            $model->setPrice($value['price']);
            $model->setImage($value['image']);
            $model->setBrand($brands[$value['brand']-1]);
            $manager->persist($model);

            $models[] = $model;
        }
        $networks = [];
        foreach (self::NETWORK as $keys => $value) {
            $network = new NETWORK();
            $network->setName($value['name']);
            $network->setPrice($value['price']);
            $manager->persist($network);

            $memories[] = $network;
        }
        $rams = [];
        foreach (self::RAM as $keys => $value) {
            $ram = new RAM();
            $ram->setName($value['name']);
            $ram->setPrice($value['price']);
            $manager->persist($ram);

            $rams[] = $ram;
        }

        $users = [];
        foreach (self::USER as $keys =>$value) {
            $user = new User();
            $user->setEmail($value['email']);
            $user->setRoles($value['roles']);
            $user->setPassword($this->hasher->hashPassword($user, '123456'));
            $user->setFirstName($value['firstName']);
            $user->setLastName($value['lastName']);
            $user->setIsVerified($value['isVerified']);
            $user->setLocation($location);
            $manager->persist($user);

            $users[] = $user;
        }
   /*     $telephones = [];
        foreach (self::TELEPHONE as $keys =>$value) {
            $telephone = new TELEPHONE();
            $telephone->setModel($model['model']);
            $telephone->setMemory($memory['memory']);
            $telephone->setNetwork($network['network']);
            $telephone->setRam($ram['ram']);
            $telephone->setStatus($status['status']);
            $telephone->setUser($user['user']);
            $telephone->setCableCharger($value['cableCharger']);
            $telephone->setEstimatedPrice($value['estimatedPrice']);
            $manager->persist($telephone);

            $telephones[] = $telephone;
        }*/

        $manager->flush();
    }
}

