<?php

namespace Helix\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixBlogBundle:Default:index.html.twig');
    }
}
