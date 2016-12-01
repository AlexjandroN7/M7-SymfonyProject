<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-10-28
 * Time: 17:27
 */

namespace AppBundle\Service;


class Calculadora
{
    /**
     * @var int
     */
    private $op1;
    /**
     * @var int
     */
    private $op2;
    /**
     * @var int
     */
    private $resultado;


    public function __construct($op1 = null,$op2 = null)
    {
        $this
            ->setOp1($op1)
            ->setOp2($op2)

        ;
    }

    public function getOp1() {

        return $this->op1;
    }

    public function getOp2() {

        return $this->op2;
    }
    public function getResultado() {

        return $this->resultado;
    }

    public function setOp1($op1) {

        $this->op1 = (int) $op1;
        return $this;
    }

    public function setOp2($op2) {

        $this->op2 = (int) $op2;
        return $this;
    }
    public function setResultado($res) {

        $this->resultado = (int) $res;
        return $this;
    }

    public function sumar(){

        $this->setResultado($this->getOp1() + $this->getOp2());
    }

    public function restar() {

        $this->setResultado($this->getOp1() - $this->getOp2());
    }

    public function multiplicar() {

        $this->setResultado($this->getOp1() * $this->getOp2());
    }

    public function dividir() {

        $this->setResultado($this->getOp1() / $this->getOp2());
    }

    public function __toString()
    {
       return "el resultado es: " . $this->getResultado();
    }
}