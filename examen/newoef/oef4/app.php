<?php

//App base path
CONST BASE_PATH = __DIR__ . '/';

//load config 
require BASE_PATH . 'config.php';
require BASE_PATH . 'db.php';

require BASE_PATH . 'models/Olod.php';
require BASE_PATH . 'controllers/olod.php';
require BASE_PATH . 'controllers/submission.php';
