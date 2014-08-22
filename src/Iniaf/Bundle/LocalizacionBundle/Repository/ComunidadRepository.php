<?php

namespace Iniaf\Bundle\LocalizacionBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Iniaf\Bundle\LocalizacionBundle\Entity\Municipio;

/**
 * CityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComunidadRepository extends EntityRepository
{
    public function findByValidar(Municipio $municipio, $comunidad)
    {
        $query = $this->getEntityManager()->createQuery("
            SELECT com
            FROM LocalizacionBundle:Comunidad as com
            WHERE com.nombre = :comunidad AND com.municipio = :municipio
        ")->setParameter('comunidad', $comunidad)
          ->setParameter('municipio', $municipio->getId());

        return $query->getResult();
    }
}