<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-11-15
 * Time: 20:46
 */

namespace AppBundle\Controller;
use AppBundle\Service\CalculadoraRacional;
use AppBundle\Service\Racional;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RacionalController extends Controller
{
    /**
     * @Route(path="/racionales", name="app_rational_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':racionales:index.html.twig');
    }

    /**
     * @Route (path="/racionales/multiplicar", name="app_rational_mult")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function multAction()
    {
        return $this->render(':racionales:form.html.twig',
            [

                'action' => 'app_rational_doMult'
            ]);
    }

    /**
     * @Route (path="/racionales/doMult", name="app_rational_doMult")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doMultAction(Request $request)
    {
        $n1 = $request->request->get('n1');
        $d1 = $request->request->get('d1');
        $n2 = $request->request->get('n2');
        $d2 = $request->request->get('d2');
        $r1 = $this->get('racional');
        $r1->setNumerador($n1);
        $r1->setDenominador($d1);
        $r2 = $this->get('racional');
        $r2->setNumerador($n2);
        $r2->setDenominador($d2);
        $calculadora = $this->get('calculadora_r');
        $calculadora->setOp1($r1);
        $calculadora->setOp2($r2);
        $calculadora->multiply();
        $resultado = $calculadora->getResultado();

        return $this->render(':racionales:resultado.html.twig',
            [
                'resultado'       => $resultado,

                'r1'            => $r1,
                'r2'            => $r2,
                'operacion'      => '*',

            ]);
    }

    /**
     * @Route (
     *     path="/racionales/div",
     *     name="app_rational_div"
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function div()
    {
        return $this->render(':racionales:form.html.twig',
            [
                'action'    => 'app_rational_doDiv'
            ]);
    }

    /**
     * @Route(
     *     path="/racionales/doDiv",
     *     name="app_rational_doDiv"
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doDiv(Request $request){

        $n1 = $request->request->get('n1');
        $d1 = $request->request->get('d1');
        $n2 = $request->request->get('n2');
        $d2 = $request->request->get('d2');
        $r1 = $this->get('racional');
        $r1->setNumerador($n1);
        $r1->setDenominador($d1);
        $r2 = $this->get('racional');
        $r2->setNumerador($n2);
        $r2->setDenominador($d2);
        $calculadora = $this->get('calculadora_r');
        $calculadora->setOp1($r1);
        $calculadora->setOp2($r2);
        $calculadora->divide();
        $resultado = $calculadora->getResultado();

        return $this->render(':racionales:resultado.html.twig',
            [
                'resultado'     => $resultado,
                'r1'           => $r1,
                'r2'           => $r2,
                'operacion'     => '/',
            ]
        );
    }
}
