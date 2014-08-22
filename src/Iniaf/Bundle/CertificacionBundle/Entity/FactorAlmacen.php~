<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactorAlmacen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FactorAlmacen
{
    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    protected $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="subtotal", type="integer")
     */
    protected $subtotal;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Factor")
     * @ORM\Id
     */
    protected $factor;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen")
     * @ORM\Id
     */
    protected $almacen;



    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return FactorAlmacen
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set subtotal
     *
     * @param integer $subtotal
     * @return FactorAlmacen
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return integer 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set factor
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Factor $factor
     * @return FactorAlmacen
     */
    public function setFactor(\Iniaf\Bundle\SemillaBundle\Entity\Factor $factor)
    {
        $this->factor = $factor;

        return $this;
    }

    /**
     * Get factor
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Factor 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set almacen
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $almacen
     * @return FactorAlmacen
     */
    public function setAlmacen(\Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get almacen
     *
     * @return \Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen 
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }
}
