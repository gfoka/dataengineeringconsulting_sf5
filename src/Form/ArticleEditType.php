<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('chapeau')
            ->add('slug')
            ->add('dateCreation')
            ->add('imagePostFile', FileType::class, [
                'label' => 'Add imagePost',

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
                        'minWidth' => 870,
                        'maxWidth' => 870,
                        'minHeight' => 320,
                        'maxHeight' => 320,
                        'mimeTypesMessage' => 'Chargé une image de dimansion 870 X 320',
                    ])
                ],
            ])
            ->add('imageAgencyPostFile', FileType::class, [
                'label' => 'Add imagePost',

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
                        'minWidth' => 760,
                        'maxWidth' => 760,
                        'minHeight' => 702,
                        'maxHeight' => 702,
                        'mimeTypesMessage' => 'Chargé une image de dimansion 870 X 320',
                    ])
                ],
            ])
            ->add('categorie')
            ->add('auteur')
            ->add('contenu',CKEditorType::class)
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
