<?php

namespace Blip\Core;

/**
 * Gets and sets items for dependency injection
 */
class App
{

    protected static $registry = [];

    /**
     * Stores a key/value pair in the $registry property
     * 
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public static function bind($key, $value)
    {

        static::$registry[$key] = $value;

    }


    /**
     * Gets a value  from the $registry array by its key (if it exists)
     * 
     * @param mixed $key 
     * @return mixed  Any type of value with key $key
     */
    public static function get($key)
    {

        if (!array_key_exists($key, static::$registry)) {

            throw new Exception("No ${key} is bound to the container.");
        }

        return static::$registry[$key];

    }

}