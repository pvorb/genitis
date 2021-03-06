<?php
/**
 * Configuration file.
 *
 * The following definitions are needed:
 * DEFAULT_FILE	default file in a directory that is included.
 * ERROR_404	path to the 404 error page
 * ENDL		character(s) that will be used when inserting a line break.
 * INDENT	character(s) that will be used for indentation.
 * DATE_FORMAT	default date format used by function date.
 * TIME_FORMAT	default time format used by function date.
 *
 * The following variables are needed:
 * $file_ext	array of strings with all file extensions that will be looked
 * 		for.
 * $modules	array of strings with all file names that shall be included
 * 		relative to the 'lib/mod' folder.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

// ---------------------
// Standard definitions:
// ---------------------
define('DIR_SEP', DIRECTORY_SEPARATOR);
define('DIR_PUB', dirname(__FILE__).DIR_SEP);

$dir = explode(DIR_SEP, dirname(__FILE__));
$dir[sizeof($dir) - 1] = '';
$dir[sizeof($dir) - 2] = 'files';
$dir = implode($dir, DIR_SEP);
define('DIR_LIB', $dir);

require DIR_LIB.'conf.php';
require DIR_LIB.'functions.php';

// -----------------
// User definitions:
// -----------------
define('DEFAULT_FILE', 'index');
define('ERROR_404', 'error/404');
define('ENDL', "\n");
define('INDENT', "\t");

define('DATE_FORMAT', 'M d, Y');
define('TIME_FORMAT', 'g:m a');

$file_ext = array(
	'php'	=> TRUE,
	'html'	=> FALSE,
	'txt'	=> FALSE
);

$cache = array();
$modules = array();
$subdomains = array();
