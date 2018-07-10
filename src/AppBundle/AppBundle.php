<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * @return null|string
     */
    public function getParent(): ?string
    {
        return 'FOSUserBundle';
    }
}
