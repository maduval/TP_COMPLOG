<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 09:28
     */

    namespace imie\ComplogBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use imie\ComplogBundle\Entity\Product;

    class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
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
            $product1->setPrice('150.25');

            $manager->persist($product1);

            $product2 = new Product();
            $product2->setName('All. Cigare Univ.');
            $product2->setDescription('Allume cigare Universel');
            $product2->setPrice('30.99');

            $manager->persist($product2);

            $product3 = new Product();
            $product3->setName('Ess. Glace P206');
            $product3->setDescription('Balais essuie-glace Peugeot 206');
            $product3->setPrice('35.05');

            $manager->persist($product3);

            $manager->flush();

            $this->addReference('product1', $product1);
            $this->addReference('product2', $product2);
            $this->addReference('product3', $product3);
        }

        public function getOrder()
        {
            // the order in which fixtures will be loaded
            // the lower the number, the sooner that this fixture is loaded
            return 1;
        }
    }