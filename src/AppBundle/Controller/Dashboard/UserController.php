<?php

namespace AppBundle\Controller\Dashboard;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class        UserController
 * @package     Ekomi\AdminBundle\Controller
 * @author      Abdullah Ahmed <abdullah.ahmed@coeus-solutions.de>
 */

class UserController extends BaseAdminController
{

    /**
     * @return mixed
     */
    public function createNewUserEntity()
    {
        return new AccessDeniedHttpException(
            $this->get('translator')->trans('Sorry! This action is not allowed.')
        );
    }

    /**
     * @param $user
     */
    public function prePersistUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
    }

    /**
     * @param $user
     */
    public function preUpdateUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
    }

    /**
     * @param Request $request
     * @return string
     * @Route("/check-access", name="checkAccess")
     */
    public function checkAccessAction(Request $request)
    {
        $requiredRole  = $request->request->get('role');
        if (!$this->isGranted($requiredRole)) {
            return new JsonResponse(['status' => false]);
        } else {
            return new JsonResponse(['status' => true]);
        }
    }


    /**
     * Shows current user details
     * @Route("my-profile", name="my_profile")
     * @return null|string
     */
    public function profileAction()
    {
        $userId = $this->getUser()->getId();
        if (!empty($userId)) {
            return $this->redirectToRoute('easyadmin', ['action' => 'show', 'entity' => 'User', 'id' => $userId]);
        }
        return null;
    }

    /**
     * @return AccessDeniedHttpException
     */
    public function deleteUserAction()
    {
        return new AccessDeniedHttpException(
            $this->get('translator')->trans("Sorry! This action is not allowed.")
        );
    }
}
