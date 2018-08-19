<?php

namespace Blip\Utilities;

/**
 * Break down a URI for processing by the front router
 */
class Request
{
    /**
     * Gets rid of leading/trailing slashes on the URI and returns it.
     * Catches Credit # report shortcut links and re-routes them.
     * 
     * @return string
     */
    public static function uri()
    {

        return trim($_SERVER['REQUEST_URI'], '/');

    }

    /**
     * Identifies the request method used ('GET', 'POST', etc)
     * 
     * @return string
     */
    public static function method()
    {
        
        return $_SERVER['REQUEST_METHOD'];
        
    }
}