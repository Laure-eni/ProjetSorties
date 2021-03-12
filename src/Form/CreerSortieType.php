<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Categorie;
use App\Entity\Lieu;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreerSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie : '
            ])
            ->add('dateHeureDebut', DateType::class)
            ->add('duree', TextType::class, [
                'label' => 'Durée : '
            ])
            ->add('dateLimiteInscription', DateType::class)
            ->add('nbInscriptionsMax', IntegerType::class, [
                'label' => 'Nombre de places : '
            ])
            ->add('infosSortie', TextareaType::class, [
                'label' => 'Description et infos : '
            ])
            ->add('campusSortie', EntityType::class, [
                'label' => 'Campus : ',
                'class' => Campus::class,
                'choice_label' => 'nomCampus',
            ])
            ->add('lieu', EntityType::class, [
                'label' => 'Lieu : ',
                'class' => Lieu::class,
                'choice_label' => 'nom',
            ])
            ->add('categorie', EntityType::class, [
                'label' => 'Catégorie : ',
                'class' => Categorie::class,
                'choice_label' => 'catName',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
