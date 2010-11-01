<?php
/**
 * Configuration file
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 0.1.0
 * @package org.genitis.yuki
 */

define('DOMAIN', 'http://www.genitis.org');

define('DIR_SEP', DIRECTORY_SEPARATOR);
define('DIR_LIB', dirname(__FILE__).DIR_SEP);

define('ERROR_404', 'error/404');
define('ENDL', "\n");
define('INDENT', "\t");

$file_ext = array(
	'.html',
	'.php'
);

require_once 'functions.php';
