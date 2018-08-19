<?php

namespace Blip\Utilities;


/**
 * Container for all routes used in the application.
 * Each type of route should get its own associative array.
 * 
 * Each entry in the array should have a key (which is the desired name of the URI in string format) and
 * a value string which is 'controllerMethod@Controller'
 * 
 * The router will handle the rest!
 */
class Routes
{

    protected $get = [

        // GET routes
        '' => 'sampleView@Controller'
        // the '/' URI will load the view returned by the sampleView method in the Controller

    ];


    protected $post = [

        // POST routes

    ];


    public static function getRoutes()
    {

        $self = new self;

        $routes = [

            'get' => $self->get,

            'post' => $self->post

        ];

        return $routes;

    }



}