<?php

namespace imie\ComplogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CustOrder
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="imie\ComplogBundle\Repository\CustOrderRepository")
 */
class CustOrder
{
    //--------------
    // ENTITY FIELDS
    //--------------

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return CustOrder
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CustOrder
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    //------------------------------
    // RELATIONSHIP BETWEEN ENTITIES
    //------------------------------

    /**
     * @ORM\OneToMany(targetEntity="CustOrderDetail", mappedBy="custOrder")
     */
    private $custOrderDetails;

    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="custOrder")
     */
    private $deliveries;


    public function __construct()
    {
        $this->custOrderDetails = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="custOrders")
     * @ORM\JoinColumn(name="Customer_id", referencedColumnName="id", onDelete="cascade")
     */
    private $customer;


    /**
     * @return mixed
     */
    public function getCustOrderDetails ()
    {
        return $this->custOrderDetails;
    }

    /**
     * @param mixed $custOrderDetails
     */
    public function setCustOrderDetails ( $custOrderDetails ) {
        $this->custOrderDetails = $custOrderDetails;
    }

    /**
     * @return mixed
     */
    public function getDeliveries ()
    {
        return $this->deliveries;
    }

    /**
     * @param mixed $deliveries
     */
    public function setDeliveries ( $deliveries )
    {
        $this->deliveries = $deliveries;
    }

    /**
     * @return mixed
     */
    public function getCustomer ()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer ( $customer )
    {
        $this->customer = $customer;
    }
}

