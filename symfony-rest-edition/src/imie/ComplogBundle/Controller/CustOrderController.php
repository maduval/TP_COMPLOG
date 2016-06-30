<?php

namespace imie\ComplogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use imie\ComplogBundle\Entity\CustOrder;
use imie\ComplogBundle\Form\CustOrderType;

/**
 * CustOrder controller.
 *
 * @Route("/custorder")
 */
class CustOrderController extends Controller
{

    /**
     * Lists all CustOrder entities.
     *
     * @Route("/", name="custorder")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('imieComplogBundle:CustOrder')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CustOrder entity.
     *
     * @Route("/", name="custorder_create")
     * @Method("POST")
     * @Template("imieComplogBundle:CustOrder:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CustOrder();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('imieComplogBundle:CustOrder');

            $entity->setRef($repository->getNextRef());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('custorder_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a CustOrder entity.
     *
     * @param CustOrder $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CustOrder $entity)
    {
        $form = $this->createForm(new CustOrderType(), $entity, array(
            'action' => $this->generateUrl('custorder_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CustOrder entity.
     *
     * @Route("/new", name="custorder_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CustOrder();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CustOrder entity.
     *
     * @Route("/{id}", name="custorder_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CustOrder entity.
     *
     * @Route("/{id}/edit", name="custorder_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrder entity.');
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
    * Creates a form to edit a CustOrder entity.
    *
    * @param CustOrder $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CustOrder $entity)
    {
        $form = $this->createForm(new CustOrderType(), $entity, array(
            'action' => $this->generateUrl('custorder_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CustOrder entity.
     *
     * @Route("/{id}", name="custorder_update")
     * @Method("PUT")
     * @Template("imieComplogBundle:CustOrder:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('imieComplogBundle:CustOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('custorder_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CustOrder entity.
     *
     * @Route("/{id}", name="custorder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('imieComplogBundle:CustOrder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CustOrder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('custorder'));
    }

    /**
     * Creates a form to delete a CustOrder entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('custorder_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
