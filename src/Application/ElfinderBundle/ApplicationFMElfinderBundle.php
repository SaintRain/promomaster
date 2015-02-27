<?php

namespace Application\ElfinderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationFMElfinderBundle extends Bundle {

    public function getParent() {
        return 'FMElfinderBundle';
    }

}