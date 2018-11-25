<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 15:18
 */

namespace App\Controller;


use App\Entity\Law;
use App\Entity\President;
use App\Services\OpenStreetMapClient;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PresidentController extends FOSRestController
{
    private $em;
    private $validator;
    private $osmClient;

    public function __construct(EntityManagerInterface $entityManager,ValidatorInterface $validator,OpenStreetMapClient $openStreetMapClient)
    {
        $this->em = $entityManager;
        $this->validator = $validator;
        $this->osmClient = $openStreetMapClient;
    }

    public function getPresidentAction(President $president)
    {
        if($president === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($president);
    }

    public function getPresidentCoordinatesAction(President $president) {
        return $this->json($this->osmClient->getCooordinates($president->getCountry()));
    }

    public function getPresidentLawsAction(President $president) {
        return $this->json($president->getLaws());
    }

    public function getPresidentLawAction(President $president,Law $law) {
        return $this->json($law);
    }

    public function getPresidentsAction()
    {
        return $this->json($this->em->getRepository(President::class)->findAll());
    }

    /**
     * @ParamConverter("president", converter="fos_rest.request_body")
     * @param President $president
     * @return Response
     */
    public function postPresidentAction(President $president)
    {
        if($president === null) {
            return new Response("Bad Request",Response::HTTP_BAD_REQUEST);
        }

        $errors = $this->validator->validate($president);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString,Response::HTTP_BAD_REQUEST);
        }

        $this->em->persist($president);
        $this->em->flush();

        return new Response("Created",Response::HTTP_CREATED);

    }

    /**
     * @ParamConverter("law", converter="fos_rest.request_body")
     * @param Law $law
     * @return Response
     */
    public function postPresidentsLawAction(President $president, Law $law) {

        $laws = $president->getLaws();

        $errors = $this->validator->validate($law);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString,Response::HTTP_BAD_REQUEST);
        }

        $law->setCreatedBy($president);

        $laws[] = $law;

        $president->setLaws($laws);

        $this->em->persist($president);
        $this->em->flush();

        return new Response("Created",Response::HTTP_CREATED);
    }
}