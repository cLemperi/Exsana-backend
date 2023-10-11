<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
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
                            "AdminUser"
                        )
                    );
                    $user->setSex('Mr');
                    $user->setfirstName('PrénomAdmin');
                    $user->setlastName('AdminLastname');
                    $user->setEmail('AdminEmail@Adminemail.com');
                    $user->setJob('infirmier');
                    $user->setPhone('0613975721');
                    $user->setRppsCode('H2G243');
                    $user->setPostalCode('14310');
                    $user->setCity('Villy-Bocage');
                    $user->setStreet('47 route de bayeux');
                    $user->setProfil('Soignant');
                    $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        $manager->flush();
    }
}
