<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 14:11
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Law implements \JsonSerializable
{
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
    private $description;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="President", inversedBy="laws",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="president_uuid", referencedColumnName="uuid")
     */
    private $createdBy;

    private $votes;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy): void
    {
        $this->createdBy = $createdBy;
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
         "description" => $this->description,
       ];
    }
}