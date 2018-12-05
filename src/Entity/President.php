<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 */
class President implements \JsonSerializable {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $country;

    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="PoliticalParty",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="political_party_uuid", referencedColumnName="uuid")
     * @Assert\NotNull()
     */
    private $politicalParty;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Law", mappedBy="createdBy",cascade={"persist", "remove"})
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

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "uuid" => $this->uuid,
            "name" => $this->name,
            "country" => $this->country,
            "laws" => $this->laws,
            "party" => $this->politicalParty
        ];
    }
}
