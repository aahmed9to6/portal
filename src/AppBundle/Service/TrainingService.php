<?php

namespace AppBundle\Service;

use AppBundle\Repository\TrainingRepository;

/**
 * Class TrainingService
 * @package AppBundle\Service
 */
class TrainingService
{
    /**
     * @var TrainingRepository
     */
    private $trainingRepository;

    /**
     * CourseService constructor.
     * @param TrainingRepository $trainingRepository
     */
    public function __construct(
        TrainingRepository $trainingRepository
    ) {
        $this->trainingRepository = $trainingRepository;
    }

}
