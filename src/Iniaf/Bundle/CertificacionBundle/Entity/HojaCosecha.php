<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaCosecha
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class HojaCosecha
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
     * @ORM\Column(name="planta_acondicionadora", type="string", length=255)
     */
    protected $plantaAcondicionadora;

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
     * @var string
     *
     * @ORM\Column(name="mezcla_varietal", type="decimal")
     */
    protected $mezclaVarietal;

    /**
     * @var string
     *
     * @ORM\Column(name="plantas_anormales", type="decimal")
     */
    protected $plantasAnormales;

    /**
     * @var string
     *
     * @ORM\Column(name="rendimiento", type="decimal")
     */
    protected $rendimientoD;

    /**
     * @var string
     *
     * @ORM\Column(name="rendimiento_campo", type="decimal")
     */
    protected $rendimientoCampo;

    /**
     * @var integer
     *
     * @ORM\Column(name="cupones", type="integer")
     */
    protected $cupones;

    /**
     * @var string
     *
     * @ORM\Column(name="serie_cupones", type="string", length=255)
     */
    protected $serieCupones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="campo_aprobado", type="string", length=255)
     */
    protected $campoAprobado;

    /**
     * @var string
     *
     * @ORM\Column(name="persona_entregado", type="string", length=255)
     */
    protected $personaEntregado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_mezcla", type="text")
     */
    protected $descripcionMezcla;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    protected $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo")
     */
    protected $registroCampo;
    

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
     * Set plantaAcondicionadora
     *
     * @param string $plantaAcondicionadora
     * @return HojaCosecha
     */
    public function setPlantaAcondicionadora($plantaAcondicionadora)
    {
        $this->plantaAcondicionadora = $plantaAcondicionadora;

        return $this;
    }

    /**
     * Get plantaAcondicionadora
     *
     * @return string 
     */
    public function getPlantaAcondicionadora()
    {
        return $this->plantaAcondicionadora;
    }

    /**
     * Set superficie
     *
     * @param string $superficie
     * @return HojaCosecha
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
     * Set mezclaVarietal
     *
     * @param string $mezclaVarietal
     * @return HojaCosecha
     */
    public function setMezclaVarietal($mezclaVarietal)
    {
        $this->mezclaVarietal = $mezclaVarietal;

        return $this;
    }

    /**
     * Get mezclaVarietal
     *
     * @return string 
     */
    public function getMezclaVarietal()
    {
        return $this->mezclaVarietal;
    }

    /**
     * Set plantasAnormales
     *
     * @param string $plantasAnormales
     * @return HojaCosecha
     */
    public function setPlantasAnormales($plantasAnormales)
    {
        $this->plantasAnormales = $plantasAnormales;

        return $this;
    }

    /**
     * Get plantasAnormales
     *
     * @return string 
     */
    public function getPlantasAnormales()
    {
        return $this->plantasAnormales;
    }

    /**
     * Set rendimientoD
     *
     * @param string $rendimientoD
     * @return HojaCosecha
     */
    public function setRendimientoD($rendimientoD)
    {
        $this->rendimientoD = $rendimientoD;

        return $this;
    }

    /**
     * Get rendimientoD
     *
     * @return string 
     */
    public function getRendimientoD()
    {
        return $this->rendimientoD;
    }

    /**
     * Set rendimientoCampo
     *
     * @param string $rendimientoCampo
     * @return HojaCosecha
     */
    public function setRendimientoCampo($rendimientoCampo)
    {
        $this->rendimientoCampo = $rendimientoCampo;

        return $this;
    }

    /**
     * Get rendimientoCampo
     *
     * @return string 
     */
    public function getRendimientoCampo()
    {
        return $this->rendimientoCampo;
    }

    /**
     * Set cupones
     *
     * @param integer $cupones
     * @return HojaCosecha
     */
    public function setCupones($cupones)
    {
        $this->cupones = $cupones;

        return $this;
    }

    /**
     * Get cupones
     *
     * @return integer 
     */
    public function getCupones()
    {
        return $this->cupones;
    }

    /**
     * Set serieCupones
     *
     * @param string $serieCupones
     * @return HojaCosecha
     */
    public function setSerieCupones($serieCupones)
    {
        $this->serieCupones = $serieCupones;

        return $this;
    }

    /**
     * Get serieCupones
     *
     * @return string 
     */
    public function getSerieCupones()
    {
        return $this->serieCupones;
    }

    /**
     * Set campoAprobado
     *
     * @param boolean $campoAprobado
     * @return HojaCosecha
     */
    public function setCampoAprobado($campoAprobado)
    {
        $this->campoAprobado = $campoAprobado;

        return $this;
    }

    /**
     * Get campoAprobado
     *
     * @return boolean 
     */
    public function getCampoAprobado()
    {
        return $this->campoAprobado;
    }

    /**
     * Set personaEntregado
     *
     * @param string $personaEntregado
     * @return HojaCosecha
     */
    public function setPersonaEntregado($personaEntregado)
    {
        $this->personaEntregado = $personaEntregado;

        return $this;
    }

    /**
     * Get personaEntregado
     *
     * @return string 
     */
    public function getPersonaEntregado()
    {
        return $this->personaEntregado;
    }

    /**
     * Set descripcionMezcla
     *
     * @param string $descripcionMezcla
     * @return HojaCosecha
     */
    public function setDescripcionMezcla($descripcionMezcla)
    {
        $this->descripcionMezcla = $descripcionMezcla;

        return $this;
    }

    /**
     * Get descripcionMezcla
     *
     * @return string 
     */
    public function getDescripcionMezcla()
    {
        return $this->descripcionMezcla;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return HojaCosecha
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set generacion
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacion
     * @return HojaCosecha
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
     * Set registroCampo
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampo
     * @return HojaCosecha
     */
    public function setRegistroCampo(\Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampo = null)
    {
        $this->registroCampo = $registroCampo;

        return $this;
    }

    /**
     * Get registroCampo
     *
     * @return \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo 
     */
    public function getRegistroCampo()
    {
        return $this->registroCampo;
    }
}
