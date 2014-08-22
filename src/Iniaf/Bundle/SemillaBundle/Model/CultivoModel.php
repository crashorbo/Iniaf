<?php

namespace Iniaf\Bundle\SemillaBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class CultivoModel
{
    /**
     * @Assert\NotBlank()
     */
    public $nombre;
}
