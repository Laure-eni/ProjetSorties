<?php
namespace App\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route ("/", name="login")
     */

    public function login()
    {
        return $this->render("connexion.html.twig");
    }

    /**
     * @Route ("/home", name="home")
     */

    public function home()
    {
        return $this->render("home.html.twig");
    }


}