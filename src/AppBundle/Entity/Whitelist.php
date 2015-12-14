<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Whitelist
 *
 * @ORM\Table(name="whitelist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WhitelistRepository")
 */
class Whitelist
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customerID", referencedColumnName="id")
     */
    private $customerID;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Parameter")
     * @ORM\JoinColumn(name="parameterID", referencedColumnName="id")
     */
    private $parameterID;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customerID
     *
     * @param integer $customerID
     *
     * @return Whitelist
     */
    public function setCustomerID($customerID)
    {
        $this->customerID = $customerID;

        return $this;
    }

    /**
     * Get customerID
     *
     * @return int
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * Set parameterID
     *
     * @param integer $parameterID
     *
     * @return Whitelist
     */
    public function setParameterID($parameterID)
    {
        $this->parameterID = $parameterID;

        return $this;
    }

    /**
     * Get parameterID
     *
     * @return int
     */
    public function getParameterID()
    {
        return $this->parameterID;
    }
}
