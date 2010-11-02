<?php
/**
 * Some useful functions.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */

/**
 * Redirects to the URL given in $location where $type is the HTTP status code
 * and $search is a string which contains keywords that will be sent in
 * $_GET['s'].
 *
 * This function always ends the execution of the current script.
 *
 * @param int $type HTTP status code
 * @param string $location URL that will be redirected to
 * @param string $search string with keywords. Slashes and '%20' serve as
 *     seperators.
 */
function redirect($type, $location, $search = FALSE) {
	switch ($type) {
		case 301: header('HTTP/1.1 301 Moved Permanently'); break;
		case 307: header('HTTP/1.1 307 Temporary Redirect'); break;
		case 404: header('HTTP/1.1 404 Not Found'); break;
	}

	if (strpos($location, 'http') === 0) // If starts with ‘http://’
		header('Location: '.$location.($search != FALSE ? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+') : ''));
	else // Else if location is relative
		header('Location: '.DOMAIN.'/'.$location.($search != FALSE ? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+') : ''));
	exit;
}

/**
 * Includes the contents of a requested file.
 * @param string $url URL that was requested
 */
function get_file($url) {
	$path = DIR_PUB.$url;

	// If a file with one of the file extensions in $file_ext exists, include
	// it.
	global $file_ext;
	foreach ($file_ext as $ext) {
		if (file_exists($path.$ext)) {
			include $path.$ext;
			exit;
		}
	}

	// If none was found, redirect to the 404 error page.
	redirect(404, ERROR_404, $url);
}

function get_dir($url) {
	// Requested folder
	$path = DIR_PUB.$url;

	// If dir is empty, redirect to the root index.html file.
	if (($url == '' || $url == '/') && file_exists(DIR_PUB.'index.html')) {
		include DIR_PUB.'index.html';
		exit;
	}
	// If folder exists, include its index.html.
	elseif (file_exists($path)) {
		global $file_ext;
		foreach ($file_ext as $ext) {
			if (file_exists($path.'index'.$ext)) {
				include $path.'index'.$ext;
				exit;
			}
		}
	}
	redirect(404, ERROR_404, $url);
}
