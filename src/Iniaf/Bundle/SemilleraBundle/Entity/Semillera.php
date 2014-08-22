<?php

namespace Iniaf\Bundle\SemilleraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semillera
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Semillera
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
     * @ORM\Column(name="tecnico_responsable", type="string", length=255)
     */
    protected $tecnicoResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    protected $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    protected $telefono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inscripcion", type="date")
     */
    protected $fechaInscripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad")
     */
    protected $comunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255)
     */
    protected $responsable;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion", mappedBy="semillera")
     */
    protected $afiliaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="ci_nit", type="string", length=255)
     */
    protected $ciNit;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->afiliaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setFechaInscripcion(new \DateTime());
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
     * @return Semillera
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
     * Set tecnicoResponsable
     *
     * @param string $tecnicoResponsable
     * @return Semillera
     */
    public function setTecnicoResponsable($tecnicoResponsable)
    {
        $this->tecnicoResponsable = $tecnicoResponsable;

        return $this;
    }

    /**
     * Get tecnicoResponsable
     *
     * @return string 
     */
    public function getTecnicoResponsable()
    {
        return $this->tecnicoResponsable;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Semillera
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     * @return Semillera
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime 
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return Semillera
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set comunidad
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad
     * @return Semillera
     */
    public function setComunidad(\Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad = null)
    {
        $this->comunidad = $comunidad;

        return $this;
    }

    /**
     * Get comunidad
     *
     * @return \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad 
     */
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * Add afiliaciones
     *
     * @param \Iniaf\Bundle\CooperadorBundle\Entity\Afiliacion $afiliaciones
     * @return Semillera
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

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Semillera
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
     * Set telefono
     *
     * @param string $telefono
     * @return Semillera
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
     * Set ciNit
     *
     * @param string $ciNit
     * @return Semillera
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
}
