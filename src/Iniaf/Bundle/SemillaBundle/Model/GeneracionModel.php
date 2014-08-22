<?php

namespace Iniaf\Bundle\SemillaBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class GeneracionModel
{
    /**
     * @Assert\NotBlank()
     */
    public $nombre;

    /**
     * @Assert\Type("Iniaf\Bundle\SemillaBundle\Entity\Categoria")
     * @Assert\NotNull()
     */
    public $categoria;
}