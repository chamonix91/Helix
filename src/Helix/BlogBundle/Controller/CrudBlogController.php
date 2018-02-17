<?php

namespace Helix\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CrudBlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('HelixBlogBundle:Blog')->findAll();

        return $this->render('@HelixBlog/Blog/allarticles.html.twig', array(
            'blogs' => $blogs,
        ));

    }

    public function detailAction()
    {
        return $this->render('@HelixBlog/Blog/detailarticle.html.twig');
    }






}
