<?php

namespace Iniaf\Bundle\CooperadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afiliacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Afiliacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_afilicacion", type="date")
     */
    protected $fechaAfilicacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    protected $activo;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CooperadorBundle\Entity\Cooperador")
     */
    protected $cooperador;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemilleraBundle\Entity\Semillera")
     */
    protected $semillera;

    public function __construct()
    {
        $this->setActivo(true);
        $this->setFechaAfilicacion(new \DateTime());
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fechaAfilicacion
     *
     * @param \DateTime $fechaAfilicacion
     * @return Afiliacion
     */
    public function setFechaAfilicacion($fechaAfilicacion)
    {
        $this->fechaAfilicacion = $fechaAfilicacion;

        return $this;
    }

    /**
     * Get fechaAfilicacion
     *
     * @return \DateTime 
     */
    public function getFechaAfilicacion()
    {
        return $this->fechaAfilicacion;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Afiliacion
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set cooperador
     *
     * @param \Iniaf\Bundle\CooperadorBundle\Entity\Cooperador $cooperador
     * @return Afiliacion
     */
    public function setCooperador(\Iniaf\Bundle\CooperadorBundle\Entity\Cooperador $cooperador = null)
    {
        $this->cooperador = $cooperador;

        return $this;
    }

    /**
     * Get cooperador
     *
     * @return \Iniaf\Bundle\CooperadorBundle\Entity\Cooperador 
     */
    public function getCooperador()
    {
        return $this->cooperador;
    }

    /**
     * Set semillera
     *
     * @param \Iniaf\Bundle\SemilleraBundle\Entity\Semillera $semillera
     * @return Afiliacion
     */
    public function setSemillera(\Iniaf\Bundle\SemilleraBundle\Entity\Semillera $semillera = null)
    {
        $this->semillera = $semillera;

        return $this;
    }

    /**
     * Get semillera
     *
     * @return \Iniaf\Bundle\SemilleraBundle\Entity\Semillera 
     */
    public function getSemillera()
    {
        return $this->semillera;
    }
}
