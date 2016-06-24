<?php

namespace imie\ComplogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use imie\ComplogBundle\Entity\CustOrderDetail;
use imie\ComplogBundle\Form\CustOrderDetailType;

/**
 * CustOrderDetail controller.
 *
 * @Route("/custorderdetail")
 */
class CustOrderDetailController extends Controller
{

    /**
     * Lists all CustOrderDetail entities.
     *
     * @Route("/", name="custorderdetail")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('imieComplogBundle:CustOrderDetail')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CustOrderDetail entity.
     *
     * @Route("/", name="custorderdetail_create")
     * @Method("POST")
     * @Template("imieComplogBundle:CustOrderDetail:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CustOrderDetail();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('custorderdetail_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a CustOrderDetail entity.
     *
     * @param CustOrderDetail $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CustOrderDetail $entity)
    {
        $form = $this->createForm(new CustOrderDetailType(), $entity, array(
            'action' => $this->generateUrl('custorderdetail_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CustOrderDetail entity.
     *
     * @Route("/new", name="custorderdetail_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CustOrderDetail();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CustOrderDetail entity.
     *
     * @Route("/{id}", name="custorderdetail_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrderDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrderDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CustOrderDetail entity.
     *
     * @Route("/{id}/edit", name="custorderdetail_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrderDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrderDetail entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a CustOrderDetail entity.
    *
    * @param CustOrderDetail $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CustOrderDetail $entity)
    {
        $form = $this->createForm(new CustOrderDetailType(), $entity, array(
            'action' => $this->generateUrl('custorderdetail_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CustOrderDetail entity.
     *
     * @Route("/{id}", name="custorderdetail_update")
     * @Method("PUT")
     * @Template("imieComplogBundle:CustOrderDetail:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrderDetail')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrderDetail entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('custorderdetail_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CustOrderDetail entity.
     *
     * @Route("/{id}", name="custorderdetail_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('imieComplogBundle:CustOrderDetail')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CustOrderDetail entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('custorderdetail'));
    }

    /**
     * Creates a form to delete a CustOrderDetail entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('custorderdetail_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
