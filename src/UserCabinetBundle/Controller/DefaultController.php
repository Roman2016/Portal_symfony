<?php

namespace UserCabinetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserCabinetBundle:Default:index.html.twig');
    }
}
