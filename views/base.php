<?php

use Blip\Utilities\Response;

// This base file is returned for every route. The partials you need for a view
// are assembled here.


require_once __DIR__ . '/../views/partials/header.php';

Response::assemble();

require __DIR__ . '/../views/partials/footer.php';