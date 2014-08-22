<?php

namespace Iniaf\Bundle\LocalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Municipio
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
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\LocalizacionBundle\Entity\Provincia")
     */
    protected $provincia;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad", mappedBy="municipio" )
     */
    protected $comunidades;

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
     * @return Municipio
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
     * Set provincia
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Provincia $provincia
     * @return Municipio
     */
    public function setProvincia(\Iniaf\Bundle\LocalizacionBundle\Entity\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \Iniaf\Bundle\LocalizacionBundle\Entity\Provincia 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comunidades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comunidad
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad
     * @return Municipio
     */
    public function addComunidad(\Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad)
    {
        $this->comunidades[] = $comunidad;

        return $this;
    }

    /**
     * Remove comunidad
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad
     */
    public function removeComunidad(\Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidad)
    {
        $this->comunidades->removeElement($comunidad);
    }

    /**
     * Get comunidades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComunidades()
    {
        return $this->comunidades;
    }

    /**
     * Add comunidades
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidades
     * @return Municipio
     */
    public function addComunidade(\Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidades)
    {
        $this->comunidades[] = $comunidades;

        return $this;
    }

    /**
     * Remove comunidades
     *
     * @param \Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidades
     */
    public function removeComunidade(\Iniaf\Bundle\LocalizacionBundle\Entity\Comunidad $comunidades)
    {
        $this->comunidades->removeElement($comunidades);
    }
}
