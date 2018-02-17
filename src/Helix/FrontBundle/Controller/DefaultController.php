<?php

namespace Helix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixFrontBundle:Default:index.html.twig');
    }
}
