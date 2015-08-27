<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\EntityRepository;


class HSPackRepository extends EntityRepository
{
    public function findOpenPack($user) {

        $qs = "SELECT P FROM ListericalPackBundle:HSPack P LEFT JOIN P.cards C WHERE C IS NULL AND P.openedBy = :user";

        $query = $this->getEntityManager()->createQuery($qs);
        $query->setParameter(':user',$user);
        return $query->getOneOrNullResult();
    }
}
