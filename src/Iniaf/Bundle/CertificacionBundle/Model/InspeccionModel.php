<?php

namespace Iniaf\Bundle\CertificacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InspeccionModel
{
    /**
     * @Assert\NotBlank()
     */
    public $fechaInspeccion;

    /**
     * @Assert\NotBlank()
     */
    public $numeroInspeccion;

    /**
     * @Assert\NotBlank()
     */
    public $nombreLugar;

    /**
     * @Assert\NotBlank()
     */
    public $superficie;

    /**
     * @Assert\NotBlank()
     */
    public $fechaSiembra;

    /**
     * @Assert\NotBlank()
     */
    public $fechaFloracion;

    /**
     * @Assert\NotBlank()
     */
    public $fechaCosecha;

    /**
     * @Assert\NotBlank()
     */
    public $aislamiento;

    /**
     * @Assert\NotBlank()
     */
    public $poblacionHectarea;

    /**
     * @Assert\NotBlank()
     */
    public $controlMaleza;

    /**
     * @Assert\NotBlank()
     */
    public $controlInsectos;

    /**
     * @Assert\NotBlank()
     */
    public $controlEnfermedades;

    /**
     * @Assert\NotBlank()
     */
    public $estadoGeneral;

    /**
     * @Assert\NotBlank()
     */
    public $mezclaVarietal;

    /**
     * @Assert\NotBlank()
     */
    public $mvpi;

    /**
     * @Assert\NotBlank()
     */
    public $papi;

    /**
     * @Assert\NotBlank()
     */
    public $cumplenorma;

    /**
     * @Assert\NotBlank()
     */
    public $personaIndicaciones;

    /**
     * @Assert\NotBlank()
     */
    public $observaciones;

    /**
     * @Assert\NotBlank()
     */
    public $generacionUtilizada;

    /**
     * @Assert\NotBlank()
     */
    public $generacionPretendida;

    /**
     * @Assert\NotBlank()
     */
    public $cultivoAnterior;

    /**
     * @Assert\NotBlank()
     */
    public $cumpleNorma;
}