<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Article::class);
        $articles=$repo->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
