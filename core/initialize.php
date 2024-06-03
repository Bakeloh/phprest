<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xamp' . DS . 'www' . DS . 'phprest'); // xamp/www/phprest/includes
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'cores');


// load config file first
require_once(INC_PATH . DS . "config.php");

//core classes
require_once(CORE_PATH . DS . "post.php");

?>