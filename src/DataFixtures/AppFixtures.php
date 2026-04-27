<?php

namespace App\DataFixtures;

use App\Entity\Liste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 500; $i++) {

            $liste = new Liste();

            $liste->setPrefecture($faker->city());
            $liste->setCentretatcivil($faker->citySuffix());
            $liste->setRegistre($faker->numberBetween(1, 500));
            $liste->setActe($faker->numberBetween(1, 9999));
            $liste->setDateActe($faker->dateTimeBetween('-10 years', 'now'));

            $liste->setNom($faker->lastName());
            $liste->setPrenom($faker->firstName());

            $liste->setDelivreA($faker->city());
            $liste->setDelivreLe($faker->dayOfMonth());
            $liste->setDelivreAn($faker->year());

            $liste->setNumSerie($faker->numberBetween(10000, 99999));

            $liste->setNaissanceJourMoi($faker->date('d/m'));
            $liste->setNaissanceAn($faker->year());
            $liste->setNaissanceHeure($faker->numberBetween(0, 23) . 'h');
            $liste->setNaissanceMinuite($faker->numberBetween(0, 59));

            $liste->setNaissanceNomPrenom($faker->name());
            $liste->setNaissanceLieu($faker->city());
            $liste->setNaissanceSexe($faker->randomElement(['Masculin', 'Féminin']));

            $liste->setPereNomPrenom($faker->name('male'));
            $liste->setPereDatenaisance($faker->date('d/m/Y'));
            $liste->setPereLieunaissance($faker->city());
            $liste->setPereProfession($faker->jobTitle());
            $liste->setPereVillederesidence($faker->city());

            $liste->setMereNomPrenom($faker->name('female'));
            $liste->setMereDatenaisance($faker->date('d/m/Y'));
            $liste->setMereLieunaissance($faker->city());
            $liste->setMereProfession($faker->jobTitle());
            $liste->setMereVillederesidenc($faker->city());

            $liste->setDeclarationFaitePar($faker->name());
            $liste->setDatejugement($faker->date('d/m/Y'));
            $liste->setDeclarationRecuePa($faker->name());

            // Champs techniques vides
            $liste->setEdit(null);
            $liste->setImprimer(null);
            $liste->setDelete(null);

            $manager->persist($liste);
        }

        $manager->flush();
    }
}
