<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroCampo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RegistroCampo
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
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Variedad")
     */
    protected $variedad;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_campo", type="string", length=255)
     */
    protected $nroCampo;

    /**
     * @var string
     *
     * @ORM\Column(name="superficie", type="decimal")
     */
    protected $superficie;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion")
     */
    protected $generacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_siembra", type="date")
     */
    protected $fechaSiembra;

    /**
     * @ORM\Column(name="cultivo_anterior", type="string", length = 255)
     */
    protected $cultivoAnterior;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aislamiento", type="boolean")
     */
    protected $aislamiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_floracion", type="date")
     */
    protected $fechaFloracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cosecha", type="date")
     */
    protected $fechaCosecha;

    /**
     * @var string
     *
     * @ORM\Column(name="plantas_metro", type="decimal")
     */
    protected $plantasMetro;

    /**
     * @var string
     *
     * @ORM\Column(name="distancia_surco", type="decimal")
     */
    protected $distanciaSurco;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="decimal")
     */
    protected $poblacion;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion")
     */
    protected $generacionPretendida;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\Inscripcion")
     */
    protected $inscripcion;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha", mappedBy="registroCampo")
     */
    protected $hojaCosechas;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion", mappedBy="registroCampo")
     */
    protected $hojaInspeccions;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen", mappedBy="registroCampo")
     */
    protected $inspeccionAlmacens;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\UserBundle\Entity\Usuario")
     */
    protected $tecnico;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CooperadorBundle\Entity\Cooperador")
     */
    protected $cooperador;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="decimal")
     */
    protected $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldo", type="decimal")
     */
    protected $saldo;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    protected $estado;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\MovimientoBundle\Entity\RegistroTarifa", mappedBy="registroCampo")
     */
    protected $tarifas;

    /**
     * @ORM\OneToMany(targetEntity="Iniaf\Bundle\MovimientoBundle\Entity\Movimiento", mappedBy="registroCampo")
     */
    protected $pagos;

    public function agregarMonto($monto)
    {
        $this->total = $this->getTotal()+$monto;
        $this->saldo = $this->getSaldo()+$monto;
    }

    public function descontarMonto($monto)
    {
        $this->saldo = $this->getSaldo()-$monto;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hojaCosechas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hojaInspeccions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inspeccionAlmacens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tarifas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->estado = "TRANSITO";
        $this->saldo = 0;
        $this->total = 0;
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
     * Set nroCampo
     *
     * @param string $nroCampo
     * @return RegistroCampo
     */
    public function setNroCampo($nroCampo)
    {
        $this->nroCampo = $nroCampo;

        return $this;
    }

    /**
     * Get nroCampo
     *
     * @return string 
     */
    public function getNroCampo()
    {
        return $this->nroCampo;
    }

    /**
     * Set superficie
     *
     * @param string $superficie
     * @return RegistroCampo
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return string 
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set fechaSiembra
     *
     * @param \DateTime $fechaSiembra
     * @return RegistroCampo
     */
    public function setFechaSiembra($fechaSiembra)
    {
        $this->fechaSiembra = $fechaSiembra;

        return $this;
    }

    /**
     * Get fechaSiembra
     *
     * @return \DateTime 
     */
    public function getFechaSiembra()
    {
        return $this->fechaSiembra;
    }

    /**
     * Set aislamiento
     *
     * @param boolean $aislamiento
     * @return RegistroCampo
     */
    public function setAislamiento($aislamiento)
    {
        $this->aislamiento = $aislamiento;

        return $this;
    }

    /**
     * Get aislamiento
     *
     * @return boolean 
     */
    public function getAislamiento()
    {
        return $this->aislamiento;
    }

    /**
     * Set fechaFloracion
     *
     * @param \DateTime $fechaFloracion
     * @return RegistroCampo
     */
    public function setFechaFloracion($fechaFloracion)
    {
        $this->fechaFloracion = $fechaFloracion;

        return $this;
    }

    /**
     * Get fechaFloracion
     *
     * @return \DateTime 
     */
    public function getFechaFloracion()
    {
        return $this->fechaFloracion;
    }

    /**
     * Set fechaCosecha
     *
     * @param \DateTime $fechaCosecha
     * @return RegistroCampo
     */
    public function setFechaCosecha($fechaCosecha)
    {
        $this->fechaCosecha = $fechaCosecha;

        return $this;
    }

    /**
     * Get fechaCosecha
     *
     * @return \DateTime 
     */
    public function getFechaCosecha()
    {
        return $this->fechaCosecha;
    }

    /**
     * Set plantasMetro
     *
     * @param string $plantasMetro
     * @return RegistroCampo
     */
    public function setPlantasMetro($plantasMetro)
    {
        $this->plantasMetro = $plantasMetro;

        return $this;
    }

    /**
     * Get plantasMetro
     *
     * @return string 
     */
    public function getPlantasMetro()
    {
        return $this->plantasMetro;
    }

    /**
     * Set distanciaSurco
     *
     * @param string $distanciaSurco
     * @return RegistroCampo
     */
    public function setDistanciaSurco($distanciaSurco)
    {
        $this->distanciaSurco = $distanciaSurco;

        return $this;
    }

    /**
     * Get distanciaSurco
     *
     * @return string 
     */
    public function getDistanciaSurco()
    {
        return $this->distanciaSurco;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     * @return RegistroCampo
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string 
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set variedad
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedad
     * @return RegistroCampo
     */
    public function setVariedad(\Iniaf\Bundle\SemillaBundle\Entity\Variedad $variedad = null)
    {
        $this->variedad = $variedad;

        return $this;
    }

    /**
     * Get variedad
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Variedad 
     */
    public function getVariedad()
    {
        return $this->variedad;
    }

    /**
     * Set generacion
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion
     * @return RegistroCampo
     */
    public function setGeneracion(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion = null)
    {
        $this->generacion = $generacion;

        return $this;
    }

    /**
     * Get generacion
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Generacion 
     */
    public function getGeneracion()
    {
        return $this->generacion;
    }

    /**
     * Set cultivoAnterior
     *
     * @param String $cultivoAnterior
     * @return RegistroCampo
     */
    public function setCultivoAnterior($cultivoAnterior)
    {
        $this->cultivoAnterior = $cultivoAnterior;

        return $this;
    }

    /**
     * Get cultivoAnterior
     *
     * @return String
     */
    public function getCultivoAnterior()
    {
        return $this->cultivoAnterior;
    }

    /**
     * Set generacionPretendida
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacionPretendida
     * @return RegistroCampo
     */
    public function setGeneracionPretendida(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacionPretendida = null)
    {
        $this->generacionPretendida = $generacionPretendida;

        return $this;
    }

    /**
     * Get generacionPretendida
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Generacion 
     */
    public function getGeneracionPretendida()
    {
        return $this->generacionPretendida;
    }

    /**
     * Set inscripcion
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\Inscripcion $inscripcion
     * @return RegistroCampo
     */
    public function setInscripcion(\Iniaf\Bundle\CertificacionBundle\Entity\Inscripcion $inscripcion = null)
    {
        $this->inscripcion = $inscripcion;

        return $this;
    }

    /**
     * Get inscripcion
     *
     * @return \Iniaf\Bundle\CertificacionBundle\Entity\Inscripcion 
     */
    public function getInscripcion()
    {
        return $this->inscripcion;
    }

    /**
     * Add hojaCosechas
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha $hojaCosechas
     * @return RegistroCampo
     */
    public function addHojaCosecha(\Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha $hojaCosechas)
    {
        $this->hojaCosechas[] = $hojaCosechas;

        return $this;
    }

    /**
     * Remove hojaCosechas
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha $hojaCosechas
     */
    public function removeHojaCosecha(\Iniaf\Bundle\CertificacionBundle\Entity\HojaCosecha $hojaCosechas)
    {
        $this->hojaCosechas->removeElement($hojaCosechas);
    }

    /**
     * Get hojaCosechas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHojaCosechas()
    {
        return $this->hojaCosechas;
    }

    /**
     * Add hojaInspeccions
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion $hojaInspeccions
     * @return RegistroCampo
     */
    public function addHojaInspeccion(\Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion $hojaInspeccions)
    {
        $this->hojaInspeccions[] = $hojaInspeccions;

        return $this;
    }

    /**
     * Remove hojaInspeccions
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion $hojaInspeccions
     */
    public function removeHojaInspeccion(\Iniaf\Bundle\CertificacionBundle\Entity\HojaInspeccion $hojaInspeccions)
    {
        $this->hojaInspeccions->removeElement($hojaInspeccions);
    }

    /**
     * Get hojaInspeccions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHojaInspeccions()
    {
        return $this->hojaInspeccions;
    }

    /**
     * Add inspeccionAlmacens
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $inspeccionAlmacens
     * @return RegistroCampo
     */
    public function addInspeccionAlmacen(\Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $inspeccionAlmacens)
    {
        $this->inspeccionAlmacens[] = $inspeccionAlmacens;

        return $this;
    }

    /**
     * Remove inspeccionAlmacens
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $inspeccionAlmacens
     */
    public function removeInspeccionAlmacen(\Iniaf\Bundle\CertificacionBundle\Entity\InspeccionAlmacen $inspeccionAlmacens)
    {
        $this->inspeccionAlmacens->removeElement($inspeccionAlmacens);
    }

    /**
     * Get inspeccionAlmacens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInspeccionAlmacens()
    {
        return $this->inspeccionAlmacens;
    }

    /**
     * Set tecnico
     *
     * @param \Iniaf\Bundle\UserBundle\Entity\Usuario $tecnico
     * @return RegistroCampo
     */
    public function setTecnico(\Iniaf\Bundle\UserBundle\Entity\Usuario $tecnico = null)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get tecnico
     *
     * @return \Iniaf\Bundle\UserBundle\Entity\Usuario
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set cooperador
     *
     * @param \Iniaf\Bundle\CooperadorBundle\Entity\Cooperador $cooperador
     * @return RegistroCampo
     */
    public function setCooperador(\Iniaf\Bundle\CooperadorBundle\Entity\Cooperador $cooperador = null)
    {
        $this->cooperador = $cooperador;

        return $this;
    }

    /**
     * Get cooperador
     *
     * @return \Iniaf\Bundle\CooperadorBundle\Entity\Cooperador 
     */
    public function getCooperador()
    {
        return $this->cooperador;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return RegistroCampo
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set saldo
     *
     * @param string $saldo
     * @return RegistroCampo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get pagado
     *
     * @return string 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return RegistroCampo
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
     * @return RegistroCampo
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

    /**
     * Add pagos
     *
     * @param \Iniaf\Bundle\MovimientoBundle\Entity\Movimiento $pagos
     * @return RegistroCampo
     */
    public function addPago(\Iniaf\Bundle\MovimientoBundle\Entity\Movimiento $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param \Iniaf\Bundle\MovimientoBundle\Entity\Movimiento $pagos
     */
    public function removePago(\Iniaf\Bundle\MovimientoBundle\Entity\Movimiento $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }
}
