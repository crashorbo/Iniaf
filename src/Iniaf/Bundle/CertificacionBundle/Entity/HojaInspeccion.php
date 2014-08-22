<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaInspeccion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class HojaInspeccion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inspeccion", type="date")
     */
    protected $fechaInspeccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_inspeccion", type="integer")
     */
    protected $numeroInspeccion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_lugar", type="string", length=255)
     */
    protected $nombreLugar;

    /**
     * @var string
     *
     * @ORM\Column(name="superficie", type="decimal")
     */
    protected $superficie;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion")
     */
    protected $generacionUtilizada;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion")
     */
    protected $generacionPretendida;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aislamiento", type="string", length=255)
     */
    protected $aislamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion_hectarea", type="decimal")
     */
    protected $poblacionHectarea;

    /**
     * @var string
     *
     * @ORM\Column(name="control_maleza", type="string", length=255)
     */
    protected $controlMaleza;

    /**
     * @var string
     *
     * @ORM\Column(name="control_insectos", type="string", length=255)
     */
    protected $controlInsectos;

    /**
     * @var string
     *
     * @ORM\Column(name="control_enfermedades", type="string", length=255)
     */
    protected $controlEnfermedades;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_general", type="string", length=255)
     */
    protected $estadoGeneral;

    /**
     * @var string
     *
     * @ORM\Column(name="mezcla_varietal", type="decimal")
     */
    protected $mezclaVarietal;

    /**
     * @var string
     *
     * @ORM\Column(name="mvpi", type="decimal")
     */
    protected $mvpi;

    /**
     * @var string
     *
     * @ORM\Column(name="papi", type="decimal")
     */
    protected $papi;

    /**
     * @var string
     *
     * @ORM\Column(name="cumple_norma", type="string", length=255)
     */
    protected $cumpleNorma;

    /**
     * @var string
     *
     * @ORM\Column(name="persona_indicaciones", type="string", length=255)
     */
    protected $personaIndicaciones;

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
     * Set fechaInspeccion
     *
     * @param \DateTime $fechaInspeccion
     * @return HojaInspeccion
     */
    public function setFechaInspeccion($fechaInspeccion)
    {
        $this->fechaInspeccion = $fechaInspeccion;

        return $this;
    }

    /**
     * Get fechaInspeccion
     *
     * @return \DateTime 
     */
    public function getFechaInspeccion()
    {
        return $this->fechaInspeccion;
    }

    /**
     * Set numeroInspeccion
     *
     * @param integer $numeroInspeccion
     * @return HojaInspeccion
     */
    public function setNumeroInspeccion($numeroInspeccion)
    {
        $this->numeroInspeccion = $numeroInspeccion;

        return $this;
    }

    /**
     * Get numeroInspeccion
     *
     * @return integer 
     */
    public function getNumeroInspeccion()
    {
        return $this->numeroInspeccion;
    }

    /**
     * Set nombreLugar
     *
     * @param string $nombreLugar
     * @return HojaInspeccion
     */
    public function setNombreLugar($nombreLugar)
    {
        $this->nombreLugar = $nombreLugar;

        return $this;
    }

    /**
     * Get nombreLugar
     *
     * @return string 
     */
    public function getNombreLugar()
    {
        return $this->nombreLugar;
    }

    /**
     * Set superficie
     *
     * @param string $superficie
     * @return HojaInspeccion
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
     * Set aislamiento
     *
     * @param boolean $aislamiento
     * @return HojaInspeccion
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
     * Set poblacionHectarea
     *
     * @param string $poblacionHectarea
     * @return HojaInspeccion
     */
    public function setPoblacionHectarea($poblacionHectarea)
    {
        $this->poblacionHectarea = $poblacionHectarea;

        return $this;
    }

    /**
     * Get poblacionHectarea
     *
     * @return string 
     */
    public function getPoblacionHectarea()
    {
        return $this->poblacionHectarea;
    }

    /**
     * Set controlMaleza
     *
     * @param string $controlMaleza
     * @return HojaInspeccion
     */
    public function setControlMaleza($controlMaleza)
    {
        $this->controlMaleza = $controlMaleza;

        return $this;
    }

    /**
     * Get controlMaleza
     *
     * @return string 
     */
    public function getControlMaleza()
    {
        return $this->controlMaleza;
    }

    /**
     * Set controlInsectos
     *
     * @param string $controlInsectos
     * @return HojaInspeccion
     */
    public function setControlInsectos($controlInsectos)
    {
        $this->controlInsectos = $controlInsectos;

        return $this;
    }

    /**
     * Get controlInsectos
     *
     * @return string 
     */
    public function getControlInsectos()
    {
        return $this->controlInsectos;
    }

    /**
     * Set controlEnfermedades
     *
     * @param string $controlEnfermedades
     * @return HojaInspeccion
     */
    public function setControlEnfermedades($controlEnfermedades)
    {
        $this->controlEnfermedades = $controlEnfermedades;

        return $this;
    }

    /**
     * Get controlEnfermedades
     *
     * @return string 
     */
    public function getControlEnfermedades()
    {
        return $this->controlEnfermedades;
    }

    /**
     * Set estadoGeneral
     *
     * @param string $estadoGeneral
     * @return HojaInspeccion
     */
    public function setEstadoGeneral($estadoGeneral)
    {
        $this->estadoGeneral = $estadoGeneral;

        return $this;
    }

    /**
     * Get estadoGeneral
     *
     * @return string 
     */
    public function getEstadoGeneral()
    {
        return $this->estadoGeneral;
    }

    /**
     * Set mezclaVarietal
     *
     * @param string $mezclaVarietal
     * @return HojaInspeccion
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
     * Set mvpi
     *
     * @param string $mvpi
     * @return HojaInspeccion
     */
    public function setMvpi($mvpi)
    {
        $this->mvpi = $mvpi;

        return $this;
    }

    /**
     * Get mvpi
     *
     * @return string 
     */
    public function getMvpi()
    {
        return $this->mvpi;
    }

    /**
     * Set papi
     *
     * @param string $papi
     * @return HojaInspeccion
     */
    public function setPapi($papi)
    {
        $this->papi = $papi;

        return $this;
    }

    /**
     * Get papi
     *
     * @return string 
     */
    public function getPapi()
    {
        return $this->papi;
    }

    /**
     * Set cumpleNorma
     *
     * @param boolean $cumpleNorma
     * @return HojaInspeccion
     */
    public function setCumpleNorma($cumpleNorma)
    {
        $this->cumpleNorma = $cumpleNorma;

        return $this;
    }

    /**
     * Get cumpleNorma
     *
     * @return string
     */
    public function getCumpleNorma()
    {
        return $this->cumpleNorma;
    }

    /**
     * Set personaIndicaciones
     *
     * @param string $personaIndicaciones
     * @return HojaInspeccion
     */
    public function setPersonaIndicaciones($personaIndicaciones)
    {
        $this->personaIndicaciones = $personaIndicaciones;

        return $this;
    }

    /**
     * Get personaIndicaciones
     *
     * @return string 
     */
    public function getPersonaIndicaciones()
    {
        return $this->personaIndicaciones;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return HojaInspeccion
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
     * Set generacionUtilizada
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacionUtilizada
     * @return HojaInspeccion
     */
    public function setGeneracionUtilizada(\Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacionUtilizada = null)
    {
        $this->generacionUtilizada = $generacionUtilizada;

        return $this;
    }

    /**
     * Get generacionUtilizada
     *
     * @return \Iniaf\Bundle\SemillaBundle\Entity\Generacion 
     */
    public function getGeneracionUtilizada()
    {
        return $this->generacionUtilizada;
    }


    /**
     * Set registroCampo
     *
     * @param \Iniaf\Bundle\CertificacionBundle\Entity\RegistroCampo $registroCampo
     * @return HojaInspeccion
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

    /**
     * Set generacionPretendida
     *
     * @param \Iniaf\Bundle\SemillaBundle\Entity\Generacion $generacionPretendida
     * @return HojaInspeccion
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
}
