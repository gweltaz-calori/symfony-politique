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
        $president->setImage("https://upload.wikimedia.org/wikipedia/commons/2/2e/Emmanuel_Macron_during_his_meeting_with_Vladimir_Putin%2C_June_2017_%28cropped%29.jpg");

        $party = new PoliticalParty();
        $party->setName("En marche");
        $party->setImage("https://storage.googleapis.com/en-marche-fr/E-MAILING/2017/images/REM/Logo-LREM-noir.jpg");
        $president->setPoliticalParty($party);

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Port d'armes autorisé");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Bob");
        $person->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Bob_hardy.jpg/220px-Bob_hardy.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Johny");
        $person->setImage("http://media.ufc.tv/fighter_images/Johny_Hendricks/HENDRICKS_JOHNY.png");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Tomy");
        $person->setImage("https://p4.storage.canalblog.com/48/66/950505/111796411_o.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Paul");
        $person->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/PaulWalkerEdit-1.jpg/220px-PaulWalkerEdit-1.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $president = new \App\Entity\President();
        $president->setName("Trump");
        $president->setCountry("United States");
        $president->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Donald_Trump_official_portrait.jpg/220px-Donald_Trump_official_portrait.jpg");

        $party = new PoliticalParty();
        $party->setName("Republicans");
        $party->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Republicanlogo.svg/2000px-Republicanlogo.svg.png");
        $president->setPoliticalParty($party);

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Mur du mexique");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Tom");
        $person->setImage("http://fr.web.img3.acsta.net/pictures/16/01/19/11/06/274206.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Sanders");
        $person->setImage("https://upload.wikimedia.org/wikipedia/en/thumb/5/52/MichaelKelsoFinale.jpg/225px-MichaelKelsoFinale.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);



        $president = new \App\Entity\President();
        $president->setName("Angela Merkel");
        $president->setCountry("Allemagne");
        $president->setImage("https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Angela_Merkel_June_2017.jpg/220px-Angela_Merkel_June_2017.jpg");


        $party = new PoliticalParty();
        $party->setName("Union chrétienne-démocrate d'Allemagne");
        $party->setImage("http://fracademic.com/pictures/frwiki/67/CDU_logo.svg");
        $president->setPoliticalParty($party);

        $manager->persist($president);

        $law = new \App\Entity\Law();
        $law->setDescription("Biere pour tous");
        $law->setCreatedBy($president);

        $manager->persist($law);
        $president->setLaws([$law]);

        $person = new \App\Entity\Person();
        $person->setName("Hanz");
        $person->setImage("https://images-na.ssl-images-amazon.com/images/I/71ItPiWGTQL.png");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Michael");
        $person->setImage("https://hiphopcorner.fr/wp-content/uploads/2018/05/130828123801-michael-jordan-iso-1998-all-star-game.video-player.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $person = new \App\Entity\Person();
        $person->setName("Pierre");
        $person->setImage("http://medias.lequipe.fr/img-photo-jpg/pierre-jackson-a-battu-son-record-en-carri-re/1500000000759021/33:41,1651:856-624-416-75/dfe7b.jpg");

        $manager->persist($person);

        $vote = new \App\Entity\LawVote();
        $vote->setPerson($person);

        $law->addVote($vote);

        $manager->persist($vote);

        $manager->flush();
    }
}
