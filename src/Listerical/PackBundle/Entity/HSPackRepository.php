<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\EntityRepository;


class HSPackRepository extends EntityRepository
{
    public function findOpenPack() {

        $qs = "SELECT P FROM ListericalPackBundle:HSPack P LEFT JOIN P.cards C WHERE C IS NULL ";
        $query = $this->getEntityManager()->createQuery($qs);

        return $query->getSingleResult();
    }
}
