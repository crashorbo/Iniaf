<?php

namespace Iniaf\Bundle\CertificacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InspeccionAlmacenModel
{
    /**
     * @Assert\NotBlank()
     */
    public $fechaInspeccion;

    /**
     * @Assert\NotBlank()
     */
    public $numeroLote;

    /**
     * @Assert\NotBlank()
     */
    public $t1;

    /**
     * @Assert\NotBlank()
     */
    public $t2;

    /**
     * @Assert\NotBlank()
     */
    public $t3;

    /**
     * @Assert\NotBlank()
     */
    public $t4;

    /**
     * @Assert\NotBlank()
     */
    public $t5;

    /**
     * @Assert\NotBlank()
     */
    public $pesoBolsa;

    /**
     * @Assert\NotBlank()
     */
    public $totalBolsas;

    /**
     * @Assert\NotBlank()
     */
    public $puntajeMaximo;

    /**
     * @Assert\NotBlank()
     */
    public $n1;
    /**
     * @Assert\NotBlank()
     */
    public $n2;
    /**
     * @Assert\NotBlank()
     */
    public $n3;
    /**
     * @Assert\NotBlank()
     */
    public $n4;
    /**
     * @Assert\NotBlank()
     */
    public $n5;
    /**
     * @Assert\NotBlank()
     */
    public $n6;
    /**
     * @Assert\NotBlank()
     */
    public $observaciones;

    /**
     * @Assert\NotBlank()
     */
    public $generacion;

    /**
     * @Assert\NotBlank()
     */
    public $aprobado;
}