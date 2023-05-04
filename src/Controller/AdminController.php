<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="homepageadmin")
     */ 
    public function index(): Response
    {
        //die('Gilles');
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController', 
        ]);
    }
}
