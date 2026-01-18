<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 * TRAJETS Services Professionnels
 *
 * This file allows you to run Laravel from the root directory
 * instead of the public folder. Useful for shared hosting.
 */

// Set the public path to this directory
$publicPath = __DIR__.'/public';

// Turn on output buffering
ob_start();

// Change the current directory to the public folder
chdir($publicPath);

// Include the front controller from the public folder
require_once $publicPath.'/index.php';
