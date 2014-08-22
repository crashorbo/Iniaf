<?php

namespace Iniaf\Bundle\SemillaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variedad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Variedad
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
     * @ORM\Column(name="numero_registro", type="string", length=255)
     */
    protected $numeroRegistro;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Cultivo")
     */
    protected $cultivo;


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
     * @return Variedad
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
     * Set numeroRegistro
     *
     * @param string $numeroRegistro
     * @return Variedad
     */
    public function setNumeroRegistro($numeroRegistro)
    {
        $this->numeroRegistro = $numeroRegistro;

        return $this;
    }

    /**
     * Get numeroRegistro
     *
     * @return string 
     */
    public function getNumeroRegistro()
    {
        return $this->numeroRegistro;
    }

    /**
     * Set cultivo
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Cultivo $cultivo
     * @return Variedad
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
}
