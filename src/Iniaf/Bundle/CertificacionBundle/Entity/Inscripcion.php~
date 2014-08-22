<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscripcion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Inscripcion
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
     * @var string
     *
     * @ORM\Column(name="campana", type="string", length=255)
     */
    protected $campana;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date")
     */
    protected $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date")
     */
    protected $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    protected $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemilleraBundle\Entity\Semillera")
     */
    protected $semillera;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo", mappedBy="inscripcion")
     */
    protected $registroCampos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fechaInicio = new \DateTime();
        $this->fechaFin = new \DateTime();
        $this->estado = true;
        $this->registroCampos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set campana
     *
     * @param string $campana
     * @return Inscripcion
     */
    public function setCampana($campana)
    {
        $this->campana = $campana;

        return $this;
    }

    /**
     * Get campana
     *
     * @return string 
     */
    public function getCampana()
    {
        return $this->campana;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Inscripcion
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Inscripcion
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Inscripcion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set semillera
     *
     * @param \Iniaf\Bundle\SemilleraBundle\Entity\Semillera $semillera
     * @return Inscripcion
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

    /**
     * Add registroCampos
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampos
     * @return Inscripcion
     */
    public function addRegistroCampo(\Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampos)
    {
        $this->registroCampos[] = $registroCampos;

        return $this;
    }

    /**
     * Remove registroCampos
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampos
     */
    public function removeRegistroCampo(\Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampos)
    {
        $this->registroCampos->removeElement($registroCampos);
    }

    /**
     * Get registroCampos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistroCampos()
    {
        return $this->registroCampos;
    }
}
