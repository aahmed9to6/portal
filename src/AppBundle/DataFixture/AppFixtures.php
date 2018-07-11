<?php
namespace AppBundle\DataFixture;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        /**
         * @var User $admin
         */
        $admin = new User();
        $admin->setUsername('admin')
            ->setEmail('info@abdullah89.com')
            ->setPlainPassword('coeus123')
            ->addRole(User::ROLE_ADMIN)
            ->setEnabled(true)
            ->setFullName('Administrator');
        $manager->persist($admin);
        $manager->flush();
    }
}
