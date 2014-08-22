<?php

namespace Iniaf\Bundle\MovimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroTarifa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RegistroTarifa
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo")
     */
    protected $registroCampo;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Tarifa")
     */
    protected $tarifa;


    /**
     * Set registroCampo
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampo
     * @return RegistroTarifa
     */
    public function setRegistroCampo(\Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampo)
    {
        $this->registroCampo = $registroCampo;

        return $this;
    }

    /**
     * Get registroCampo
     *
     * @return \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo 
     */
    public function getRegistroCampo()
    {
        return $this->registroCampo;
    }

    /**
     * Set tarifa
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Tarifa $tarifa
     * @return RegistroTarifa
     */
    public function setTarifa(\Iniaf\Bundle\SemillaBundle\Entity\Tarifa $tarifa)
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    /**
     * Get tarifa
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Tarifa 
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }
}
