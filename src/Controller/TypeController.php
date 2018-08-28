<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Type;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="type")
     */
    public function index()
    {


        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TypeController.php',
        ]);
    }
}
