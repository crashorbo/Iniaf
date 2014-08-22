<?php

namespace Iniaf\Bundle\SemillaBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class VariedadModel
{
    /**
     * @Assert\Type("Iniaf\Bundle\SemillaBundle\Entity\Cultivo")
     * @Assert\NotNull()
     */
    public $cultivo;

    /**
     * @Assert\NotBlank()
     */
    public $nombre;

    /**
     * @Assert\NotBlank()
     */
    public $numeroRegistro;
}