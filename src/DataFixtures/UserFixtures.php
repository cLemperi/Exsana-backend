<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface)
    {
    }

    public function load(ObjectManager $manager): void
    {
            $user = new User();
                    $user->setPassword(
                        $this->userPasswordHasherInterface->hashPassword(
                            $user,
                            "DemoUser"
                        )
                    );
                    $user->setSex('Mr');
                    $user->setfirstName('PrénomUser');
                    $user->setlastName('UserLastname');
                    $user->setEmail('UserEmail@UserEmail.com');
                    $user->setJob('infirmier');
                    $user->setPhone('0613975721');
                    $user->setRppsCode('H2G243');
                    $user->setPostalCode('14310');
                    $user->setCity('Villy-Bocage');
                    $user->setStreet('47 route de bayeux');
                    $user->setProfil('Soignant');
                    $user->getRoles();



        $manager->persist($user);

        $manager->flush();
    }
}
