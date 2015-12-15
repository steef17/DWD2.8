<?php

namespace AppBundle\Repository;

/**
 * ParameterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParameterRepository extends \Doctrine\ORM\EntityRepository
{

    public function checkParameters($customerID)
    {

        $points = 0;
        $em = $this->getEntityManager();
        $customer = $em->createQuery('SELECT c FROM AppBundle:Customer c WHERE c.id = :id')
            ->setParameter('id', $customerID)
            ->getSingleResult();
        $points = $points + $this->postcodeParameter($customer->getPostcode());
        $points = $points + $this->cityParameter($customer->getCity());

        return $points;
    }

    public function postcodeParameter($customerPostcode)
    {
        $result = 0;
        $em = $this->getEntityManager();
        $postcodesToCheck = $em->createQuery('SELECT p.rule FROM AppBundle:Parameter p WHERE p.name LIKE :name AND p.rule LIKE :rule')
            ->setParameter('name', 'postcode%')
            ->setParameter('rule', substr($customerPostcode,0,4))
            ->getResult();

        if(count($postcodesToCheck)>0)
        {
            $result = 5;
        }
        return $result;
    }

    public function cityParameter($customerCity)
    {
        $result = 0;
        $em = $this->getEntityManager();
        $cityToCheck = $em->createQuery('SELECT p.rule FROM AppBundle:Parameter p WHERE p.name = :name AND p.rule = :rule')
            ->setParameter('name', 'city')
            ->setParameter('rule', $customerCity)
            ->getResult();

        if(count($cityToCheck)>0){
            $result = 5;
        }
        return $result;

    }

}
