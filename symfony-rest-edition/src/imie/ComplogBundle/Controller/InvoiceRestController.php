<?php
    /**
     * Created by PhpStorm.
     * User: Mathilde
     * Date: 30/06/2016
     * Time: 17:52
     */

    namespace imie\ComplogBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use FOS\RestBundle\Controller\Annotations\View;
    use Symfony\Component\Security\Core\Exception\AccessDeniedException;
    use Nelmio\ApiDocBundle\Annotation\ApiDoc;
    use imie\ComplogBundle\Entity\Invoice;

    class InvoiceRestController extends Controller
    {

        /**
         * @param $ref
         *
         * @return mixed
         *
         * @ApiDoc(
         *     resource=true,
         * )
         */
        public function getInvoiceAction($ref){

            $em = $this->getDoctrine()->getManager();

            $invoice = $em->getRepository('imieComplogBundle:Invoice')->findOneByRef($ref);
            if(!is_object($invoice)){
                throw $this->createNotFoundException();
            }
            return $invoice;
        }

        /**
         * @return Invoice
         *
         * @ApiDoc(
         *     resource=true,
         * )
         */
        public function postInvoiceAction(){

            $em = $this->getDoctrine()->getManager();

            $repository = $em->getRepository('imieComplogBundle:Invoice');

            $invoice = new Invoice();
            $invoice->setRef($repository->getNextRef());

            $em->persist($invoice);
            $em->flush();

            return $invoice;

        }

    }