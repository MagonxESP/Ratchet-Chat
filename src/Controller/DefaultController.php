<?php
/**
 * Created by PhpStorm.
 * User: magonxesp
 * Date: 29/03/18
 * Time: 14:38
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function index() {
        return $this->render('base.html.twig');
    }

}