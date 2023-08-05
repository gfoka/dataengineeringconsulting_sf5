<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/adm")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="adm")
     * @IsGranted("ROLE_USER")
     */ 
    public function index(): Response
    {
        //die('Gilles');
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController', 
        ]);
    }
}
