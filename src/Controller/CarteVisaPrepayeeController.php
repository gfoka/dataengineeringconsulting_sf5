<?php

namespace App\Controller;

use App\Entity\CarteVisaPrepayee;
use App\Form\CarteVisaPrepayeeType;
use App\Repository\CarteVisaPrepayeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Dompdf\Dompdf;

/**
 * @Route("/carte/visa/prepayee")
 */
class CarteVisaPrepayeeController extends AbstractController
{

    
    
    /**
     * @Route("/", name="app_carte_visa_prepayee_index", methods={"GET"})
     * @IsGranted("ROLE_CARTE")
     */
    public function index(CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository): Response
    {
        //Utilisateur connecter
        $user = $this->getUser();
        //dump($user);
        //die();
        //Je ne veux que les cartes enregistrées par la carte personne connectées
        return $this->render('carte_visa_prepayee/index.html.twig', [
            'carte_visa_prepayees' => $carteVisaPrepayeeRepository->findBy(
                ["agent"=>$user->getId()],
                ["id"=>"ASC"]
            ),
        ]);
    }

    

    /**
     * @Route("/all", name="app_carte_visa_prepayee_index_all", methods={"GET"})
     * @IsGranted("ROLE_VALID_CARTE")
     */
    public function indexAll(CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository): Response
    {
        //Utilisateur connecter
        $user = $this->getUser();
        //dump($user);
        //die();
        //Je ne veux que les cartes enregistrées par la carte personne connectées
        return $this->render('carte_visa_prepayee/index.html.twig', [
            'carte_visa_prepayees' => $carteVisaPrepayeeRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/new", name="app_carte_visa_prepayee_new", methods={"GET", "POST"})
     * @IsGranted("ROLE_CARTE")
     */
    public function new(Request $request, CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository, SluggerInterface $slugger , FileUploader $fileUploade): Response
    {
        $carteVisaPrepayee = new CarteVisaPrepayee();
        $form = $this->createForm(CarteVisaPrepayeeType::class, $carteVisaPrepayee);
        $user = $this->getUser();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



            $date = new \DateTime();
            $carteVisaPrepayee->setValide(false);
            $carteVisaPrepayee->setDate($date);
            $prectoFile = $form->get('precto')->getData();
            if ($prectoFile) {
                $prectoFileName = $fileUploade->upload($prectoFile);
                $carteVisaPrepayee->setPieceIdentiterecto($prectoFileName );
            }

            $versoFile = $form->get('pverso')->getData();
            if ($versoFile) {
                $versoFileName = $fileUploade->upload($versoFile);
                $carteVisaPrepayee->setPieceIdentiteverso($versoFileName);
            }

            $localisationFile = $form->get('localisation')->getData();
            if ($localisationFile) {
                $localisationFileName = $fileUploade->upload($localisationFile);
                $carteVisaPrepayee->setPlanDeLocalisation($localisationFileName);
            }
            
            $carteVisaPrepayee->setAgent($user);
            $carteVisaPrepayeeRepository->add($carteVisaPrepayee, true);

            return $this->redirectToRoute('app_carte_visa_prepayee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte_visa_prepayee/new.html.twig', [
            'carte_visa_prepayee' => $carteVisaPrepayee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_carte_visa_prepayee_show", methods={"GET"})
     * @IsGranted("ROLE_CARTE")
     */
    public function show(CarteVisaPrepayee $carteVisaPrepayee): Response
    {
        return $this->render('carte_visa_prepayee/show.html.twig', [
            'carte_visa_prepayee' => $carteVisaPrepayee,
        ]); 
    }



    /**
     * @Route("/{id}/edit", name="app_carte_visa_prepayee_edit", methods={"GET", "POST"})
     * @IsGranted("ROLE_CARTE")
     */
    public function edit(Request $request, CarteVisaPrepayee $carteVisaPrepayee, CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository, SluggerInterface $slugger , FileUploader $fileUploade): Response
    {
        $form = $this->createForm(CarteVisaPrepayeeType::class, $carteVisaPrepayee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $prectoFile = $form->get('precto')->getData();
            if ($prectoFile) {
                $prectoFileName = $fileUploade->upload($prectoFile);
                $carteVisaPrepayee->setPieceIdentiterecto($prectoFileName );
            }

            $versoFile = $form->get('pverso')->getData();
            if ($versoFile) {
                $versoFileName = $fileUploade->upload($versoFile);
                $carteVisaPrepayee->setPieceIdentiteverso($versoFileName);
            }

            $localisationFile = $form->get('localisation')->getData();
            if ($localisationFile) {
                $localisationFileName = $fileUploade->upload($localisationFile);
                $carteVisaPrepayee->setPlanDeLocalisation($localisationFileName);
            }

            $carteVisaPrepayeeRepository->add($carteVisaPrepayee, true);

            return $this->redirectToRoute('app_carte_visa_prepayee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte_visa_prepayee/edit.html.twig', [
            'carte_visa_prepayee' => $carteVisaPrepayee,
            'form' => $form,
        ]);
    }



    /**
     * @Route("/{id}/valider", name="app_carte_visa_prepayee_valider", methods={"GET", "POST"})
     * @IsGranted("ROLE_VALID_CARTE")
     */
    public function valider(Request $request, CarteVisaPrepayee $carteVisaPrepayee, CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository, SluggerInterface $slugger , FileUploader $fileUploade,MailerInterface $mailer): Response
    {

        $carteVisaPrepayee->setValide(true);
        $carteVisaPrepayeeRepository->add($carteVisaPrepayee, true);
        $date = $carteVisaPrepayee->getDate();
        //Je dois générer la facture au format PDF
        $data = [
            'imageSrc'  => $this->imageToBase64($this->getParameter('kernel.project_dir') . '/public/img/logo_2.png'),
            'id'   => $carteVisaPrepayee->getId(),
            'nom'         => $carteVisaPrepayee->getNom(),
            'prenom'         => $carteVisaPrepayee->getPrenom(),
            'tel' => $carteVisaPrepayee->getNumeroDeTelephone(),
            'montant' => $carteVisaPrepayee->getMontant(),
            'email'        => $carteVisaPrepayee->getEmailClient(),
            'date'  =>   $date->format('d M Y'),
            'annee'  =>   $date->format('Y'),
            'typedecarte' => $carteVisaPrepayee->getTypeDeCarte()->getLibelle(),
        ];
        $html =  $this->renderView('emails/index.html.twig', $data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        /*
        return new Response (
            $dompdf->stream('facture_carte_VISA_prepayee_UBA', ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );

        die();
        */
        


        //Je doit envoyer un mail pour briffer le client sur l'utilisation de la carte
        $email = (new TemplatedEmail())
            ->from('infos@dataengineeringconsulting.com')
            ->to(new Address(''.$carteVisaPrepayee->getEmailClient()))
            ->subject('Facture carte VISA prepayée')
            // path of the Twig template to render
            ->htmlTemplate('emails/confirmation.html.twig')
            // pass variables (name => value) to the template
            ->attach($dompdf->output(), 'facture_carte_VISA_prepayee_UBA.pdf')
            ->context([
                'name' => $carteVisaPrepayee->getNom()." ".$carteVisaPrepayee->getPrenom(),
                'id' =>  $carteVisaPrepayee->getId(),
            ]);
            $mailer->send($email);

        return $this->redirectToRoute('app_carte_visa_prepayee_show', ['id'=>$carteVisaPrepayee->getId()], Response::HTTP_SEE_OTHER);
    }

    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    /**
     * @Route("/{id}", name="app_carte_visa_prepayee_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, CarteVisaPrepayee $carteVisaPrepayee, CarteVisaPrepayeeRepository $carteVisaPrepayeeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carteVisaPrepayee->getId(), $request->request->get('_token'))) {
            $carteVisaPrepayeeRepository->remove($carteVisaPrepayee, true);
        }

        return $this->redirectToRoute('app_carte_visa_prepayee_index', [], Response::HTTP_SEE_OTHER);
    }
}
