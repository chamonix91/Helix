<?php

namespace Helix\ProjetBundle\Controller;

use Helix\ProjetBundle\Entity\Dossier;
use Helix\ProjetBundle\Entity\Pack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dossier controller.
 *
 */
class DossierController extends Controller
{
    /**
     * Lists all dossier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dossiers = $em->getRepository('HelixProjetBundle:Dossier')->findBy(array('etat'=> 1));

        $best = $em->getRepository('HelixProjetBundle:Dossier')->findby(array(),array('note'=>'desc'));

        return $this->render('@HelixProjet/Dossier/index.html.twig', array(
            'best'=> $best,
            'dossiers' => $dossiers,
        ));
    }

    public function noteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HelixProjetBundle:Dossier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Impossible de trouver ce dossier.');
        }

        $note = $entity->getNote();
        $note = $note + 1;
        $entity->setNote($note);

        $em->persist($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('dossier_show', array('id' => $entity->getId())));
    }

    public function recommandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('HelixProjetBundle:Dossier')->getRecommande();




        return $this->render('@HelixProjet/Dossier/recommande.html.twig', array(
            'dossiers' => $dossier,
        ));
    }

    /**
     * Creates a new dossier entity.
     *
     */
    public function newAction(Request $request)
    {
        $dossier = new Dossier();
        $form = $this->createForm('Helix\ProjetBundle\Form\DossierType', $dossier);
        $form->handleRequest($request);
        $user = $this->getUser();
        $id = $user->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dossier->setIduser($id);
            $em->persist($dossier);
            $em->flush();

            return $this->redirectToRoute('dossier_show', array('id' => $dossier->getId()));
        }

        return $this->render('@HelixProjet/Dossier/new.html.twig', array(
            'dossier' => $dossier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dossier entity.
     *
     */
    public function showAction(Dossier $dossier)
    {
        $deleteForm = $this->createDeleteForm($dossier);

        $em = $this->getDoctrine()->getManager();
        $iduser = $dossier->getIduser();
        $user = $em->getRepository('HelixUserBundle:User')->findOneBy(array('id'=>$iduser));
        $recommande = $em->getRepository('HelixProjetBundle:Dossier') ->findby(array(),array('note'=>'desc'));



        $pack1 = new Pack();
        $pack2 = new Pack();
        $pack3 = new Pack();

        $packs = array();

        if ($dossier->getPack()){
        $idpack1 = $dossier->getPack()->getId();
        $pack1 = $em->getRepository('HelixProjetBundle:Pack') ->findOneBy(array('id'=>$idpack1));
        array_push($packs, $pack1);
        }

        if ($dossier->getPack2()){
            $idpack2 = $dossier->getPack2()->getId();
            $pack2 = $em->getRepository('HelixProjetBundle:Pack') ->findOneBy(array('id'=>$idpack2));
            array_push($packs, $pack2);
        }
        if ($dossier->getPack3()){
            $idpack3 = $dossier->getPack3()->getId();
            $pack3 = $em->getRepository('HelixProjetBundle:Pack') ->findOneBy(array('id'=>$idpack3));
            array_push($packs, $pack3);

        }


        return $this->render('@HelixProjet/Dossier/show.html.twig', array(
            'packs'=>$packs,
            'pack1'=>$pack1,
            'pack2'=>$pack2,
            'pack3'=>$pack3,
            'user' => $user,
            'recommande'=>$recommande,
            'dossier' => $dossier,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    public function userdossierAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $id = $user->getId();

        $dossiers = $em->getRepository('HelixProjetBundle:Dossier')->findBy(array('iduser'=>$id));
        return $this->render('@HelixProjet/Dossier/mesdossiers.html.twig', array(
            'dossiers' => $dossiers,
        ));
    }

    public function allprojectsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dossiers = $em->getRepository('HelixProjetBundle:Dossier')->findAll();
        return $this->render('@HelixProjet/Dossier/allprojects.html.twig', array(
            'dossiers' => $dossiers,
        ));
    }

    /**
     * Displays a form to edit an existing dossier entity.
     *
     */
    public function editAction(Request $request, Dossier $dossier)
    {
        $deleteForm = $this->createDeleteForm($dossier);
        $editForm = $this->createForm('Helix\ProjetBundle\Form\DossierType', $dossier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dossier_edit', array('id' => $dossier->getId()));
        }

        return $this->render('@HelixProjet/Dossier/edit.html.twig', array(
            'dossier' => $dossier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deletelinkAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HelixProjetBundle:Dossier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Impossible de trouver ce dossier.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('dossier_index'));
    }


    public function approbationAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository('HelixProjetBundle:Dossier')->find($id);

        if (!$dossier) {
            throw $this->createNotFoundException('Impossible de trouver ce dossier.');
        }

        $dossier->setEtat(1);
        $em->flush();


        return $this->redirect($this->generateUrl('allprojects'));
    }

    /**
     * Deletes a dossier entity.
     *
     */
    public function deleteAction(Request $request, Dossier $dossier)
    {
        $form = $this->createDeleteForm($dossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dossier);
            $em->flush();
        }

        return $this->redirectToRoute('dossier_index');
    }

    /**
     * Creates a form to delete a dossier entity.
     *
     * @param Dossier $dossier The dossier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dossier $dossier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dossier_delete', array('id' => $dossier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
