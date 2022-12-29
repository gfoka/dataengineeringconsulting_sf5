<?php

namespace App\Form;
use App\Entity\Ecrire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VictorPrdh\RecaptchaBundle\Form\ReCaptchaType;

class EcrireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('message')
            ->add('captcha',ReCaptchaType::class,[
                //'label' => 'aca.nationalite',
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ecrire::class,
        ]);
    }
}
