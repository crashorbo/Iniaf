<?php

namespace Iniaf\Bundle\SemillaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarifa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iniaf\Bundle\SemillaBundle\Repository\TarifaRepository")
 */
class Tarifa
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    protected $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    protected $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Cultivo")
     */
    protected $cultivo;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa", mappedBy="tarifa")
     */
    protected $tarifas;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
        $this->monto = 0;
        $this->estado = "ACTIVO";
        $this->tarifas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipo
     *
     * @param string $tipo
     * @return Tarifa
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
     * Set monto
     *
     * @param string $monto
     * @return Tarifa
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set cultivo
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Cultivo $cultivo
     * @return Tarifa
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
     * Set estado
     *
     * @param string $estado
     * @return Tarifa
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
     * Add tarifas
     *
     * @param \Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa $tarifas
     * @return Tarifa
     */
    public function addTarifa(\Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa $tarifas)
    {
        $this->tarifas[] = $tarifas;

        return $this;
    }

    /**
     * Remove tarifas
     *
     * @param \Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa $tarifas
     */
    public function removeTarifa(\Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa $tarifas)
    {
        $this->tarifas->removeElement($tarifas);
    }

    /**
     * Get tarifas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTarifas()
    {
        return $this->tarifas;
    }
}
