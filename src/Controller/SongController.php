<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
// use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\Song;
use App\Entity\Type;
use App\Form\SongType;
use App\Entity\User;


class SongController extends FOSRestController
{
    /**
     * @Rest\Get(path="/songs", name="songs")
     * @Rest\View(statusCode = 200)
     */
    public function index()
    {
        $songs = $this->getDoctrine()->getRepository(Song::class)->findAll();

        return $this->view($songs);
    }

    /**
     * @Rest\Post(path="/newsong", name="new_song")
     * @Rest\View(statusCode = 201)
     */
    public function newsong(Request $request)
    {
        $dateupload = new \DateTime('now');
        $request->request->set('dateupload',$dateupload->format("Y-m-d"));
        $genre = $this->getDoctrine()->getRepository(Type::class)->find($request->request->get('idgenre'));        
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);        
        $data = $request->request->all();        
        $song = new Song();
        $song->setIdgenre($genre);
        $song->setIduser($user);
        $form = $this->get('form.factory')->create(SongType::class, $song);
        $form->submit($data);
        $em = $this->getDoctrine()->getManager();
        dump($song); //die();
        $em->persist($song);
        $em->flush();
        return $this->view($song, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get(path="/song/{id}", name="song", requirements = {"id"="\d+"})
     * 
     */
    public function song()
    {
        
    }

     /**
     * @Rest\Post(path="/newobjetsong", name="new_objet_song")
     * @Rest\View(statusCode = 201)
     * @ParamConverter("song", converter="fos_rest.request_body")
     */
    public function newobjetsong(Song $song)
    {
        $genre = $this->getDoctrine()->getRepository(Type::class)->find($song->getIdgenre()->getId());
        $song->setIdgenre($genre);
        // dump($song); die();
        $em = $this->getDoctrine()->getManager();
        $em->persist($song);
        $em->flush();

        // dump($type); die();
        return $this->view($song, Response::HTTP_CREATED);
    }

    // public function FunctionName(Request $request, $id)
    // {
    //    Route("/editNews/{id}", requirements={"id" = "\d+"}, name="admin_edit_news")
    //     $em = $this->getDoctrine()->getManager();

    //     $news = $em->getRepository('FootBallCoeurFootBundle:News')->find($id);

    //     $currentImg = $news->getImg();
    //     $user = $this->getUser();

    //     $form =  $this->createForm(new NewsType(), $news, array(
    //         'action' => $this->generateUrl('admin_edit_news',array("id" => $id)),
    //         'method' => 'POST',
    //     ));

    //     $form->handleRequest($request);

    //     if($form->isValid()){

    //         $file = $news->getImg();
    //         if($file) {
    //             $fileName = md5(uniqid()) . '.' . $file->guessExtension();
    //             $dir = $this->container->getParameter('kernel.root_dir') . '/../web/backEnd/images/news';
    //             $file->move($dir, $fileName);
    //             $urlFile = 'backEnd/images/news/'.$fileName;
    //             $news->setImg($urlFile);
    //         }else {
    //             $news->setImg($currentImg);
    //         }

    //         if(empty($news->getLink())){
    //             $link = str_replace(" ","-",trim($news->getlink()));
    //             $news->setLink($link);
    //         }

    //         $news->setUserupdate($user->getId());
    //         $news->setUpdatedate(new \DateTime());

    //         $link = $news->getLink();
    //         $link = str_replace ("------","-",$link);
    //         $link = str_replace ("-----","-",$link);
    //         $link = str_replace ("----","-",$link);
    //         $link = str_replace ("---","-",$link);
    //         $link = str_replace ("--","-",$link);
    //         $link = str_replace ("é","e",$link);
    //         $link = str_replace ("è","e",$link);
    //         $link = str_replace ("ê","e",$link);
    //         $link = str_replace ("à","a",$link);
    //         $link = str_replace ("ç","c",$link);
    //         $link = str_replace ("&","-",$link);
    //         $link = str_replace ("~","-",$link);
    //         $link = str_replace ("_","-",$link);
    //         $link = str_replace ("'","-",$link);
    //         $link = str_replace ('"',"-",$link);
    //         $link = str_replace (".","-",$link);
    //         $link = str_replace (":","-",$link);
    //         $link = str_replace (";","-",$link);
    //         $link = str_replace (",","-",$link);
    //         $link = str_replace ("(","-",$link);
    //         $link = str_replace (")","-",$link);
    //         $link = str_replace ("[","-",$link);
    //         $link = str_replace ("]","-",$link);
    //         $link = str_replace ("{","-",$link);
    //         $link = str_replace ("}","-",$link);
    //         $link = str_replace ("|","-",$link);
    //         $link = str_replace ("«","-",$link);
    //         $link = str_replace ("»","-",$link);
    //         $link = strtolower($link);
    //         $news->setLink($link);

    //         if($news->getUser() == null)
    //         {
    //             $news->setUser($user);
    //         }
    //         $em->flush();   
    // }
}
