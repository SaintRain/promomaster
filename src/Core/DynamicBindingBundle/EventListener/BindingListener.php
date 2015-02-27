<?php

namespace Core\DynamicBindingBundle\EventListener;

class BindingListener
{
    public function preUpdate($user, $event)
    {
        ldd('listen');
    }
}
