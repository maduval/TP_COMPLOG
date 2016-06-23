<?php

namespace imie\ComplogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustOrderDetail
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="imie\ComplogBundle\Entity\CustOrderDetailRepository")
 */
class CustOrderDetail
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
     * @var float
     *
     * @ORM\Column(name="qte", type="float")
     */
    private $qte;


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
     * Set qte
     *
     * @param float $qte
     *
     * @return CustOrderDetail
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return float
     */
    public function getQte()
    {
        return $this->qte;
    }

    //------------------------------
    // RELATIONSHIP BETWEEN ENTITIES
    //------------------------------

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="custOrderDetails")
     * @ORM\JoinColumn(name="Product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="CustOrder", inversedBy="custOrderDetails")
     * @ORM\JoinColumn(name="CustOrder_id", referencedColumnName="id")
     */
    private $custOrder;

    /**
     * @return mixed
     */
    public function getProduct ()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct ( $product )
    {
        $this->product = $product;
    }


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
    public function setCustOrder ( $custOrder ) {
        $this->custOrder = $custOrder;
    }

}

