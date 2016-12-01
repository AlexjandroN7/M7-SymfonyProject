<?php

namespace AppBundle\Controller;

use AppBundle\Service\Calculadora;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CalculadoraController extends Controller
{
    /**
     * @Route(path="/calculadora", name="app_calculator_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':calculadora:index.html.twig');
    }

    /**
     * @Route(path="/calculadora/sum", name="app_calculator_sum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sumAction()
    {

        return $this->render(':calculadora:form.html.twig',
            [
                'action' => 'app_calculator_doSum'
            ]
        );

    }

    /**
     * @Route(path="/calculadora/doSum", name="app_calculator_doSum")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doSumAction(Request $request)
    {
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculadora = $this->get('calculadora');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->sumar();
        $resultado = $calculadora->getResultado();

        return $this->render(':calculadora:resultado.html.twig',
            [
                'resultado' => $resultado,

                'op1' => $op1,
                'op2' => $op2,
                'operacion' => '+',
            ]
        );
    }

    /**
     * @Route (path="/calculadora/restar", name="app_calculator_rest")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function restAction()
    {
        return $this->render(':calculadora:form.html.twig',
            [
                'action' => 'app_calculator_doRest',

            ]
        );
    }

    /**
     * @Route (path="/calculadora/doRest", name="app_calculator_doRest")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doRestAction(Request $request)
    {
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculadora = $this->get('calculadora');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->restar();
        $resultado = $calculadora->getResultado();

        return $this->render(':calculadora:resultado.html.twig',
            [
                'resultado' => $resultado,

                'op1' => $op1,
                'op2' => $op2,
                'operacion' => '-',

            ]
        );
    }

    /**
     * @Route (path="/calculadora/multiplicar", name="app_calculator_mult")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function multAction()
    {
        return $this->render(':calculadora:form.html.twig',
            [

                'action' => 'app_calculator_doMult'
            ]);
    }

    /**
     * @Route (path="/calculadora/doMult", name="app_calculator_doMult")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doMultAction(Request $request)
    {
        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculadora = $this->get('calculadora');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->multiplicar();
        $resultado = $calculadora->getResultado();

        return $this->render(':calculadora:resultado.html.twig',
            [
                'resultado' => $resultado,

                'op1' => $op1,
                'op2' => $op2,
                'operacion' => '*',

            ]);
    }

    /**
     * @Route (
     *     path="/calculadora/div",
     *     name="app_calculator_div"
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function div()
    {
        return $this->render(':calculadora:form.html.twig',
            [
                'action' => 'app_calculator_doDiv'
            ]);
    }

    /**
     * @Route(
     *     path="/calculadora/doDiv",
     *     name="app_calculator_doDiv"
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doDiv(Request $request)
    {

        $op1 = $request->request->get('op1');
        $op2 = $request->request->get('op2');
        $calculadora = $this->get('calculadora');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->dividir();
        $resultado = $calculadora->getResultado();

        return $this->render(':calculadora:resultado.html.twig',
            [
                'resultado' => $resultado,
                'op1' => $op1,
                'op2' => $op2,
                'operacion' => '/',
            ]
        );
    }
}
