<?php

namespace YB\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class YBUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
