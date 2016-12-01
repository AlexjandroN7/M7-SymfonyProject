<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-11-22
 * Time: 20:32
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller
{

    /**
     * @Route (path="/database", name="app_database_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();


        $user1 = new Usuario();
        $user1->setEmail('user1@gmail.com')
              ->setUsername('user1')
              ->setPassword('1234')
            ;
        $m->persist($user1);

        $user2 = new Usuario();
        $user2->setEmail('user2@gmail.com')
              ->setUsername('user2')
              ->setPassword('1234')
        ;
        $m->persist($user2);

        $m->flush();

        return $this->render(':database:index.html.twig');
    }

}