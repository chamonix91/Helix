<?php

namespace Helix\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixBackofficeBundle:Default:index.html.twig');
    }
}
