<?php

namespace Iniaf\Bundle\CertificacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class RegistroModel
{
    /**
     * @Assert\NotBlank()
     */
    public $cooperador;

    /**
     * @Assert\NotBlank()
     */
    public $variedad;

    /**
     * @Assert\NotBlank()
     */
    public $nroCampo;

    /**
     * @Assert\NotBlank()
     */
    public $superficie;

    /**
     * @Assert\NotBlank()
     */
    public $generacion;

    /**
     * @Assert\NotBlank()
     */
    public $cultivoAnterior;

    /**
     * @Assert\NotBlank()
     */
    public $aislamiento;

    /**
     * @Assert\NotBlank()
     */
    public $fechaFloracion;

    /**
     * @Assert\NotBlank()
     */
    public $fechaSiembra;

    /**
     * @Assert\NotBlank()
     */
    public $fechaCosecha;

    /**
     * @Assert\NotBlank()
     */
    public $plantasMetro;

    /**
     * @Assert\NotBlank()
     */
    public $distanciaSurco;

    /**
     * @Assert\NotBlank()
     */
    public $poblacion;

    /**
     * @Assert\NotBlank()
     */
    public $generacionPretendida;

}