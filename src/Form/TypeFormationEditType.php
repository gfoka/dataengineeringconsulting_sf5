<?php

namespace App\Form;

use App\Entity\TypeFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class TypeFormationEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('description')
            ->add('image', FileType::class, [
                'label' => 'Affiche du type de la formation',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details 
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes 
                'constraints' => [
                    new Assert\Image([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            "image/png",
                            "image/jpeg",
                            "image/jpg",
                            "image/gif"
                        ],
                        'minWidth' => 1200,
                        'maxWidth' => 1200,
                        'minHeight' => 800,
                        'maxHeight' => 800,
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            //->add('photo')
            //->add('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeFormation::class,
        ]);
    }
}
