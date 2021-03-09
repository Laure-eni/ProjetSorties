<?php

namespace App\Controller;

use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/home", name="sortie")
     * @param SortieRepository $repository
     * @return Response
     */
    public function index(SortieRepository $repository): Response
    {
        $sorties = $repository->findSearch();
        return $this->render('sortie.html.twig', [
           'sorties' => $sorties,
        ]);



    }
}
