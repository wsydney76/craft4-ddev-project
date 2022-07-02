<?php


// Set path constants
use craft\helpers\App;

define('CRAFT_BASE_PATH', __DIR__);
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH . '/vendor');

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH . '/autoload.php';


define('CRAFT_ENVIRONMENT', App::env('CRAFT_ENVIRONMENT') ?: 'production');
