<?php

namespace Helix\ProjetBundle\Controller;

use Helix\ProjetBundle\Entity\preferences;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Preference controller.
 *
 */
class preferencesController extends Controller
{
    /**
     * Lists all preference entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $preferences = $em->getRepository('HelixProjetBundle:preferences')->findAll();

        return $this->render('@HelixProjet/preferences/index.html.twig', array(
            'preferences' => $preferences,
        ));
    }

    /**
     * Creates a new preference entity.
     *
     */
    public function newAction(Request $request)
    {
        $preference = new Preferences();
        $form = $this->createForm('Helix\ProjetBundle\Form\preferencesType', $preference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preference);
            $em->flush();

            return $this->redirectToRoute('pref_show', array('id' => $preference->getId()));
        }

        return $this->render('@HelixProjet/preferences/new.html.twig', array(
            'preference' => $preference,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a preference entity.
     *
     */
    public function showAction(preferences $preference)
    {
        $deleteForm = $this->createDeleteForm($preference);

        return $this->render('@HelixProjet/preferences/show.html.twig', array(
            'preference' => $preference,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing preference entity.
     *
     */
    public function editAction(Request $request, preferences $preference)
    {
        $deleteForm = $this->createDeleteForm($preference);
        $editForm = $this->createForm('Helix\ProjetBundle\Form\preferencesType', $preference);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pref_edit', array('id' => $preference->getId()));
        }

        return $this->render('@HelixProjet/preferences/edit.html.twig', array(
            'preference' => $preference,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a preference entity.
     *
     */
    public function deleteAction(Request $request, preferences $preference)
    {
        $form = $this->createDeleteForm($preference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($preference);
            $em->flush();
        }

        return $this->redirectToRoute('pref_index');
    }

    /**
     * Creates a form to delete a preference entity.
     *
     * @param preferences $preference The preference entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(preferences $preference)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pref_delete', array('id' => $preference->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
