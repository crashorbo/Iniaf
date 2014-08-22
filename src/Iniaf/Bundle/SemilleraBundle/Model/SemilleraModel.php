<?php

namespace Iniaf\Bundle\SemilleraBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class SemilleraModel
{
    /**
     * @Assert\NotBlank()
     */
    public $nombre;

    /**
     * @Assert\NotBlank()
     */
    public $tecnicoResponsable;

    /**
     * @Assert\NotBlank()
     */
    public $tipo;

    /**
     * @Assert\Type("Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad")
     * @Assert\NotNull()
     */
    public $comunidad;

    /**
     * @Assert\NotNull()
     */
    public $responsable;

    /**
     * @Assert\NotNull()
     */
    public $ciNit;
    /**
     * @Assert\NotNull()
     */
    public $direccion;

    /**
     * @Assert\NotNull()
     */
    public $telefono;
}