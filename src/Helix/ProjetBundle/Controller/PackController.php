<?php

namespace Helix\ProjetBundle\Controller;

use Helix\ProjetBundle\Entity\Pack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pack controller.
 *
 */
class PackController extends Controller
{
    /**
     * Lists all pack entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $packs = $em->getRepository('HelixProjetBundle:Pack')->findAll();

        return $this->render('HelixProjetBundle:Pack:index.html.twig', array(
            'packs' => $packs,
        ));
    }


    public function userpackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $id = $user->getId();

        $paques = $em->getRepository('HelixProjetBundle:Pack')->findAll();

        $packs[] = array();
        foreach ($paques as $pack){

            $iduser=$pack->getUser();
            if ($iduser == $user){

                array_push($packs,$pack);
            }

        }


            return $this->render('@HelixProjet/Pack/mespacks.html.twig', array(
            'packs' => $packs,
        ));
    }


    /**
     * Creates a new pack entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();




        $pack = new Pack();
        $form = $this->createForm('Helix\ProjetBundle\Form\PackType', $pack);
        $form->handleRequest($request);
        $user= $this->getUser();
        $iduser= $user->getId();
        //$dossier = $em->getRepository('HelixProjetBundle:Dossier')->findBy(array('idUser'=>$iduser));

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $pack->setUser($user);
            $em->persist($pack);
            $em->flush();

            return $this->redirectToRoute('mespacks');
        }

        return $this->render('HelixProjetBundle:Pack:new.html.twig', array(
            'pack' => $pack,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pack entity.
     *
     */
    public function showAction(Pack $pack)
    {
        $deleteForm = $this->createDeleteForm($pack);

        return $this->render('HelixProjetBundle:Pack:show.html.twig', array(
            'pack' => $pack,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pack entity.
     *
     */
    public function editAction(Request $request, Pack $pack)
    {
        $deleteForm = $this->createDeleteForm($pack);
        $editForm = $this->createForm('Helix\ProjetBundle\Form\PackType', $pack);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pack_edit', array('id' => $pack->getId()));
        }

        return $this->render('HelixProjetBundle:Pack:edit.html.twig', array(
            'pack' => $pack,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pack entity.
     *
     */
    public function deleteAction(Request $request, Pack $pack)
    {
        $form = $this->createDeleteForm($pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pack);
            $em->flush();
        }

        return $this->redirectToRoute('pack_index');
    }

    public function deletelinkAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HelixProjetBundle:Pack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Impossible de trouver ce pack.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('mespacks'));
    }


    /**
     * Creates a form to delete a pack entity.
     *
     * @param Pack $pack The pack entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pack $pack)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pack_delete', array('id' => $pack->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
