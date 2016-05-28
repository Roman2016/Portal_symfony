<?php

namespace PortalBundle\Controller;

use PortalBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        //print_r($errors);
        if(!empty($request->request->get('password')))
        {
            echo 'vjfvfkj';
            $user = new Users();

            $password = $request->request->get('password');
            $email = $request->request->get('email');

            $user
                ->setUserName('name')
                ->setUserPassword($password)
                ->setUserEmail($email)
                ->setUserRegistrationDate(new \DateTime())
                ->setUserLastVisitDate(new \DateTime());

            $validator = $this->get('validator');
            $errors = $validator->validate($user);

            if (count($errors) > 0)
            {
                $errorsString = (string) $errors;
                return new Response($errorsString);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render('PortalBundle:Default:index.html.twig');
    }
}
