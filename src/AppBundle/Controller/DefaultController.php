<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function IndexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route ("/prueba/{name}", name="app_default_name")
     */

    public function textAction($name) {

        return new Response('Hola puto! ' . $name);
    }

    /**
     * @Route ("/prueba/", name="app_default_pruebaVista")
     */

    public function pruebaVistaAction() {

        return $this->render(':default:vista1.html.twig',[
            'titulo' => '3',
            'resultado' => 'Torres el aprobao',

        ]);
    }
}
