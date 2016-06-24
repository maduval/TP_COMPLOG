<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:58
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\CustOrderDetail;

    class LoadCustOrderDetailData extends AbstractFixture implements OrderedFixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $orderDetail1 = new CustOrderDetail();
            $orderDetail1->setQte('1');
            $orderDetail1->setProduct($this->getReference('product1'));
            $orderDetail1->setCustOrder($this->getReference('order1'));

            $manager->persist($orderDetail1);

            $orderDetail2 = new CustOrderDetail();
            $orderDetail2->setQte('1');
            $orderDetail2->setProduct($this->getReference('product2'));
            $orderDetail2->setCustOrder($this->getReference('order1'));

            $manager->persist($orderDetail2);

            $orderDetail3 = new CustOrderDetail();
            $orderDetail3->setQte('2');
            $orderDetail3->setProduct($this->getReference('product3'));
            $orderDetail3->setCustOrder($this->getReference('order1'));

            $manager->persist($orderDetail3);

            $orderDetail4 = new CustOrderDetail();
            $orderDetail4->setQte('1');
            $orderDetail4->setProduct($this->getReference('product1'));
            $orderDetail4->setCustOrder($this->getReference('order2'));

            $manager->persist($orderDetail4);

            $orderDetail5 = new CustOrderDetail();
            $orderDetail5->setQte('1');
            $orderDetail5->setProduct($this->getReference('product3'));
            $orderDetail5->setCustOrder($this->getReference('order2'));

            $manager->persist($orderDetail5);

            $manager->flush();
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 5;
        }
    }