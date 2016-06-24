<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 10:02
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\Invoice;

    class LoadInvoiceData extends AbstractFixture implements OrderedFixtureInterface
    {
        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $invoice1 = new Invoice();
            $invoice1->setRef('INVO001');
            $invoice1->setInvoiceAt(new \DateTime('2016-06-18'));

            $manager->persist($invoice1);

            $invoice2 = new Invoice();
            $invoice2->setRef('INVO002');
            $invoice2->setInvoiceAt(new \DateTime('2016-06-21'));

            $manager->persist($invoice2);

            $manager->flush();

            $this->addReference('invoice1', $invoice1);
            $this->addReference('invoice2', $invoice2);
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 3;
        }
    }