<?php

// Variables globales para configurar valores comunes
define('HTTP_HOST', $_ENV['HOST']);
define('API_KEY', $_ENV['API_KEY']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DEV', $_ENV['DEV']);

define('ADMIN_EMAIL', 'admin@example.com');
define('DEFAULT_LANGUAGE', 'es');

define('CSS', HTTP_HOST.'/public/css/');
define('JS', HTTP_HOST.'/public/js/');
define('IMG', HTTP_HOST.'/public/img/');
