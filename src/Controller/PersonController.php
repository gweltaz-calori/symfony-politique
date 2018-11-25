<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 15:18
 */

namespace App\Controller;


use App\Entity\Law;
use App\Entity\Person;
use App\Entity\President;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PersonController extends FOSRestController
{
    private $em;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $this->em = $entityManager;
        $this->validator = $validator;
    }

    public function getPersonAction(Person $person)
    {
        if($person === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($person);
    }

    /**
     * @ParamConverter("person", converter="fos_rest.request_body")
     * @param Person $person
     * @return Response
     */
    public function postPersonAction(Person $person) {
        if($person === null) {
            return new Response("Bad Request",Response::HTTP_BAD_REQUEST);
        }

        $errors = $this->validator->validate($person);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString,Response::HTTP_BAD_REQUEST);
        }

        $this->em->persist($person);
        $this->em->flush();

        return new Response("Created",Response::HTTP_CREATED);
    }

    public function getPersonsAction()
    {
        return $this->json($this->em->getRepository(Person::class)->findAll());
    }

}