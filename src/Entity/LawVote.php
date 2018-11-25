<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 25/11/2018
 * Time: 08:19
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class LawVote
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $uuid;

    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="Person",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="person_uuid", referencedColumnName="uuid")
     */
    private $person;

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person): void
    {
        $this->person = $person;
    }
}