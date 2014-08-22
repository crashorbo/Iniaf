<?php

namespace Iniaf\Bundle\UserBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PasswordModel
{
    /**
     * @Assert\NotBlank()
     */
    public $password;
}
