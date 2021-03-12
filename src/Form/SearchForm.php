<?php


namespace App\Form;


use App\Data\SearchData;
use App\Entity\Campus;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('query', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])
            ->add('categories', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Categorie::class,
                'expanded' => false,
                'multiple' => true
            ])
            ->add('campus', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Campus::class,
                'expanded' => false,
                'multiple' => true
            ])
            ->add('orga', CheckboxType::class, [
                'label' => 'Sorties dont je suis l\'organisateur',
                'required' => false,
            ])

            ->add('inscrit', CheckboxType::class, [
                'label' => 'Sorties auxquelles je suis inscrit',
                'required' => false,
            ])

            ->add('terminee', CheckboxType::class, [
                'label' => 'Sorties passées',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}