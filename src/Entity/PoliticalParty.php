<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 14:10
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 */
class PoliticalParty implements \JsonSerializable
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="string")
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $name;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "name" => $this->name,
            "uuid" => $this->uuid,
            "image" => $this->image
        ];
    }
}