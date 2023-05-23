<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Form\AuteurEditType;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FileUploader;

/**
 * @Route("/admin/auteur")
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/", name="app_auteur_index", methods={"GET"})
     */
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_auteur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AuteurRepository $auteurRepository, SluggerInterface $slugger, FileUploader $fileUploade): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            

            //Upload de l'image
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $auteur->setPhoto($imageFileName);
            }

            $auteurRepository->add($auteur, true);
            return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteur/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    
    /**
     * @Route("/{id}", name="app_auteur_show", methods={"GET"})
     */
    public function show(Auteur $auteur): Response
    {
        return $this->render('auteur/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_auteur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Auteur $auteur, AuteurRepository $auteurRepository, SluggerInterface $slugger, FileUploader $fileUploade): Response
    {
        $form = $this->createForm(AuteurEditType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Upload de l'image
            $ImageFile = $form->get('image')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $auteur->setPhoto($imageFileName);
            }

            $auteurRepository->add($auteur, true);

            return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteur/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_auteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Auteur $auteur, AuteurRepository $auteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->request->get('_token'))) {
            $auteurRepository->remove($auteur, true);
        }

        return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
