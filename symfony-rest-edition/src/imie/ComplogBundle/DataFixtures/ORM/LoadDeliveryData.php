<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 10:01
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\Delivery;

    class LoadDeliveryData extends AbstractFixture implements OrderedFixtureInterface
    {
        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $delivery1 = new Delivery();
            $delivery1->setRef('DELI001');
            $delivery1->setDeliveryAt(new \DateTime('2016-06-18'));
            $delivery1->setCustOrder($this->getReference('order1'));
            $delivery1->setInvoice($this->getReference('invoice1'));

            $manager->persist($delivery1);

            $delivery2 = new Delivery();
            $delivery2->setRef('DELI002');
            $delivery2->setDeliveryAt(new \DateTime('2016-06-21'));
            $delivery2->setCustOrder($this->getReference('order2'));
            $delivery2->setInvoice($this->getReference('invoice2'));

            $manager->persist($delivery2);

            $manager->flush();
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 6;
        }
    }