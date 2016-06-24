<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 10:00
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\Customer;

    class LoadCustomerData extends AbstractFixture implements OrderedFixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $customer1 = new Customer();
            $customer1->setRef('CUST001');
            $customer1->setName('Paul Dupont');
            $customer1->setAddress('4 rue de la paix');
            $customer1->setPostalCode('35670');
            $customer1->setCity('Montgermont');
            $customer1->setTelephone('07 07 07 06 06');
            $customer1->setEmail('paul.dupont@complog.com');

            $manager->persist($customer1);

            $customer2 = new Customer();
            $customer2->setRef('CUST002');
            $customer2->setName('Marie Martin');
            $customer2->setAddress('35 rue de la mer');
            $customer2->setPostalCode('44210');
            $customer2->setCity('Pornic');
            $customer2->setTelephone('06 06 06 08 08');
            $customer2->setEmail('marie.martin@complog.com');

            $manager->persist($customer2);

            $manager->flush();

            $this->addReference('customer1', $customer1);
            $this->addReference('customer2', $customer2);

        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 2;
        }
    }