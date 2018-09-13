<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Translation\Translator;

/**
 * Class        BaseSiteController
 * @package     AppBundle\Controller
 * @author      Abdullah Ahmed <info@abdullah89.com>
 */
class BaseSiteController extends Controller
{
    /**
     * @param $stringId
     * @param string $domain
     * @param array $parameters
     * @return string
     */
    public function translate(string $stringId, string $domain = 'messages', array $parameters = []) :string {
        /** @var Translator $translator */
        $translator = $this->get('translator');
        return $translator->trans($stringId, $parameters, $domain);
    }
}