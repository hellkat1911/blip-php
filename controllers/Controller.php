<?php

namespace Blip\Controllers;


use Blip\Core\App;

use Blip\Models\Credit;

use Blip\Utilities\Helper;

use Blip\Utilities\Response;

use Blip\Views\View;



/**
 * Sample controller class.
 * 
 * In Blip, controllers are not subclasses. Each individual class
 * should have a __construct method which sets a protected property
 * to an instance of its associated model, with the connection as an
 * arguement.
 * 
 * Controller methods should return Render::response($template, $data), with
 * template set to the appropriate view partial, and an optional data string.
 * 
 */

class Controller
{

    protected $modelDataType;
    

    public function __construct()
    {

        $this->modelDataType = new ModelChildClass(App::get('dbConnect'));

    }

    public function sampleView()
    {

        $template = '/views/partials/sample.php';

        return Response::render($template);

    }

}