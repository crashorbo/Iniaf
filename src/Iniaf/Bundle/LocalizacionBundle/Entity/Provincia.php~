<?php

namespace Iniaf\Bundle\LocalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Provincia
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
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\LocalizacionBundle\Entity\Departamento")
     */
    protected $departamento;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\LocalizacionBundle\Entity\Municipio", mappedBy="provincia" )
     */
    protected $municipios;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Provincia
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
     * Set departamento
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Departamento $departamento
     * @return Provincia
     */
    public function setDepartamento(\Iniaf\Bundle\LocalizacionBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \Iniaf\Bundle\LocalizacionBundle\Entity\Departamento 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->municipios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add municipio
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Municipio $municipio
     * @return Provincia
     */
    public function addMunicipio(\Iniaf\Bundle\LocalizacionBundle\Entity\Municipio $municipio)
    {
        $this->municipios[] = $municipio;

        return $this;
    }

    /**
     * Remove municipio
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Municipio $municipio
     */
    public function removeMunicipio(\Iniaf\Bundle\LocalizacionBundle\Entity\Municipio $municipio)
    {
        $this->municipios->removeElement($municipio);
    }

    /**
     * Get municipios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMunicipios()
    {
        return $this->municipios;
    }
}
