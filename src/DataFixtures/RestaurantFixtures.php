<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 2; $i <= 10; $i++) {
            $restaurant = new Restaurant();
            $restaurant->setTitle("Restaurant $i");
            $restaurant->setSlug("Restaurant-$i");
            $restaurant->setImage("Restaurant-$i.jpg");
            $restaurant->setCreatedAt(new \DateTimeImmutable());
            $restaurant->setUpdatedAt(new \DateTimeImmutable());
            $restaurant->setActive(true);

            $manager->persist($restaurant);
    } 
    
    $manager->flush();
    }
}