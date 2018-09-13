<?php

namespace AppBundle\Controller;

use AppBundle\Repository\TrainingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class        SiteController
 * @package     AppBundle\Controller
 * @author      Abdullah Ahmed <info@abdullah89.com>
 */
class SiteController extends BaseSiteController
{
    /**
     * @Route("/home", name="site_home")
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('Site/home.html.twig', [
            'page_title' => $this->translate('Home', 'titles'),
        ]);
    }

    /**
     * @Route("/trainings", name="trainings_home")
     * @return Response
     */
    public function trainingAction(): Response
    {
        /** @var TrainingRepository $courseRepository */
        $courseRepository = $this->get(TrainingRepository::class);
        return $this->render('Site/trainings.html.twig', [
            'page_title' => $this->translate('Trainings', 'titles'),
            'trainings' => $courseRepository->findAllActiveTrainings(),
            'trainings_count' => $courseRepository->findAllActiveTrainingsCount()
        ]);
    }
}
