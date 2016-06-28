<?php

namespace imie\ComplogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delivery
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="imie\ComplogBundle\Repository\DeliveryRepository")
 */
class Delivery
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
     * @ORM\Column(name="deliveryAt", type="date")
     */
    private $deliveryAt;


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
     * @return Delivery
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
     * Set deliveryAt
     *
     * @param \DateTime $deliveryAt
     *
     * @return Delivery
     */
    public function setDeliveryAt($deliveryAt)
    {
        $this->deliveryAt = $deliveryAt;

        return $this;
    }

    /**
     * Get deliveryAt
     *
     * @return \DateTime
     */
    public function getDeliveryAt()
    {
        return $this->deliveryAt;
    }

    //------------------------------
    // RELATIONSHIP BETWEEN ENTITIES
    //------------------------------

    /**
     * @ORM\ManyToOne(targetEntity="CustOrder", inversedBy="deliveries")
     * @ORM\JoinColumn(name="CustOrder_id", referencedColumnName="id", onDelete="cascade")
     */
    private $custOrder;

    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="deliveries")
     * @ORM\JoinColumn(name="Invoice_id", referencedColumnName="id", onDelete="cascade")
     */
    private $invoice;

    /**
     * @return mixed
     */
    public function getCustOrder ()
    {
        return $this->custOrder;
    }

    /**
     * @param mixed $custOrder
     */
    public function setCustOrder ( $custOrder )
    {
        $this->custOrder = $custOrder;
    }

    /**
     * @return mixed
     */
    public function getInvoice ()
    {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice ( $invoice )
    {
        $this->invoice = $invoice;
    }

}

