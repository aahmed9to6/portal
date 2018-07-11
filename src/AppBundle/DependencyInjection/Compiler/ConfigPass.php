<?php

namespace AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ConfigPass
 * @package AppBundle\DependencyInjection\Compiler
 * @description When parameters and services are created by the extension but not yet compiled in optimised DIC,
there is a chance to manipulate them. Compiler Pass exists for this purpose.
 */

class ConfigPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */

    public function process(ContainerBuilder $container): void
    {
        $config = $container->getParameter('easyadmin.config');
        // use menu to use IS_AUTHENTICATED_FULLY role by default if not set
        foreach ($config['design']['menu'] as $key => $value) {
            if (!isset($value['role'])) {
                $config['design']['menu'][$key]['role'] = 'IS_AUTHENTICATED_FULLY';
            }
        }
        // update entities to use IS_AUTHENTICATED_FULLY role by default if not set
        foreach ($config['entities'] as $key => $value) {
            if (!isset($value['role'])) {
                $config['entities'][$key]['role'] = 'IS_AUTHENTICATED_FULLY';
            }
        }
        // update views to use entities role by default if not set
        foreach ($config['entities'] as $key => $value) {
            $views = ['new', 'edit', 'show', 'list', 'delete', 'search'];
            foreach ($views as $view) {
                if (!isset($value[$view]['role'])) {
                    $config['entities'][$key][$view]['role'] = $value['role'];
                }
            }
        }
        $container->setParameter('easyadmin.config', $config);
    }
}
