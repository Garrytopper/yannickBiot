<?php

namespace YB\IxinaBundle\Repository;

/**
 * PrestationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PrestationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllByDate()
    {
        $qb = $this->createQueryBuilder('p');
        $qb->leftJoin('p.client', 'c')
            ->addSelect('c')
            ->orderBy('c.dateLivSouhaite', 'ASC');
        return $qb->getQuery()->getResult();
    }

}