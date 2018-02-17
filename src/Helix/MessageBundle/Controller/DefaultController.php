<?php

namespace Helix\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixMessageBundle:Default:index.html.twig');
    }
}
