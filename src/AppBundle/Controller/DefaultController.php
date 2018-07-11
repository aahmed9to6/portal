<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class        DefaultController
 * @package     AppBundle\Controller
 * @author      Abdullah Ahmed <info@abdullah89.com>
 */
class DefaultController extends Controller
{

    public function indexAction(): Response
    {
        return $this->render('Default/home.html.twig', [
            'page_title' => 'Home'
        ]);
    }

    /**
     * @Route("/trainings", name="trainings_home")
     * @return Response
     */
    public function trainingAction(): Response
    {
        return $this->render('Default/trainings.html.twig', [
            'page_title' => 'Trainings'
        ]);
    }
}