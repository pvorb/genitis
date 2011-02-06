<?php
/**
 * Some useful functions.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */

function get_domain() {
	$parts = explode('.', $_SERVER['SERVER_NAME']);
	$parts_len = sizeof($parts);
	if ($parts[$parts_len - 1] == 'localhost')
		return 'localhost';
	else
		return $parts[$parts_len - 2].'.'.$parts[$parts_len - 1];
}

function get_server() {
	$server = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != '' ? 'https://' : 'http://';
	$server .= get_domain();
	$server .= (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80) ? ':'.$_SERVER['SERVER_PORT'] : '';
	return $server;
}

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
function redirect($type, $location, $search = FALSE, $abs = FALSE) {
	switch ($type) {
		case 301: header('HTTP/1.1 301 Moved Permanently'); break;
		case 307: header('HTTP/1.1 307 Temporary Redirect'); break;
		case 404: header('HTTP/1.1 404 Not Found'); break;
	}
	// Determine the protocol, domain and (optionally) port of the server.
	$server = get_server();
	if (!$abs)
		header('Location: '.$server.'/'.$location.($search != FALSE ? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+') : ''));
	else
		header('Location: '.$location);
	exit;
}

/**
 * Loads the modules in the given array.
 *
 * @param array $array array of strings with path strings relative to 'lib/mod/'.
 */
function load_modules(&$modules) {
	foreach ($modules as $mod) {
		require_once 'mod/'.$mod;
	}
}

/**
 * Returns the given timestamp as defined in DATE_FORMAT.
 * @return string
 */
function format_date($timestamp) {
	return date(DATE_FORMAT, $timestamp);
}

/**
 * Return the given timestamp as defined in TIME_FORMAT.
 * @return string
 */
function format_time($timestamp) {
	return date(TIME_FORMAT, $timestamp);
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

/**
 * Includes the contents of the index file of a requested
 * @param unknown_type $url
 */
function get_dir($url) {
	// Requested folder
	$path = DIR_PUB.$url;

	global $file_ext;
	// If dir is empty, redirect to the root index.html file.
	if (($url == '' || $url == '/') && file_exists(DIR_PUB.DEFAULT_FILE.$file_ext[0])) {
		include DIR_PUB.DEFAULT_FILE.$file_ext[0];
		exit;
	}
	// If folder exists, include its index.html.
	elseif (file_exists($path)) {
		foreach ($file_ext as $ext) {
			if (file_exists($path.DEFAULT_FILE.$ext)) {
				include $path.DEFAULT_FILE.$ext;
				exit;
			}
		}
	}
	redirect(404, ERROR_404, $url);
}
