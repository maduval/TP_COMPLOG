<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 24/06/2016
     * Time: 15:38
     */

    namespace imie\ComplogBundle\Controller;

    use FOS\RestBundle\Controller\Annotations\View;
    use imie\ComplogBundle\Entity\Invoice;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Security\Core\Exception\AccessDeniedException;
    use Nelmio\ApiDocBundle\Annotation\ApiDoc;
    use imie\ComplogBundle\Entity\CustOrder;

    class CustOrderRestController extends Controller
    {
        /**
         * @param $ref
         *
         * @return mixed
         *
         * @ApiDoc(
         *  resource=true,
         * )
         */
        public function getCustOrderAction($ref){

            $em = $this->getDoctrine()->getManager();

            $order = $em->getRepository('imieComplogBundle:CustOrder')->findOneByRef($ref);
            if(!is_object($order)){
                throw $this->createNotFoundException();
            }
            return $order;
        }

        /**
         * @param $customerId
         *
         * @return int
         *
         * @ApiDoc(
         *  resource=true,
         * )
         */
        public function postCustOrderAction($customerId){

            $em = $this->getDoctrine()->getManager();

            $customer = $em->getRepository('imieComplogBundle:Customer')->findOneById($customerId);
            $repository = $em->getRepository('imieComplogBundle:CustOrder');

            $order = new CustOrder();
            $order->setRef($repository->getNextRef());
            $order->setCustomer($customer);

            $em->persist($order);
            $em->flush();

            return $order;

        }

    }