<?php

namespace Iniaf\Bundle\SemillaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactorAlmacen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Factor
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    protected $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="factor", type="integer")
     */
    protected $factor;

    /**
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Factor
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
     * Set factor
     *
     * @param integer $factor
     * @return Factor
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return integer 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set cultivo
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Cultivo $cultivo
     * @return Factor
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
