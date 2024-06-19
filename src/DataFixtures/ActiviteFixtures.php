<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActiviteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 2; $i <= 10; $i++) {
            $activite = new Activite();
            $activite->setTitle("Activite $i");
            $activite->setSlug("Activite-$i");
            $activite->setImage("Activite-$i.jpg");
            $activite->setCreatedAt(new \DateTimeImmutable());
            $activite->setUpdatedAt(new \DateTimeImmutable());
            $activite->setActive(true);

            $manager->persist($activite);
    } 
    
    $manager->flush();
    }
}