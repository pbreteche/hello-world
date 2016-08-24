<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 21/07/16
 * Time: 10:10
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{

    /**
     * @Route("/login_check")
     * @Method("POST")
     */
    public function checkAction()
    {
        throw new \Exception('Doit être intercepté par le composant «Security»');
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
        throw new \Exception('Doit être intercepté par le composant «Security»');
    }

    /**
     * @Route("/login")
     * @Method("GET")
     */
    public function loginAction()
    {
        $au = $this->get('security.authentication_utils');

        $lastUsername = $au->getLastUsername();
        $error = $au->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'lastUsername' => $lastUsername,
            'error' => $error,
        ]);
    }
}