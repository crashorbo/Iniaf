<?php

namespace Iniaf\Bundle\SemillaBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class CategoriaModel
{
    /**
     * @Assert\NotBlank()
     */
    public $Descripcion;

    /**
     * @Assert\NotBlank()
     */
    public $monto;

    /**
     * @Assert\NotBlank()
     */
    public $numeroFactura;
}