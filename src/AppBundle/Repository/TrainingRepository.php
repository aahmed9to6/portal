<?php

namespace AppBundle\Repository;

use AppBundle\Enum\StatusEnum;
use Doctrine\ORM\EntityRepository;

/**
 * Class TrainingRepository
 * @package AppBundle\Repository
 */
class TrainingRepository extends EntityRepository
{
    public function findAllActiveTrainings() :array
    {
        return $this->findBy(['status' => StatusEnum::ACTIVE]);
    }

    public function findAllActiveTrainingsCount() :string
    {
        return $this->createQueryBuilder('training')
            ->select('COUNT(training)')
            ->where('training.status = :active')
            ->setParameter(':active', StatusEnum::ACTIVE)->getQuery()
            ->getSingleScalarResult();

    }
}
