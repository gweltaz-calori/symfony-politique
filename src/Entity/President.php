<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class President {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="PoliticalParty")
     * @ORM\JoinColumn(name="political_party_uuid", referencedColumnName="uuid")
     */
    private $politicalParty;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Law", mappedBy="votedBy")
     */
    private $laws;

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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPoliticalParty()
    {
        return $this->politicalParty;
    }

    /**
     * @param mixed $politicalParty
     */
    public function setPoliticalParty($politicalParty): void
    {
        $this->politicalParty = $politicalParty;
    }

    /**
     * @return mixed
     */
    public function getLaws()
    {
        return $this->laws;
    }

    /**
     * @param mixed $laws
     */
    public function setLaws($laws): void
    {
        $this->laws = $laws;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

}
