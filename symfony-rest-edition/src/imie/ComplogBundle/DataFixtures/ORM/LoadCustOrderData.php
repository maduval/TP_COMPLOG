<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:59
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;


    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\CustOrder;

    class LoadCustOrderData implements FixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            // TODO: Implement load() method.
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 4;
        }
    }