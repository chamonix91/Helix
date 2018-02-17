<?php

namespace Helix\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('@HelixFront/Template/index.html.twig');
    }
}
