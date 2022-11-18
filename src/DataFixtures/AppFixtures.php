<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Dishes;
// use FakerRestaurant\Provider\en;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use FakerRestaurant\Provider\en_US\Restaurant;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $faker->addProvider(new Restaurant($faker));

        for ($i = 0; $i <= 30; $i++) {
            $Dishes = new Dishes();

            $Dishes->setName($faker->foodName());

            $Dishes->setIngredients(join(" ; ", $faker->words()));

            $Dishes->setDescription($faker->sentence());

            $Dishes->setPrice($faker->randomFloat(2));

            $Dishes->setCoverImage($faker->imageUrl(640, 480, 'animals', true));

            $manager->persist($Dishes);
        }

        $manager->flush();
    }
}