<?php

namespace Iniaf\Bundle\CertificacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class HojaCosechaModel
{
    /**
     * @Assert\NotBlank()
     */
    public $plantaAcondicionadora;

    /**
     * @Assert\NotBlank()
     */
    public $superficie;

    /**
     * @Assert\NotBlank()
     */
    public $mezclaVarietal;

    /**
     * @Assert\NotBlank()
     */
    public $plantasAnormales;

    /**
     * @Assert\NotBlank()
     */
    public $rendimientoD;

    /**
     * @Assert\NotBlank()
     */
    public $rendimientoCampo;

    /**
     * @Assert\NotBlank()
     */
    public $cupones;

    /**
     * @Assert\NotBlank()
     */
    public $serieCupones;

    /**
     * @Assert\NotBlank()
     */
    public $campoAprobado;

    /**
     * @Assert\NotBlank()
     */
    public $personaEntregado;

    /**
     * @Assert\NotBlank()
     */
    public $descripcionMezcla;

    /**
     * @Assert\NotBlank()
     */
    public $observaciones;

    /**
     * @Assert\NotBlank()
     */
    public $generacion;
}