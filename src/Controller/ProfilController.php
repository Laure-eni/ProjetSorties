<?php
namespace App\Controller;
use App\Entity\Participant;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route ("/Profil", name="Profil")
     */
    public function profil(EntityManagerInterface $em, Request $request)
    {
        $participant=$this->getUser();
        $ProfilForm = $this->createForm(ProfilType::class, $participant);

        $ProfilForm->handleRequest($request);
        if ($ProfilForm->isSubmitted() && $ProfilForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($participant);
            $em->flush();

            $this->addFlash('success', 'Votre compte à bien été modifié.');
        }

            return $this->render('Form/profil.html.twig', [
                "ProfilForm" => $ProfilForm->createView()
            ]);}

 }


