<?php

namespace Helix\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelixProjetBundle:Default:index.html.twig');
    }
}
