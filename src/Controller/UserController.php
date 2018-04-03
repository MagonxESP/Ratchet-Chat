<?php
/**
 * Created by PhpStorm.
 * User: magonxesp
 * Date: 29/03/18
 * Time: 15:50
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller {

    public function login(Request $request, AuthenticationUtils $authUtils) {
        $error = $authUtils->getLastAuthenticationError();
        $lastUserName = $authUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
           'error' => $error,
           'lastusername' => $lastUserName
        ]);
    }

}