<?php

namespace Iniaf\Bundle\SemillaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TarifaRepository extends EntityRepository
{
    public function findPorCultivo($cultivo, $tipo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT t
            FROM SemillaBundle:Tarifa t
            WHERE t.cultivo = :cultivo AND t.tipo = :tipo AND t.estado = :estado
        ');
        $consulta->setParameter('cultivo', $cultivo);
        $consulta->setParameter('tipo', $tipo);
        $consulta->setParameter('estado', 'ACTIVO');
        $consulta->setMaxResults(1);

        return $consulta->getOneOrNullResult();
    }

    public function findPorCultivos($cultivo)
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT t
            FROM SemillaBundle:Tarifa t
            WHERE t.cultivo = :cultivo AND t.estado = :estado
        ');
        $consulta->setParameter('cultivo', $cultivo);
        $consulta->setParameter('estado', 'ACTIVO');
        $consulta->setMaxResults(2);

        return $consulta->getResult();
    }
}