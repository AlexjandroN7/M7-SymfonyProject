<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-11-15
 * Time: 20:41
 */

namespace AppBundle\Service;


class CalculadoraRacional
{

    /**
     * @var Racional
     */
    private $op1;

    /**
     * @var Racional
     */
    private $op2;

    /**
     * @var Racional
     */
    private $resultado;

    public function __construct(Racional $r1 = null, Racional $r2 = null)
    {

        $this->op1 = $r1;
        $this->op2 = $r2;
        ;
    }


    /**
     * @return Racional
     */

    public function getOp1()
    {
        return $this->op1;
    }
    /**
     * @return Racional
     */

    public function getOp2()
    {
        return $this->op2;
    }
    /**
     * @return Racional
     */

    public function getResultado()
    {
        return $this->resultado;
    }
    /**
     * @param Racional $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = $op1;
    }

    /**
     * @param Racional $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = $op2;
    }

    /**
     * @param Racional $r
     */
    public function setResultado(Racional $r)
    {
        $this->resultado = $r;
    }


    public function multiply()
    {
        $this->setResultado($this->op1->multiplicar($this->op2));
    }

    public function divide()
    {
        $this->setResultado($this->op1->dividir($this->op2));
    }
}
