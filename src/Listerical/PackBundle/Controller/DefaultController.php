<?php

namespace Listerical\PackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ListericalPackBundle:Default:index.html.twig', array('name' => $name));
    }
}
