<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:28
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;


    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\Product;

    class LoadProductData implements FixtureInterface
    {

        /**
         * Load data fixtures with the passed EntityManager
         *
         * @param ObjectManager $manager
         */
        public function load ( ObjectManager $manager )
        {
            $product1 = new Product();
            $product1->setName('Phare RCl3');
            $product1->setDescription('Phare Renault Clio3');
            $product1->setPrice('150');

            $manager->persist($product1);
            $manager->flush();
        }
    }