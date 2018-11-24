<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 14:32
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
     * @ORM\OneToOne(targetEntity="Law")
     * @ORM\JoinColumn(name="law_uuid", referencedColumnName="uuid")
     */
    private $law;
    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_uuid", referencedColumnName="uuid")
     */
    private $person;

    /**
     * @return mixed
     */
    public function getLaw()
    {
        return $this->law;
    }

    /**
     * @param mixed $law
     */
    public function setLaw($law): void
    {
        $this->law = $law;
    }

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

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid($uuid): void
    {
        $this->uuid = $uuid;
    }

}