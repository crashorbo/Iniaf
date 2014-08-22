<?php

namespace Iniaf\Bundle\CertificacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InspeccionAlmacen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InspeccionAlmacen
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
     * @var string
     *
     * @ORM\Column(name="numero_lote", type="string", length=255)
     */
    protected $numeroLote;

    /**
     * @var string
     *
     * @ORM\Column(name="aprobado", type="string", length=255)
     */
    protected $aprobado;

    /**
     * @ORM\ManyToOne(targetEntity="Iniaf\Bundle\SemillaBundle\Entity\Generacion")
     */
    protected $generacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="t1", type="integer")
     */
    protected $t1;

    /**
     * @var integer
     *
     * @ORM\Column(name="t2", type="integer")
     */
    protected $t2;

    /**
     * @var integer
     *
     * @ORM\Column(name="t3", type="integer")
     */
    protected $t3;

    /**
     * @var integer
     *
     * @ORM\Column(name="t4", type="integer")
     */
    protected $t4;

    /**
     * @var integer
     *
     * @ORM\Column(name="t5", type="integer")
     */
    protected $t5;

    /**
     * @var integer
     *
     * @ORM\Column(name="peso_bolsa", type="integer")
     */
    protected $pesoBolsa;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_bolsas", type="integer")
     */
    protected $totalBolsas;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje_maximo", type="integer")
     */
    protected $puntajeMaximo;

    /**
     * @var integer
     *
     * @ORM\Column(name="n1", type="integer")
     */
    protected $n1;
    /**
     * @var integer
     *
     * @ORM\Column(name="n2", type="integer")
     */
    protected $n2;
    /**
     * @var integer
     *
     * @ORM\Column(name="n3", type="integer")
     */
    protected $n3;

    /**
     * @var integer
     *
     * @ORM\Column(name="n4", type="integer")
     */
    protected $n4;
    /**
     * @var integer
     *
     * @ORM\Column(name="n5", type="integer")
     */
    protected $n5;
    /**
     * @var integer
     *
     * @ORM\Column(name="n6", type="integer")
     */
    protected $n6;

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
     * Constructor
     */
    public function __construct()
    {
        $this->n1 = 0;
        $this->n2 = 0;
        $this->n3 = 0;
        $this->n4 = 0;
        $this->n5 = 0;
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
     * Set fechaInspeccion
     *
     * @param \DateTime $fechaInspeccion
     * @return InspeccionAlmacen
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
     * Set numeroLote
     *
     * @param string $numeroLote
     * @return InspeccionAlmacen
     */
    public function setNumeroLote($numeroLote)
    {
        $this->numeroLote = $numeroLote;

        return $this;
    }

    /**
     * Get numeroLote
     *
     * @return string 
     */
    public function getNumeroLote()
    {
        return $this->numeroLote;
    }

    /**
     * Set t1
     *
     * @param integer $t1
     * @return InspeccionAlmacen
     */
    public function setT1($t1)
    {
        $this->t1 = $t1;

        return $this;
    }

    /**
     * Get t1
     *
     * @return integer 
     */
    public function getT1()
    {
        return $this->t1;
    }

    /**
     * Set t2
     *
     * @param integer $t2
     * @return InspeccionAlmacen
     */
    public function setT2($t2)
    {
        $this->t2 = $t2;

        return $this;
    }

    /**
     * Get t2
     *
     * @return integer 
     */
    public function getT2()
    {
        return $this->t2;
    }

    /**
     * Set t3
     *
     * @param integer $t3
     * @return InspeccionAlmacen
     */
    public function setT3($t3)
    {
        $this->t3 = $t3;

        return $this;
    }

    /**
     * Get t3
     *
     * @return integer 
     */
    public function getT3()
    {
        return $this->t3;
    }

    /**
     * Set t4
     *
     * @param integer $t4
     * @return InspeccionAlmacen
     */
    public function setT4($t4)
    {
        $this->t4 = $t4;

        return $this;
    }

    /**
     * Get t4
     *
     * @return integer 
     */
    public function getT4()
    {
        return $this->t4;
    }

    /**
     * Set t5
     *
     * @param integer $t5
     * @return InspeccionAlmacen
     */
    public function setT5($t5)
    {
        $this->t5 = $t5;

        return $this;
    }

    /**
     * Get t5
     *
     * @return integer 
     */
    public function getT5()
    {
        return $this->t5;
    }

    /**
     * Set pesoBolsa
     *
     * @param integer $pesoBolsa
     * @return InspeccionAlmacen
     */
    public function setPesoBolsa($pesoBolsa)
    {
        $this->pesoBolsa = $pesoBolsa;

        return $this;
    }

    /**
     * Get pesoBolsa
     *
     * @return integer 
     */
    public function getPesoBolsa()
    {
        return $this->pesoBolsa;
    }

    /**
     * Set totalBolsas
     *
     * @param integer $totalBolsas
     * @return InspeccionAlmacen
     */
    public function setTotalBolsas($totalBolsas)
    {
        $this->totalBolsas = $totalBolsas;

        return $this;
    }

    /**
     * Get totalBolsas
     *
     * @return integer 
     */
    public function getTotalBolsas()
    {
        return $this->totalBolsas;
    }

    /**
     * Set puntajeMaximo
     *
     * @param integer $puntajeMaximo
     * @return InspeccionAlmacen
     */
    public function setPuntajeMaximo($puntajeMaximo)
    {
        $this->puntajeMaximo = $puntajeMaximo;

        return $this;
    }

    /**
     * Get puntajeMaximo
     *
     * @return integer 
     */
    public function getPuntajeMaximo()
    {
        return $this->puntajeMaximo;
    }

    /**
     * Set n1
     *
     * @param integer $n1
     * @return InspeccionAlmacen
     */
    public function setN1($n1)
    {
        $this->n1 = $n1;

        return $this;
    }

    /**
     * Get n1
     *
     * @return integer 
     */
    public function getN1()
    {
        return $this->n1;
    }

    /**
     * Set n2
     *
     * @param integer $n2
     * @return InspeccionAlmacen
     */
    public function setN2($n2)
    {
        $this->n2 = $n2;

        return $this;
    }

    /**
     * Get n2
     *
     * @return integer 
     */
    public function getN2()
    {
        return $this->n2;
    }

    /**
     * Set n3
     *
     * @param integer $n3
     * @return InspeccionAlmacen
     */
    public function setN3($n3)
    {
        $this->n3 = $n3;

        return $this;
    }

    /**
     * Get n3
     *
     * @return integer 
     */
    public function getN3()
    {
        return $this->n3;
    }

    /**
     * Set n4
     *
     * @param integer $n4
     * @return InspeccionAlmacen
     */
    public function setN4($n4)
    {
        $this->n4 = $n4;

        return $this;
    }

    /**
     * Get n4
     *
     * @return integer 
     */
    public function getN4()
    {
        return $this->n4;
    }

    /**
     * Set n5
     *
     * @param integer $n5
     * @return InspeccionAlmacen
     */
    public function setN5($n5)
    {
        $this->n5 = $n5;

        return $this;
    }

    /**
     * Get n5
     *
     * @return integer 
     */
    public function getN5()
    {
        return $this->n5;
    }

    /**
     * Set n6
     *
     * @param integer $n6
     * @return InspeccionAlmacen
     */
    public function setN6($n6)
    {
        $this->n6 = $n6;

        return $this;
    }

    /**
     * Get n6
     *
     * @return integer 
     */
    public function getN6()
    {
        return $this->n6;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return InspeccionAlmacen
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
     * @return InspeccionAlmacen
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
     * @return InspeccionAlmacen
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
     * Set aprobado
     *
     * @param string $aprobado
     * @return InspeccionAlmacen
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return string 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }
}
