<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

//Les entity
use App\Entity\Ecrire;
use App\Entity\Formations;
use App\Entity\Article;

//formulaire
use App\Form\EcrireType;

//Repository
use App\Repository\CategorieFormationRepository;
use App\Repository\FormationsRepository;
use App\Repository\FormateurRepository;
use App\Repository\TypeFormationRepository;
use App\Repository\ArticleRepository;




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
    public function formationAction(Request $request, CategorieFormationRepository $categorieFormationRepository, FormationsRepository $formationsRepository,TypeFormationRepository $typeFormationRepository): Response
    {
        
        $typeFormationUrl = $request->attributes->get('typeformation');
        $categorieFormationURL = $request->attributes->get('categorieformation');

        //Catégories des formations en fonction du type
        $categorieFormations  = $categorieFormationRepository->findBy(array("typeFormation"=>"".$typeFormationUrl));

        //dump($categorieFormationURL);
        //die();

        if($categorieFormationURL==0){
            $formations  = $formationsRepository->findBy(array("categorieFormation"=>$categorieFormations));
        }else{
            $formations  = $formationsRepository->findBy(array("categorieFormation"=>"".$categorieFormationURL));
        }
        $typeFormation = $typeFormationRepository->findOneBy(array('id'=>$typeFormationUrl));
        $categorieformation = $categorieFormationRepository->findOneBy(array('id'=>$categorieFormationURL));
        //die('Les formations de '.$typeFormation.' '.$categorieFormationURL);       
        //dump($typeFormation);
        //die();
        return $this->render('services/formation.html.twig', [
            'categoriesformations' => $categorieFormations,
            'categorieformation' => $categorieformation,
            'formations' => $formations,
            'typeformationurl' => $typeFormationUrl,
            'typeFormation' =>$typeFormation,
            'categorieFormationURL' => $categorieFormationURL
        ]);
    }

    public function formationDetailAction(Request $request, FormationsRepository $formationsRepository, Formations $formations): Response
    {   
        return $this->render('services/formationdetail.html.twig', [
            'formation' => $formations
        ]);
    }


    //____________________________________Les Servvices maintenant_______________________________________________
    public function contactAction(Request $request): Response
    {

        $ecrire = new Ecrire();
        $form = $this->createForm(EcrireType::class, $ecrire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Je doit soumettre dans le base de données et affichier un pop-up de conformations
           die('Je soumet le formulaire');
        }
        
        return $this->render('default/contact.html.twig', [
            'controller_name' => 'DefaultController',
            'form'=> $form->createView()
        ]);
    }

    //____________________________________Les Servvices maintenant_______________________________________________
    public function blogAction(Request $request,  ArticleRepository $articleRepository): Response
    {

        //Je dois lister tout les articles
        $articles  = $articleRepository->findAll();
        
        
        return $this->render('blog/index.html.twig', [
                "articles"=> $articles 
        ]);
    }


    public function lectureAction(Request $request,Article $article,ArticleRepository $articleRepository): Response
    {

        //die();
        //Je dois lister tout les articles
        //$articles  = $articleRepository->findAll();
        
        
        return $this->render('blog/lecture.html.twig', [
                "article"=> $article
        ]);
    }



}
