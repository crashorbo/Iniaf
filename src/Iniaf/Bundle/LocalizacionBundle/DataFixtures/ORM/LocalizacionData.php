<?php

namespace Iniaf\Bundle\LocalizacionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iniaf\Bundle\LocalizacionBundle\Entity\Departamento;
use Iniaf\Bundle\LocalizacionBundle\Entity\Municipio;
use Iniaf\Bundle\LocalizacionBundle\Entity\Provincia;

class LocalizacionData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $departamentos = array(
            array('nombre'    =>  'ORURO', 'provincias' => array(
                array('nombre' => 'CERCADO', 'municipios' => array(
                    array('nombre' => 'PARIA'))),
                array('nombre' => 'PANTALEON DALENCE', 'municipios' => array())
            )),
            array('nombre'    =>'LA PAZ', 'provincias' => array()),
            array('nombre'    =>'TARIJA', 'provincias' => array(
                array('nombre' => 'CERCADO', 'municipios' => array(
                    array('nombre' => 'TARIJA'))),
                array('nombre' => 'MENDEZ', 'municipios' => array(
                    array('nombre' => 'SAN LORENZO'),
                    array('nombre' => 'EL PUENTE'))),
                array('nombre' => 'AVILES', 'municipios' => array(
                    array('nombre' => 'CONCEPCION'),
                    array('nombre' => 'YUNCHARA'))),
                array('nombre' => 'ARCE', 'municipios' => array(
                    array('nombre' => 'PADCAYA'),
                    array('nombre' => 'BERMEJO'))),
                array('nombre' => 'OCONNOR', 'municipios' => array(
                    array('nombre' => 'ENTRE RIOS'))),
                array('nombre' => 'GRAN CHACO', 'municipios' => array(
                    array('nombre' => 'YACUIBA'),
                    array('nombre' => 'VILLAMONTES'),
                    array('nombre' => 'CARAPARI'))),
            )),
            array('nombre'    =>'COCHABAMBA', 'provincias' => array()),
            array('nombre'    =>'CHUQUISACA', 'provincias' => array()),
            array('nombre'    =>'POTOSI',     'provincias' => array()),
            array('nombre'    =>'SANTA CRUZ', 'provincias' => array()),
            array('nombre'    =>'BENI',       'provincias' => array()),
            array('nombre'    =>'PANDO',      'provincias' => array())
        );

        foreach($departamentos as $d){
           $departamento = new Departamento();
           $departamento->setNombre($d['nombre']);
           $manager->persist($departamento);
           foreach($d['provincias'] as $p)
           {
               $provincia = new Provincia();
               $provincia->setNombre($p['nombre']);
               $provincia->setDepartamento($departamento);
               $manager->persist($provincia);
               foreach($p['municipios'] as $m)
               {
                   $municipio = new Municipio();
                   $municipio->setNombre($m['nombre']);
                   $municipio->setProvincia($provincia);
                   $manager->persist($municipio);
               }
           }
        }
        $manager->flush();
    }
}