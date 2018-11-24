<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $president = new \App\Entity\President();
        $president->setName("Macron");
        $president->setCountry("France");

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Port d'armes autorisé");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Bob");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setLaw($law);
        $vote->setPerson($person);

        $manager->persist($vote);

        $manager->flush();
    }
}
