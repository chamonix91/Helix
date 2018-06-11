<?php

namespace Helix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('@HelixFront/Template/index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@HelixFront/Template/AboutUs.html.twig');
    }

    public function erreuraddprojectAction()
    {
        return $this->render('@HelixFront/Template/ErreurAddProject.html.twig');
    }




    public function allsponsorAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sponsors = $em->getRepository('HelixUserBundle:User')->findAll();



        return $this->render('@HelixFront/Template/allsponsors.html.twig', array(
            'sponsors' => $sponsors,
        ));
    }
}
