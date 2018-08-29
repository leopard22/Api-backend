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
     * @Rest\View(StatusCode=200)
     */
    public function index()
    {
        return $this->view($this->getDoctrine()->getRepository(Type::class)->findAll());
    }

    /**
     * @Rest\Post(path="/type/new", name="new_type")
     * @Rest\View(StatusCode=201)
     */
    public function newType(Request $request){

        $data = $request->request->all();
        $genre = new Type();
        $form = $this->get('form.factory')->create(TypeType::class, $genre);
        $form->submit($data);
        $em = $this->getDoctrine()->getManager();

        $em->persist($genre);
        $em->flush();
        return $this->view($genre, Response::HTTP_CREATED);
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
