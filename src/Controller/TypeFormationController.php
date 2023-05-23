<?php

namespace App\Controller;

use App\Entity\TypeFormation;
use App\Form\TypeFormationType;
use App\Form\TypeFormationEditType;
use App\Repository\TypeFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FileUploader;

/**
 * @Route("/admin/type/formation")
 */
class TypeFormationController extends AbstractController
{
    /**
     * @Route("/", name="app_type_formation_index", methods={"GET"})
     */
    public function index(TypeFormationRepository $typeFormationRepository): Response
    {
        return $this->render('type_formation/index.html.twig', [
            'type_formations' => $typeFormationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_type_formation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TypeFormationRepository $typeFormationRepository, SluggerInterface $slugger, FileUploader $fileUploade): Response
    {
        $typeFormation = new TypeFormation();
        $form = $this->createForm(TypeFormationType::class, $typeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeFormation->setSlug( $slugger->slug($typeFormation->getLibelle()));

            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $typeFormation->setPhoto($imageFileName);
            }
            $typeFormationRepository->add($typeFormation, true);

            return $this->redirectToRoute('app_type_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_formation/new.html.twig', [
            'type_formation' => $typeFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_formation_show", methods={"GET"})
     */
    public function show(TypeFormation $typeFormation): Response
    {
        return $this->render('type_formation/show.html.twig', [
            'type_formation' => $typeFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_type_formation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeFormation $typeFormation, TypeFormationRepository $typeFormationRepository, SluggerInterface $slugger, FileUploader $fileUploade): Response
    {
        $form = $this->createForm(TypeFormationEditType::class, $typeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $typeFormation->setSlug( $slugger->slug($typeFormation->getLibelle()));

            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $typeFormation->setPhoto($imageFileName);
            }
            $typeFormationRepository->add($typeFormation, true);

            return $this->redirectToRoute('app_type_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_formation/edit.html.twig', [
            'type_formation' => $typeFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_formation_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeFormation $typeFormation, TypeFormationRepository $typeFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeFormation->getId(), $request->request->get('_token'))) {
            $typeFormationRepository->remove($typeFormation, true);
        }

        return $this->redirectToRoute('app_type_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
