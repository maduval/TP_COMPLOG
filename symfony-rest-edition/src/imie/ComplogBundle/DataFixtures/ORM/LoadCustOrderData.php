<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:59
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\CustOrder;
    use Symfony\Component\Validator\Constraints\Date;
    use Symfony\Component\Validator\Constraints\DateTime;

    class LoadCustOrderData extends AbstractFixture implements OrderedFixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $order1 = new CustOrder();
            $order1->setRef('ORDE001');
            $order1->setCreatedAt(new \DateTime('2016-06-15'));
            $order1->setCustomer($this->getReference('customer1'));

            $manager->persist($order1);

            $order2 = new CustOrder();
            $order2->setRef('ORDE002');
            $order2->setCreatedAt(new \DateTime('2016-06-17'));
            $order2->setCustomer($this->getReference('customer2'));

            $manager->persist($order2);

            $manager->flush();

            $this->addReference('order1', $order1);
            $this->addReference('order2', $order2);
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 4;
        }
    }