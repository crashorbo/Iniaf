<?php

namespace Iniaf\Bundle\CertificacionBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class InscripcionModel
{
    /**
     * @Assert\NotBlank()
     */
    public $campana;

    /**
     * @Assert\NotBlank()
     */
    public $semillera;

}