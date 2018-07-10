<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
    /**
     * @param $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        /**
         * @var $session \Symfony\Component\HttpFoundation\Session\Session
         */
        $session = $request->getSession();
        $lastUsernameKey = Security::LAST_USERNAME;

        $error = $this->checkError($request, $session);
        if (!empty($error)) {
            $returnVal = $this->redirectAfterLogin();
            if ($returnVal) {
                return $returnVal;
            }
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);
        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;
        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function redirectAfterLogin()
    {
        return $this->redirectToRoute('easyadmin', [
            'action' => 'list',
            'entity' => 'Course'
        ]);
    }

    /**
     * @param Request $request
     * @param Session $session
     * @return mixed|null
     */
    private function checkError(Request $request, Session $session)
    {
        $authErrorKey = Security::AUTHENTICATION_ERROR;
        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }
        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }
        return $error;
    }
}