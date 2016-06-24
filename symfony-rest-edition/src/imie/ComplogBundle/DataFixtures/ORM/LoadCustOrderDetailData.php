<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:58
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;


    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\CustOrderDetail;

    class LoadCustOrderDetailData implements FixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
//            $custOrderLine1 = new CustOrderDetail();
//            $custOrderLine1->setQte('1');
//            $custOrderLine1->setProduct(1);
//            $custOrderLine1->setCustOrder('1');
//
//            $manager->persist($custOrderLine1);
//
//            $custOrderLine2 = new CustOrderDetail();
//            $custOrderLine2->setQte('2');
//            $custOrderLine2->setProduct(3);
//            $custOrderLine2->setCustOrder('1');
//
//            $manager->persist($custOrderLine1);
//
//            $manager->flush();
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 5;
        }
    }