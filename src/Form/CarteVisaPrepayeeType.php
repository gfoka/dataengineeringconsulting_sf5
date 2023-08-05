<?php

namespace App\Form;

use App\Entity\CarteVisaPrepayee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use App\Entity\TypeDePieceIdentite;
use App\Entity\TypeDeCarte;

class CarteVisaPrepayeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeDeCarte', EntityType::class,array(
                'label' => 'Type de pièce d\'identité',
                'class' => typeDeCarte::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('df')
                        ->orderBy('df.ordre', 'ASC');
                },
                'empty_data' => '',
                'placeholder' => '',
                'choice_label' => 'libelle',
                'required' =>true,
            ))
            ->add('nom',TextType::class,[
                'label' => 'Nom',
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prénom',
            ])
            ->add('dateDeNaissance',DateType::Class, [
                'label' => 'Date de naissance',
                    'widget' => 'choice',
                    'years' => range(date('Y')-80, date('Y')),
                    ])
            ->add('villeDeNaissance',TextType::class,[
                'label' => 'Ville de naissance du client',
            ])
            ->add('profession',TextType::class,[
                'label' => 'Profession',
            ])
            ->add('nomDuPere',TextType::class,[
                'label' => 'Nom du père',
            ])
            ->add('prenomDuPere',TextType::class,[
                'label' => 'Prénom du père',
            ])
            ->add('nomDeLaMere',TextType::class,[
                'label' => 'Nom de la mère',
            ])
            ->add('prenomDeLaMere',TextType::class,[
                'label' => 'Prénom de la mère',
            ])
            ->add('sexe',ChoiceType::class,[
                'label' => 'Sexe',
                'choices' => [
                    'Masculin' => 'Masculin',
                    'Feminin' => 'Feminin',
                ]])
            ->add('ville',TextType::class,[
                'label' => 'Ville et quartier de la résidence du client',
            ])
            ->add('typepieceidentite', EntityType::class,array(
                'label' => 'Type de pièce d\'identité',
                'class' => TypeDePieceIdentite::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('df')
                        ->orderBy('df.ordre', 'DESC');
                },
                'empty_data' => '',
                'placeholder' => '',
                'choice_label' => 'libelle',
                'required' =>true,
            ))
            ->add('numeroDeCNIOuPassport',TextType::class,[
                'label' => 'Numero de la pièce d\'identité',
            ])
            ->add('numeroIdentifiantUnique',TextType::class,[
                'label' => 'Numéro d\'identifiant unique',
            ])
            ->add('emailClient',EmailType::class,[
                'label' => 'Adresse email du client',
            ])
            ->add('numeroDeTelephone',TextType::class,[
                'label' => 'Numéro de téléphone du client',
            ])
            ->add('numeroDeLaCarteVisaPrepayee',TextType::class,[
                'label' => 'Numéro de la carte VISA prepayée',
            ])
            ->add('precto', FileType::class, [
                'label'  => 'pièce d\'identité recto',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details 
                'required' => false,
                
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes 
                'constraints' => [
                    new File([
                        'maxSize' => '15360k',
                        'mimeTypes' => [
                            "image/png",
                            "image/jpeg",
                            "image/jpg",
                            "image/gif",
                            'application/pdf',
                            'application/x-pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                        ],
                        'mimeTypesMessage' => "Inserer un fichier au format PDF ou image",
                    ])
                ],
            ])
            ->add('pverso', FileType::class, [
                'label'  => 'pièce d\'identité verso',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details 
                'required' => false,
                
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes 
                'constraints' => [
                    new File([
                        'maxSize' => '15360k',
                        'mimeTypes' => [
                            "image/png",
                            "image/jpeg",
                            "image/jpg",
                            "image/gif",
                            'application/pdf',
                            'application/x-pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                        ],
                        'mimeTypesMessage' => "Inserer un fichier au format PDF ou image",
                    ])
                ],
            ])

            ->add('localisation', FileType::class, [
                'label'  => 'Plan de localisation',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details 
                'required' => false,
                
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes 
                'constraints' => [
                    new File([
                        'maxSize' => '15360k',
                        'mimeTypes' => [
                            "image/png",
                            "image/jpeg",
                            "image/jpg",
                            "image/gif",
                            'application/pdf',
                            'application/x-pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                        ],
                        'mimeTypesMessage' => "Inserer un fichier au format PDF ou image",
                    ])
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarteVisaPrepayee::class,
        ]);
    }
}
