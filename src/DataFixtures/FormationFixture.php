<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use App\Entity\Formations;
use App\Entity\ObjectifFormation;
use App\Entity\ProgrammeFormation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FormationFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generator = Factory::create('fr_FR');

        $categories = $manager->getRepository(Category::class)->findAll();
        for ($index = 1; $index <= 10; $index++) {
            $category = $categories[array_rand($categories)];
            $shortText = $generator->sentence($nbWords = 10, $variableNbWords = true) . $index;
            //$city = $generator->city;
            $date = $generator->dateTime();
            $formation = (new Formations())
                ->setTitle($shortText)
                ->setPrice("sur devis")
                ->setForWho($shortText)
                ->setPrerequisite($shortText)
                ->setDateFormation("A définir")
                ->setSlug($generator->slug(3))
                ->setDurationFormation("24h")
                ->setLocation($generator->city())
                ->setCategory($category)
                ->setEvaluation($shortText)
                ->setPublicAccesAndCondition($shortText)
                ->setIntervenant($shortText)
                ->setIntervenant($shortText);
            for ($i = 0; $i < 4; $i++) {
                $formation->addObjectifFormation((new ObjectifFormation())
                    ->setTitle($shortText)->setContent($shortText));
                $formation->addProgrammeFormation((new ProgrammeFormation())
                    ->setTitle($shortText)->setContent($shortText));
            }
            $manager->persist($formation);
        }
        $manager->flush();
    }
}
