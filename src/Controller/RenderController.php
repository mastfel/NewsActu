<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RenderController extends AbstractController
{
    /**
     * @Route("/categories", name="render_categories_in_nav")
     */
    public function renderCategoriesInNav(EntityManagerInterface $entityManager): Response
    {
        $categories = $entityManager->getRepository(Category::class)->findBy(['deletedAt' => null]);

        return $this->render('render/categories_in_nav.html.twig', [
            'categories' => $categories
        ]);
    }

     /**
     * @Route("/categories1", name="render_categories_in_footer")
     */
    public function renderCategoriesInFooter(EntityManagerInterface $entityManager): Response
    {
        $categories = $entityManager->getRepository(Category::class)->findBy(['deletedAt'=> null]);

        return $this->render('render/categories_in_footer.html.twig', [
            'categories' => $categories
        ]);
    }
}




