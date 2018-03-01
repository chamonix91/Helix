<?php

namespace Helix\ProjetBundle\Controller;

use Helix\ProjetBundle\Entity\PackUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function newAction(Request $request)
    {
        $pack = new PackUser();
        $form = $this->createForm('Helix\ProjetBundle\Form\PackuserType', $pack);
        $form->handleRequest($request);
        $user= $this->getUser();
        $iduser= $user->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($pack);
            $em->flush();

            return $this->redirectToRoute('pack_show', array('id' => $pack->getId()));
        }

        return $this->render('HelixProjetBundle:Default:index.html.twig', array(
            'pack' => $pack,
            'form' => $form->createView(),
        ));
    }
}
