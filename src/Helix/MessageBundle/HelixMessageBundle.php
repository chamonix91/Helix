<?php

namespace Helix\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HelixMessageBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSMessageBundle';
    }
}
