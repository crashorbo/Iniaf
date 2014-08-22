<?php

namespace Iniaf\Bundle\SemillaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
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
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Cultivo")
     */
    protected $cultivo;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion", mappedBy="categoria")
     */
    protected $generaciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->generaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNombre();
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
     * @return Categoria
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set cultivo
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Cultivo $cultivo
     * @return Categoria
     */
    public function setCultivo(\Iniaf\Bundle\SemillaBundle\Entity\Cultivo $cultivo = null)
    {
        $this->cultivo = $cultivo;

        return $this;
    }

    /**
     * Get cultivo
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Cultivo 
     */
    public function getCultivo()
    {
        return $this->cultivo;
    }

    /**
     * Add generacion
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion
     * @return Categoria
     */
    public function addGeneracion(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion)
    {
        $this->generaciones[] = $generacion;

        return $this;
    }

    /**
     * Remove generacion
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion
     */
    public function removeGeneracion(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion)
    {
        $this->generaciones->removeElement($generacion);
    }

    /**
     * Get generaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGeneraciones()
    {
        return $this->generaciones;
    }

    /**
     * Add generaciones
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generaciones
     * @return Categoria
     */
    public function addGeneracione(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generaciones)
    {
        $this->generaciones[] = $generaciones;

        return $this;
    }

    /**
     * Remove generaciones
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generaciones
     */
    public function removeGeneracione(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generaciones)
    {
        $this->generaciones->removeElement($generaciones);
    }
}
