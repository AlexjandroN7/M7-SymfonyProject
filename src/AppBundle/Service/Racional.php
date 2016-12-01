<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-11-15
 * Time: 20:10
 */

namespace AppBundle\Service;


class Racional
{


    private $numerador;
    private $denominador;




    public function __construct($numerador = null,$denominador = null)
    {

        $this->numerador = $numerador;
        $this->denominador = $denominador;
            ;
    }

    /**
     * @return mixed
     */
    public function getDenominador()
    {
        return $this->denominador;
    }

    /**
     * @param mixed $denominador
     */
    public function setDenominador($denominador)
    {
        if($denominador === 0) {

            return 'error!';
            die;
        }
        $this->denominador = $denominador;
    }

    /**
     * @return mixed
     */
    public function getNumerador()
    {
        return $this->numerador;
    }

    /**
     * @param mixed $numerador
     */
    public function setNumerador($numerador)
    {
        $this->numerador = $numerador;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function multiplicar(Racional $r)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $r->getNumerador());
        $resultado->setDenominador($this->getDenominador() * $r->getDenominador());

        return $resultado;
    }

    public function dividir(Racional $r)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $r->getDenominador());
        $resultado->setDenominador($this->getDenominador() * $r->getNumerador());

        return $resultado;
    }

    public function __toString()
    {
       return $this->getNumerador() . '/' . $this->getDenominador();
    }
}