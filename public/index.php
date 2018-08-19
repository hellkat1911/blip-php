<?php

use Blip\Utilities\Router;

use Blip\Utilities\Request;




require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../core/bootstrap.php';

Router::load()->direct(Request::uri(), Request::method());

