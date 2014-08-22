<?php

namespace Iniaf\Bundle\SemillaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cultivo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cultivo
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
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Variedad", mappedBy="cultivo")
     */
    protected $variedades;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Categoria", mappedBy="cultivo")
     */
    protected $categorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variedades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Cultivo
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
     * Add variedades
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedades
     * @return Cultivo
     */
    public function addVariedade(\Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedades)
    {
        $this->variedades[] = $variedades;

        return $this;
    }

    /**
     * Remove variedades
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedades
     */
    public function removeVariedade(\Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedades)
    {
        $this->variedades->removeElement($variedades);
    }

    /**
     * Get variedades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVariedades()
    {
        return $this->variedades;
    }

    /**
     * Add categorias
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Categoria $categorias
     * @return Cultivo
     */
    public function addCategoria(\Iniaf\Bundle\SemillaBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;

        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Categoria $categorias
     */
    public function removeCategoria(\Iniaf\Bundle\SemillaBundle\Entity\Categoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }
}
