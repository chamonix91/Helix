<?php

namespace Helix\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixUserBundle:Default:index.html.twig');
    }
}
