<?php
namespace App\Form;
use App\Entity\Campus;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo',TextType::class)
            ->add('Prenom',TextType::class)
            ->add('Nom', TextType::class)
            ->add('telephone',TextType::class)
            ->add('mail',EmailType::class)
            ->add('noCampus', EntityType::class, [
                'label' => 'Votre Campus : ',
                'class' => Campus::class,
                'choice_label' => 'nomCampus',
            ])
            ->add('administrateur', TextType::class)
            ->add('MotDePasse', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'confirmer mot de passe'],
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class'=>Participant::class
        ]);
    }
}
