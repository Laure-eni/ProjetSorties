<?php
namespace App\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="connexion")
     */
    public function connexion()
    {
        return $this->render("connexion.html.twig");
    }
}