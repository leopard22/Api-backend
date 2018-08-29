<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Type;
use App\Form\TypeType;
use Symfony\Component\HttpFoundation\Response; 
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="type")
     */
    public function index()
    {

        $genre = new Type();

        $genre->setTypename("rnb");

        $data = $this->get('jms_serializer')->serialize($genre,'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/type/new", name="new_type")
     */
    public function newType(Request $request){


    }


}
