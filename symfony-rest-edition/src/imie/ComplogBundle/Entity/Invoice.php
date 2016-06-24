<?php

namespace imie\ComplogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Invoice
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="imie\ComplogBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="invoiceAt", type="date")
     */
    private $invoiceAt;


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
     * @return Invoice
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
     * Set invoiceAt
     *
     * @param \DateTime $invoiceAt
     *
     * @return Invoice
     */
    public function setInvoiceAt($invoiceAt)
    {
        $this->invoiceAt = $invoiceAt;

        return $this;
    }

    /**
     * Get invoiceAt
     *
     * @return \DateTime
     */
    public function getInvoiceAt()
    {
        return $this->invoiceAt;
    }

    //------------------------------
    // RELATIONSHIP BETWEEN ENTITIES
    //------------------------------

    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="invoice")
     */
    private $deliveries;


    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
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

}

