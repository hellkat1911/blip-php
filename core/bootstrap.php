<?php

use Blip\Core\App;

use Blip\Utilities\Connection;

use Blip\Utilities\Database;



// Instance of the database connection (to be used by whole app)
$newConnection = new Database(Connection::getConnection());

// Binds the instance of your database connection to be used in DI
App::bind('dbConnect', $newConnection);


