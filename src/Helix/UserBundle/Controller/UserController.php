<?php

namespace Helix\UserBundle\Controller;

use Helix\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('HelixUserBundle:User')->findBy(array('enabled'=>'1'));

        return $this->render('@HelixUser/user/index.html.twig', array(
            'users' => $users,
        ));
    }

    public function allsponsorsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('HelixUserBundle:User')->findAll();

        return $this->render('@HelixUser/user/allsponsors.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('Helix\UserBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('@HelixUser/user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new user entity.
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSponsorAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm('Helix\UserBundle\Form\RegistrationType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setRoles(array('ROLE_SPONSOR'));
            $user->setEnabled(1);
            $user->setType("silver");
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('@HelixUser/Registration/RegistrationSponsor.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('@HelixUser/user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function bannirAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('HelixUserBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Impossible de trouver cet utilisateur.');
        }

        $user->setEnabled(false);
        $em->flush();



        return $this->redirect($this->generateUrl('ban'));
    }

    public function toGoldAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('HelixUserBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Impossible de trouver cet utilisateur.');
        }

        $user->setType('gold');
        $em->flush();



        return $this->redirect($this->generateUrl('allSponsors'));
    }

    public function toPremiumAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('HelixUserBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Impossible de trouver cet utilisateur.');
        }

        $user->setType('premium');
        $em->flush();



        return $this->redirect($this->generateUrl('ban'));
    }

    /**
     * Displays a form to edit an existing user entity.
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('Helix\UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }


        return $this->render('@HelixUser/user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function blockedUserAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('HelixUserBundle:User')->findby(array('enabled'=> '0'));


        return $this->render('@HelixUser/user/ban.html.twig', array(
            'users' => $users,
        ));


    }
}
