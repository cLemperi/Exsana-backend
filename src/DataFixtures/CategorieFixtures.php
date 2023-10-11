<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generator = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 7; $i++) {
            $rand_number = rand(1, 2);
            $shortText = $generator->sentence($rand_number, $variableNbWords = true);
            $manager->persist(
                (new Category())
                ->setTitle($shortText)
                ->setDescription($generator->paragraph())
            );
        }

        $manager->flush();
    }
}
