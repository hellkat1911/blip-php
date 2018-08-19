<?php

namespace Blip\Models;

/**
 * Parent class for models.
 * 
 * Models embody the business domain of your app. Every model
 * class should subclass this one.
 */

class Model
{

    protected $callDb;

    /**
     * Sets the $callDb property to a new Database instance
     * to handle queries
     * 
     * @param Database $connection
     * 
     * @return void
     */
    public function __construct($connection)
    {

        $this->callDb = $connection;

    }

}