<?php

namespace Helix\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('@HelixBackoffice/Back/dashboard.html.twig');
    }
}
