<?php
/**
 * This file includes requested HTML files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 0.1.0
 * @package org.genitis.yuki
 */

// Requires conf.php
require '../files/conf.php';
define('DIR_PUB', dirname(__FILE__).DIR_SEP);

// Check for GET parameter 'file'
if (isset($_GET['file'])) {
	$url = $_GET['file']; // request string
	unset($_GET['file']);

	// Requested file (without file extension)
	$path = DIR_PUB.DIR_SEP.$url;

	// If the file exists, include it.
	if (file_exists($path.FILE_EXT)) {
		include $path.FILE_EXT;
		exit;
	}
}
// Check for GET parameter 'dir'
elseif (isset($_GET['dir'])) {
	$url = $_GET['dir']; // request string
	unset($_GET['dir']);

	// Requested folder
	$path = DIR_PUB.DIR_SEP.$url;

	// If dir is empty, redirect to the root index.html file.
	if ($url == '' || $url == '/') {
		include 'index'.FILE_EXT;
		exit;
	}
	// If folder exists, include its index.html.
	elseif (file_exists($path)) {
		include $path.'index'.FILE_EXT;
		exit;
	}
}
// Check for GET parameter 'err'
elseif (isset($_GET['err'])) {
	// Include files for necessary redirections.
	include DIR_LIB.'redirections.php';
	require DIR_LIB.'functions.php';

	$url = $_GET['err']; // request string
	unset($_GET['err']);

	// If a redirection for $url is defined, make a redirect as defined.
	if (isset($redirections[$url]))
		redirect(301, $redirections[$url]);
	// Otherwise redirect to a 404 error.
	else
		redirect(404, ERROR_PAGE_404, $url);
}
