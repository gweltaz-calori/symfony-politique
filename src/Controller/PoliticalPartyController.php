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
use App\Entity\PoliticalParty;
use App\Entity\President;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Swagger\Annotations as SWG;

class PoliticalPartyController extends FOSRestController
{
    private $em;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager,ValidatorInterface $validator)
    {
        $this->em = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @SWG\Tag(name="Party")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve a party using his uuid",
     *     @Model(type=PoliticalParty::class)
     * )
     */
    public function getPartyAction(PoliticalParty $party)
    {
        if($party === null) {
            return new Response("Not Found",Response::HTTP_NOT_FOUND);
        }
        return $this->json($party);
    }

    /**
     * @SWG\Tag(name="Party")
     * @SWG\Response(
     *     response=200,
     *     description="Retrieve all party",
     *     @Model(type=PoliticalParty::class)
     * )
     */
    public function getPartiesAction(Request $request)
    {
        return $this->json($this->em->getRepository(PoliticalParty::class)->findAll());
    }


}