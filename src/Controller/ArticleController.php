<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Form\ArticleEditType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/admin/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_article_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ArticleRepository $articleRepository, SluggerInterface $slugger , FileUploader $fileUploade): Response
    {

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $slug = $slugger->slug($article->getTitre());
            $article->setSlug($slug);
            


            //Upload de l'image
            $ImageFile = $form->get('imagePostFile')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $article->setImagePost($imageFileName);
            }

            $ImageFile = $form->get('imageAgencyPostFile')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $article->setImageAgencyPost($imageFileName);
            }
            $articleRepository->add($article, true);

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_article_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Article $article, ArticleRepository $articleRepository, SluggerInterface $slugger , FileUploader $fileUploade): Response
    {
        $form = $this->createForm(ArticleEditType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugger->slug($article->getTitre());
            $article->setSlug($slug);
            


            //Upload de l'image
            $ImageFile = $form->get('imagePostFile')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $article->setImagePost($imageFileName);
            }

            $ImageFile = $form->get('imageAgencyPostFile')->getData();
            if ($ImageFile) {
                $imageFileName = $fileUploade->upload($ImageFile);
                $article->setImageAgencyPost($imageFileName);
            }
            $articleRepository->add($article, true);

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_article_delete", methods={"POST"})
     */
    public function delete(Request $request, Article $article, ArticleRepository $articleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $articleRepository->remove($article, true);
        }

        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
