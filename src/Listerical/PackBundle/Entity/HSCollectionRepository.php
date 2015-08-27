<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\EntityRepository;


class HSCollectionRepository extends EntityRepository
{
    public function findByClass($user, $class = null, $returnCount = false) {
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
        $qb->andWhere($qb->expr()->eq('C.openedBy',':user'));
        $qb->setParameter(':user',$user);
        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }
    }
    public function findByGolden($user, $isGolden = true, $returnCount = false) {
        $qb = $this->createQueryBuilder('C');
        if ($returnCount) {
            $qb->select('count(C)');
        } else {
            $qb->select('C');
        }
        $qb->join('C.card','Cr');
        $qb->andWhere($qb->expr()->eq('C.golden',':isGolden'));
        $qb->andWhere($qb->expr()->eq('C.openedBy',':user'));
        $qb->setParameter(':isGolden',$isGolden);
        $qb->setParameter(':user',$user);

        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }

    }
    public function findByType($user, $type, $returnCount = false) {

        $qb = $this->createQueryBuilder('C');
        if ($returnCount) {
            $qb->select('count(C)');
        } else {
            $qb->select('C');
        }

        $qb->join('C.card','Cr');

        $qb->andWhere($qb->expr()->eq('Cr.rarity',':type'));
        $qb->andWhere($qb->expr()->eq('C.openedBy',':user'));
        $qb->setParameter(':type',$type);
        $qb->setParameter(':user',$user);


        if ($returnCount) {
            return $qb->getQuery()->getSingleScalarResult();
        } else {
            return $qb->getQuery()->getResult();
        }
    }
    public function findOpenedPacks($user) {

        $qs = "SELECT count(DISTINCT P) FROM ListericalPackBundle:HSPack P LEFT JOIN P.cards C WHERE C IS NOT NULL AND P.openedBy = :user ";
        $query = $this->getEntityManager()->createQuery($qs);
        $query->setParameter(':user',$user);


        return $query->getOneOrNullResult();

    }
    public function findMostOpenedCard($user) {
        $qb = $this->createQueryBuilder('C');
        $qb->select('count(C.card) as amount','C');
        $qb->join('C.card','Cr');
        $qb->groupBy('C.card');
        $qb->orderBy('amount','DESC');
        $qb->andWhere($qb->expr()->eq('C.openedBy',':user'));
        $qb->setParameter(':user',$user);
        $return = $qb->getQuery()->getResult();

        return (isset($return[0]) ? $return[0] : null);
    }
}
