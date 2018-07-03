<?php

namespace PageBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PageController
 *
 * @package PageBundle\Controller
 */
class PageController extends Controller
{

    public function listAction() {
        $pageRepo = $this->getDoctrine()->getRepository('PageBundle:Page');
        $pages = $pageRepo->findAll();
        return $this->render('PageBundle:Page:list.html.twig', ['pages' => $pages]);
    }

    public function viewAction($id) {
        $pageRepo = $this->getDoctrine()->getRepository('PageBundle:Page');
        $page = $pageRepo->find($id);

        if (!$page) {
            throw $this->createNotFoundException('404');
        }

        return $this->render('@Page/Page/view.html.twig', ['page' => $page]);
    }
}