<?php

namespace Iniaf\Bundle\CooperadorBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class CooperadorModel
{
    /**
     * @Assert\NotBlank()
     */
    public $nombre;

    /**
     * @Assert\NotBlank()
     */
    public $ciNit;

    /**
     * @Assert\NotBlank()
     */
    public $telefono;

    /**
     * @Assert\NotBlank()
     */
    public $celular;

    /**
     * @Assert\NotBlank()
     */
    public $direccion;

}