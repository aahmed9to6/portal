<?php

namespace AppBundle\Controller\Dashboard;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class        UserController
 * @package     AppBundle\Controller\Dashboard
 * @author      Abdullah Ahmed <info@abdullah89.com>
 */

class UserController extends BaseAdminController
{
    /**
     * Shows current user details
     * @Route("my-profile", name="my_profile")
     * @return null|string
     */
    public function profileAction(): ?string
    {
        $userId = $this->getUser()->getId();
        if (!empty($userId)) {
            return $this->redirectToRoute('easyadmin', ['action' => 'show', 'entity' => 'User', 'id' => $userId]);
        }
        return null;
    }

    /**
     * @return \FOS\UserBundle\Model\UserInterface|mixed
     */
    public function createNewUserEntity()
    {
        return $this->get('fos_user.user_manager')->createUser();
    }

    /**
     * @param $user
     */
    public function persistUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
        parent::persistEntity($user);
    }

    /**
     * @param $user
     */
    public function updateUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
        parent::updateEntity($user);
    }
}
