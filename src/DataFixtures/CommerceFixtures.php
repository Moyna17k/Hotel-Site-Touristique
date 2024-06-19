<?php

namespace App\DataFixtures;

use App\Entity\Commerce;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CommerceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 2; $i <= 10; $i++) {
            $commerce = new Commerce();
            $commerce->setTitle("Commerce $i");
            $commerce->setSlug("Commerce-$i");
            $commerce->setImage("Commerce-$i.jpg");
            $commerce->setCreatedAt(new \DateTimeImmutable());
            $commerce->setUpdatedAt(new \DateTimeImmutable());
            $commerce->setActive(true);

            $manager->persist($commerce);
    } 
    
    $manager->flush();
    }
}