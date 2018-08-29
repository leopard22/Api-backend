<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
// use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\Type;
use App\Form\TypeType;



class TypeController extends FOSRestController
{
    /**
     * @Rest\Get(path="/type", name="type")
     * @Rest\View
     */
    public function index()
    {

    }

    /**
     * @Rest\Post(path="/type/new", name="new_type")
     * @Rest\View(StatusCode=201)
     */
    public function newType(Request $request){

        dump($request);
    }

     /**
     * @Rest\Post(path="/type/objet/new", name="new_objet_type")
     * @ParamConverter("type", converter="fos_rest.request_body")
     * @Rest\View(StatusCode=201)
     */
    public function newObjetType(Type $type){

        $em = $this->getDoctrine()->getManager();
        $em->persist($type);
        $em->flush();

        // dump($type); die();
        return $this->view($type, Response::HTTP_CREATED);
    }


}
