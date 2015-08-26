<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\EntityRepository;


class HSCollectionRepository extends EntityRepository
{
    public function findByClass($class = null, $returnCount = false) {
        //Null = neutral
        $qb = $this->createQueryBuilder('C');
        if ($returnCount) {
            $qb->select('count(C)');
        } else {
            $qb->select('C');
        }

        $qb->join('C.card','Cr');
        if ($class) {
            $qb->andWhere($qb->expr()->eq('Cr.playerClass',':class'));
            $qb->setParameter(':class',$class);
        } else {
            $qb->andWhere($qb->expr()->isNull('Cr.playerClass'));
        }

        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }
    }
    public function findByGolden($isGolden = true, $returnCount = false) {
        $qb = $this->createQueryBuilder('C');
        if ($returnCount) {
            $qb->select('count(C)');
        } else {
            $qb->select('C');
        }
        $qb->join('C.card','Cr');
        $qb->andWhere($qb->expr()->eq('C.golden',':isGolden'));
        $qb->setParameter(':isGolden',$isGolden);

        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }

    }
    public function findByType($type, $returnCount = false) {

        $qb = $this->createQueryBuilder('C');
        if ($returnCount) {
            $qb->select('count(C)');
        } else {
            $qb->select('C');
        }

        $qb->join('C.card','Cr');

        $qb->andWhere($qb->expr()->eq('Cr.rarity',':type'));
        $qb->setParameter(':type',$type);


        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }
    }
    public function findOpenedPacks() {
        /*
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(P)');
        $qb->from('ListericalPackBundle:HSPack','P');
        $qb->join('P.cards','C');
        $qb->where($qb->expr()->isNotNull('P.cards'));
*/
        $qs = "SELECT count(DISTINCT P) FROM ListericalPackBundle:HSPack P LEFT JOIN P.cards C WHERE C IS NOT NULL ";
        $query = $this->getEntityManager()->createQuery($qs);


        return $query->getSingleScalarResult();

    }
    public function findMostOpenedCard() {
        $qb = $this->createQueryBuilder('C');
        $qb->select('count(C.card) as amount','C');
        $qb->join('C.card','Cr');
        $qb->groupBy('C.card');
        $qb->orderBy('amount','DESC');

        $return = $qb->getQuery()->getResult();

        return (isset($return[0]) ? $return[0] : null);
    }
}
