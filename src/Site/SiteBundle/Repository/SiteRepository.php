<?php

namespace Site\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SiteRepository extends EntityRepository {

    
    public function getSites() {
        $sites = $this->createQueryBuilder('s')
                ->select('s')
        ;
        $return = $sites->getQuery();
        return $return;
    }
}
