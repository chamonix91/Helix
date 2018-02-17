<?php

namespace Helix\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HelixUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
