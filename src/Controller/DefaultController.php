<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

//Les entity
use App\Entity\Ecrire;

//formulaire
use App\Form\EcrireType;

//Repository
use App\Repository\CategorieFormationRepository;
use App\Repository\FormateurRepository;



class DefaultController extends AbstractController
{

    public function index(): Response
    {
        return $this->redirectToRoute('home');
    }


    public function home(): Response
    {
        //die('Hi');
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    public function aboutusAction(): Response
    {
        //die('Hi');
        return $this->render('default/qui_sommes_nous.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    public function barroAction(): Response
    {
        //die('Hi');
        return $this->render('default/barro.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function collectdataappsAction(): Response
    {
        //die('Hi');
        return $this->render('default/collect_data.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function logifirmAction(): Response
    {
        //die('Hi');
        return $this->render('default/logifirm.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function  immobilisationAction(): Response
    {
        //die('Hi');
        return $this->render('default/immobilisation.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    


    //-----------------------------Les Servvices maintenant
    public function webAction(): Response
    {
        //die('Hi');
        return $this->render('services/siteweb.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    public function appliAction(): Response
    {
        //die('Hi');
        return $this->render('services/appli.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    public function infographieAction(): Response
    {
        //die('Hi');
        return $this->render('services/infographie.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    public function hostingAction(): Response
    {
        //die('Hi');
        return $this->render('services/hosting.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    
    //____________________________________Les formations_______________________________________________
    public function formationAction(Request $request, CategorieFormationRepository $categorieFormationRepository): Response
    {
        $typeFormation = $request->attributes->get('typeformation');
        $categorieFormationURL = $request->attributes->get('categorieformation');

        //Catégories des formations en fonction du type
        $categorieFormations  = $categorieFormationRepository->findOneBy(array(
            //"typeformation"=>"".$typeFormation
        ));

        if($categorieFormationURL==0){
            //$formations  = $categorieFormationRepository->findBy(array( "typeformation"=>"".$typeFormation));
        }else{

        }



        die('Les formations de ');       
    }


    //____________________________________Les Servvices maintenant_______________________________________________
    public function contactAction(Request $request): Response
    {

        $ecrire = new Ecrire();
        $form = $this->createForm(EcrireType::class, $ecrire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           die('Je soumet le formulaire');
        }
        
        return $this->render('default/contact.html.twig', [
            'controller_name' => 'DefaultController',
            'form'=> $form->createView()
        ]);
    }



}
