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
use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Swagger\Annotations as SWG;


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

    /**
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a president using his uuid",
     *     @Model(type=President::class)
     * )
     */
    public function getPresidentAction(President $president)
    {
        if($president === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($president);
    }

    /**
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a president geocoordinates",
     *     @Model(type=President::class)
     * )
     */
    public function getPresidentCoordinatesAction(President $president) {
        return $this->json($this->osmClient->getCooordinates($president->getCountry()));
    }

    /**
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a president laws",
     *     @Model(type=President::class)
     * )
     */
    public function getPresidentLawsAction(President $president) {
        return $this->json($president->getLaws());
    }

    /**
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a president law using his uuid",
     *     @Model(type=President::class)
     * )
     */
    public function getPresidentLawAction(President $president,Law $law) {
        return $this->json($law);
    }

    /**
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve all presidents",
     *     @Model(type=President::class)
     * )
     */
    public function getPresidentsAction()
    {
        return $this->json($this->em->getRepository(President::class)->findAll());
    }

    /**
     * @ParamConverter("president", converter="fos_rest.request_body")
     * @param President $president
     * @return Response
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Create a new president",
     *     @Model(type=President::class)
     * )
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
     * @SWG\Tag(name="President")
     * @SWG\Response(
     *     response=200,
     *     description="Create a new law for this president",
     *     @Model(type=President::class)
     * )
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