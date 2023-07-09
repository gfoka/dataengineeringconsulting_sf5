<?php

namespace App\Controller;

use App\Entity\SessionFormation;
use App\Form\SessionFormationType;
use App\Repository\SessionFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Formations;

/**
 * @Route("/admin/session/formation")
 */
class SessionFormationController extends AbstractController
{
    /**
     * @Route("/{id}", name="app_session_formation_index", methods={"GET"})
     */
    public function index(Formations $formation, SessionFormationRepository $sessionFormationRepository): Response
    {
        
        return $this->render('session_formation/index.html.twig', [
            'formation_id' =>$formation->getId(),
            'session_formations' => $sessionFormationRepository->findBy(
                array("formation"=>$formation->getId()),
                array('id' => 'DESC'),
                5,
            ),
        ]);
    }

    /**
     * @Route("/{id}/new", name="app_session_formation_new", methods={"GET", "POST"})
     */
    public function new(Formations $formation,Request $request, SessionFormationRepository $sessionFormationRepository): Response
    {
        
        $sessionFormation = new SessionFormation();
        $form = $this->createForm(SessionFormationType::class, $sessionFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionFormation->setFormation($formation);
            $sessionFormationRepository->add($sessionFormation, true);


            return $this->redirectToRoute('app_session_formation_index', ["id"=>$formation->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('session_formation/new.html.twig', [
            'session_formation' => $sessionFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_session_formation_show", methods={"GET"})
     */
    public function show(SessionFormation $sessionFormation): Response
    {
        return $this->render('session_formation/show.html.twig', [
            'session_formation' => $sessionFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_session_formation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SessionFormation $sessionFormation, SessionFormationRepository $sessionFormationRepository): Response
    {
        $form = $this->createForm(SessionFormationType::class, $sessionFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionFormationRepository->add($sessionFormation, true);

            return $this->redirectToRoute('app_session_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('session_formation/edit.html.twig', [
            'session_formation' => $sessionFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_session_formation_delete", methods={"POST"})
     */
    public function delete(Request $request, SessionFormation $sessionFormation, SessionFormationRepository $sessionFormationRepository): Response
    {
        $idFormation = $sessionFormation->getFormation()->getId();
        if ($this->isCsrfTokenValid('delete'.$sessionFormation->getId(), $request->request->get('_token'))) {
            $sessionFormationRepository->remove($sessionFormation, true);
        }

        return $this->redirectToRoute('app_session_formation_index', ["id"=>$idFormation], Response::HTTP_SEE_OTHER);
    }
}
