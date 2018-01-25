<?php

namespace YB\IxinaBundle;

use Doctrine\ORM\Event\LifecycleEventArgs;
use YB\IxinaBundle\Entity\Customer;


class DoctrineListener
{
    private $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        
    }
}