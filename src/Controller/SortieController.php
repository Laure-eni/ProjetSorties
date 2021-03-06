<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Sortie;
use App\Form\CreerSortieType;
use App\Form\SearchForm;
use App\Repository\EtatRepository;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/home", name="sortie")
     * @param SortieRepository $repository
     * @return Response
     */
    public function index(SortieRepository $repository, Request $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $sorties = $repository->findSearch($data);
        return $this->render('sortie.html.twig', [
            'sorties' => $sorties,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route ("/sorties/add", name="creation_sortie")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(EntityManagerInterface $em, Request $request, EtatRepository $etatRepo)
    {
        $sortie = new sortie();
        $sortie->setOrganisateur($this->getUser());
        $etat = $etatRepo->findOneBy(['libelle'=>'Ouverte']);
        $sortie->setEtat($etat);
        $sortieForm = $this->createForm(CreerSortieType::class, $sortie);


        $sortieForm->handleRequest($request);
        if ($sortieForm->isSubmitted()) {
            $em->persist($sortie);
            $em->flush();
        }


        return $this->render('Form/add.html.twig', [
            "sortieForm" => $sortieForm->createView()
        ]);
    }
}



