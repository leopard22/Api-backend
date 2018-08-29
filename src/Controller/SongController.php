<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
// use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\Song;
use App\Form\SongType;
use App\Entity\User;


class SongController extends FOSRestController
{
    /**
     * @Rest\Get(path="/songs", name="songs")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SongController.php',
        ]);
    }

    /**
     * @Rest\Post(path="/newsong", name="new_song")
     * @Rest\View(statusCode = 201)
     */
    public function newsong()
    {
        
    }

    /**
     * @Rest\Get(path="/song/{id}", name="song", requirements = {"id"="\d+"})
     * 
     */
    public function song()
    {
        
    }
}
