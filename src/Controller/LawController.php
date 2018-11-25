<?php
/**
 * Created by PhpStorm.
 * User: gweltaz
 * Date: 24/11/2018
 * Time: 15:18
 */

namespace App\Controller;


use App\Entity\Law;
use App\Entity\LawVote;
use App\Entity\President;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Swagger\Annotations as SWG;

class LawController extends FOSRestController
{
    private $em;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $this->em = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @SWG\Tag(name="Law")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a law using his uuid",
     *     @Model(type=Law::class)
     * )
     */
    public function getLawAction(Law $law)
    {
        if($law === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($law);
    }

    /**
     * @SWG\Tag(name="Law")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve all laws",
     *     @Model(type=Law::class)
     * )
     */
    public function getLawsAction()
    {
        return $this->json($this->em->getRepository(Law::class)->findAll());
    }

    /**
     * @SWG\Tag(name="Law")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve all votes for this law",
     *     @Model(type=Law::class)
     * )
     */
    public function getLawsVotesAction(Law $law) {
        if($law === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($law->getVotes());
    }

    /**
     * @ParamConverter("vote", converter="fos_rest.request_body")
     * @param LawVote $vote
     * @return Response
     * @SWG\Tag(name="Law")
     * @SWG\Response(
     *     response=200,
     *     description="Create a new vote for this law",
     *     @Model(type=Law::class)
     * )
     */
    public function postLawsVotesAction(Law $law,LawVote $vote) {
        $votes = $law->getVotes();

        $errors = $this->validator->validate($law);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString,Response::HTTP_BAD_REQUEST);
        }

        $votes[] = $vote;

        $law->setVotes($votes);

        $this->em->persist($law);
        $this->em->flush();

        return new Response("Created",Response::HTTP_CREATED);
    }

}