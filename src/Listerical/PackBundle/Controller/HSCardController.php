<?php

namespace Listerical\PackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Listerical\PackBundle\Entity\HSCard;
use Listerical\PackBundle\Form\HSCardType;

/**
 * HSCard controller.
 *
 * @Route("/hscard")
 */
class HSCardController extends Controller
{

    /**
     * Lists all HSCard entities.
     *
     * @Route("/list", name="hscard")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ListericalPackBundle:HSCard')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new HSCard entity.
     *
     * @Route("/create", name="hscard_create")
     * @Method("POST")
     * @Template("ListericalPackBundle:HSCard:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new HSCard();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hscard_show', array('id' => $entity->getCardId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a HSCard entity.
     *
     * @param HSCard $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(HSCard $entity)
    {
        $form = $this->createForm(new HSCardType(), $entity, array(
            'action' => $this->generateUrl('hscard_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new HSCard entity.
     *
     * @Route("/new", name="hscard_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new HSCard();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a HSCard entity.
     *
     * @Route("/{id}", name="hscard_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ListericalPackBundle:HSCard')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HSCard entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing HSCard entity.
     *
     * @Route("/{id}/edit", name="hscard_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ListericalPackBundle:HSCard')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HSCard entity.');
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
    * Creates a form to edit a HSCard entity.
    *
    * @param HSCard $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(HSCard $entity)
    {
        $form = $this->createForm(new HSCardType(), $entity, array(
            'action' => $this->generateUrl('hscard_update', array('id' => $entity->getCardId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing HSCard entity.
     *
     * @Route("/{id}", name="hscard_update")
     * @Method("PUT")
     * @Template("ListericalPackBundle:HSCard:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ListericalPackBundle:HSCard')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HSCard entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('hscard_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a HSCard entity.
     *
     * @Route("/{id}", name="hscard_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ListericalPackBundle:HSCard')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find HSCard entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hscard'));
    }

    /**
     * Creates a form to delete a HSCard entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hscard_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
