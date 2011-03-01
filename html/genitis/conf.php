<?php
/**
 * Configuration file.
 * ===================
 *
 * The following definitions are important:
 * ----------------------------------------
 *
 * DIR_SEP	correct file system directory separator (usually "/" on UNIX-
 * 		like systems and "\" on Microsoft Windows)
 * DIR_PUB	absolute path to the directory where public contents (e.g. HTML
 * 		files) reside
 * DIR_LIB	absolute path to the directory where the common library of Yuki
 * 		resides
 *
 * DEFAULT_FILE	default file in a directory that is included
 * ERROR_403	relative path to the 403 error page
 * ERROR_404	relative path to the 404 error page
 * ENDL		character(s) that will be used when inserting a line break
 * INDENT	character(s) that will be used for indentation
 * DATE_FORMAT	default date format used by function date
 * TIME_FORMAT	default time format used by function date
 *
 *
 * The following variables are important:
 * --------------------------------------
 *
 * $file_ext	array of strings with all file extensions that will be looked
 * 		for and the corresponding mime type
 * $modules	array of strings with all file names that shall be included
 * 		relative to the 'lib/mod' folder
 * $subdomains	array of strings with all subdomains that are available
 *
 * Optional variables:
 * -------------------
 * $comment_required	array of the form { 'message' => TRUE, ... } that
 * 		determines which form elements are required to pass the comment
 * 		validation
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license The MIT License <http://genitis.org/mit-license>
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

require DIR_LIB.'content-types.php';

// -----------------
// User definitions:
// -----------------
define('DEFAULT_FILE', 'index');
define('ERROR_403', 'error/403');
define('ERROR_404', 'error/404');
define('ENDL', "\n");
define('INDENT', "\t");

define('DATE_FORMAT', 'd.m.Y');
define('TIME_FORMAT', 'H:m \U\h\r');

$file_ext = array(
	'html'	=> 'text/html',
	'php'	=> 'text/html',
	'txt'	=> 'text/plain'
);

$modules = array(
	'user-input/user-input.php',
	'comment/comment.php'
);

$subdomains = array(
	'yuki'	=> 'projects/yuki/',
	'ip'	=> 'projects/ip/'
);

$comment_required = array(
	'message' => TRUE,
	'name' => TRUE,
	'email' => FALSE,
	'website' => FALSE,
	'spam' => TRUE
);
