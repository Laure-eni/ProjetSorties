<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\CreerSortieType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
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


    /**
     * @Route ("/sorties/add", name="creation_sortie")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(EntityManagerInterface $em)
    {
        $sortie = new sortie();
        $sortieForm = $this->createForm(CreerSortieType::class, $sortie);

        return $this->render('Form/add.html.twig', [
            "sortieForm" => $sortieForm->createView()
        ]);
    }


}
