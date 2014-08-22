<?php

namespace Iniaf\Bundle\LocalizacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class LocalizacionModel
{
    /**
     * @Assert\NotBlank()
     */
    public $comunidad;

    /**
     * @Assert\Type("Iniaf\Bundle\LocalizacionBundle\Entity\Municipio")
     * @Assert\NotNull()
     */
    public $municipio;
}
