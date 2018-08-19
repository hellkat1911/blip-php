<?php

namespace Blip\Utilities;




use \PDO;

use \PDOException;

use Blip\Controllers\ErrorController;

/**
 * Queries your database using prepared statements.
 * 
 */
class Database
{

    protected $pdo;


    public function __construct(PDO $object)
    {
        $this->pdo = $object;
    }

}