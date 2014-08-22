<?php

namespace Iniaf\Bundle\CooperadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cooperador
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cooperador
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ci_nit", type="string", length=255)
     */
    protected $ciNit;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    protected $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=255)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    protected $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="date")
     */
    protected $fechaRegistro;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion", mappedBy="cooperador")
     */
    protected $afiliaciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->afiliaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setFechaRegistro(new \DateTime());
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
     * Set nombre
     *
     * @param string $nombre
     * @return Cooperador
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ciNit
     *
     * @param string $ciNit
     * @return Cooperador
     */
    public function setCiNit($ciNit)
    {
        $this->ciNit = $ciNit;

        return $this;
    }

    /**
     * Get ciNit
     *
     * @return string 
     */
    public function getCiNit()
    {
        return $this->ciNit;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Cooperador
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Cooperador
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Cooperador
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Cooperador
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Add afiliaciones
     *
     * @param \Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion $afiliaciones
     * @return Cooperador
     */
    public function addAfiliacione(\Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion $afiliaciones)
    {
        $this->afiliaciones[] = $afiliaciones;

        return $this;
    }

    /**
     * Remove afiliaciones
     *
     * @param \Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion $afiliaciones
     */
    public function removeAfiliacione(\Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion $afiliaciones)
    {
        $this->afiliaciones->removeElement($afiliaciones);
    }

    /**
     * Get afiliaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAfiliaciones()
    {
        return $this->afiliaciones;
    }
}
