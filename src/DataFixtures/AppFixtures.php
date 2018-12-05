<?php

namespace App\DataFixtures;

use App\Entity\PoliticalParty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $president = new \App\Entity\President();
        $president->setName("Macron");
        $president->setCountry("France");

        $party = new PoliticalParty();
        $party->setName("En marche");
        $president->setPoliticalParty($party);

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
        $vote->setPerson($person);

        $law->setVotes([$vote]);

        $manager->persist($vote);

        $president = new \App\Entity\President();
        $president->setName("Trump");
        $president->setCountry("UnitedStates");

        $party = new PoliticalParty();
        $party->setName("Republicans");
        $president->setPoliticalParty($party);

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Mur du mexique");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Tom");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->setVotes([$vote]);

        $manager->persist($vote);

        $president = new \App\Entity\President();
        $president->setName("Angela Merkel");
        $president->setCountry("Allemagne");

        $party = new PoliticalParty();
        $party->setName("Union chrétienne-démocrate d'Allemagne");
        $president->setPoliticalParty($party);

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Biere pour tous");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Hanz");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->setVotes([$vote]);

        $manager->persist($vote);

        $manager->flush();
    }
}
