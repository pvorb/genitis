<?php
/**
 * Some useful functions.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */


/**
 * Returns the current domain as a string.
 *
 * @return string
 */
function get_domain() {
	$parts = explode('.', $_SERVER['SERVER_NAME']);
	$parts_len = sizeof($parts);
	if ($parts[$parts_len - 1] == 'localhost')
		return 'localhost';
	else
		return $parts[$parts_len - 2].'.'.$parts[$parts_len - 1];
}

/**
 * Returns the current server URI including protocol, domain and protocol as a
 * string.
 *
 * @return string
 */
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
		case 403: header('HTTP/1.1 403 Forbidden'); break;
		case 404: header('HTTP/1.1 404 Not Found'); break;
	}
	// Determine the protocol, domain and (optionally) port of the server.
	$server = get_server();
	if (!$abs)
		header('Location: '.$server.'/'.$location.($search != FALSE
			? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+')
			: ''));
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
 *
 * @return string
 */
function format_date($timestamp) {
	return date(DATE_FORMAT, $timestamp);
}

/**
 * Return the given timestamp as defined in TIME_FORMAT.
 *
 * @return string
 */
function format_time($timestamp) {
	return date(TIME_FORMAT, $timestamp);
}

/**
 * Returns the filename extension of a filename.
 *
 * @param string $file
 */
function get_file_ext($file) {
	$tmp = explode('.', $file);
	return $tmp[count($tmp) - 1];
}

/**
 * Removes the filename extension of the URL if possible.
 *
 * @param string $url
 */
function remove_ext($url) {
	global $file_ext;

	$ext = get_file_ext($url);

	if (isset($file_ext[$ext])) {
		$url_no_ext = str_replace('.'.$ext, '', $url);
		redirect(301, $url_no_ext);
	}
}

/**
 * Handles subdomains.
 */
function handle_subdomains() {
	global $url, $subdomains;

	// Check for GET variable 'sub', which means a sumdomain.
	if (isset($_GET['sub'])) {
		// If subdomain exists
		if (isset($subdomains[$_GET['sub']])) {
			// append the subdomain directory to $path.
			$url .= $subdomains[$_GET['sub']];
		} else {
			// Otherwise, redirect to 404 error page.
			redirect(404, ERROR_404, $_GET['sub'].'/'.$_GET['url']);
		}
	}
}

/**
 * Sends 'Cache-Control' header.
 *
 * @param string $url
 */
function header_cache($url) {
	global $cache;

	if (isset($cache[$url])) {
		header('Cache-Control: '.$cache[$url]);
	} else {
		header('Cache-Control: public');
	}
}

/**
 * Checks $url for files with file extensions of $file_ext and writes the
 * content of the first that is found to the output buffer.
 *
 * Files with the file extension 'php' are getting evaluated.
 *
 * @param string $url
 */
function read_file($url) {
	global $file_ext, $mime_types;

	foreach ($file_ext as $ext => $dyn) {

		$file = DIR_PUB.$url.'.'.$ext;

		if (file_exists($file)) {

			if (isset($mime_types[$ext]))
				header('Content-Type: '.$mime_types[$ext]);

			if ($dyn) {
				include $file;
			} else {
				readfile($file);
			}

			exit;
		}
	}
}

/**
 * Reads the contents of DIR_PUB.$url and write it to the output buffer.
 *
 * @param string $url
 */
function read_file_ext($url) {
	global $mime_types;

	$ext = get_file_ext($url);

	// Get the content type from the file.
	if (isset($mime_types[$ext])) {
		// Send the 'Content-Type' header.
		header('Content-Type: '.$mime_types[$ext]);

		// Send 'Last-Modified' header.
		header('Last-Modified: '.date('r', filemtime(DIR_PUB.$url)));

		// Directly read the file contents to output buffer.
		readfile(DIR_PUB.$url);
	} else {
		// if content type is not defined throw HTTP 403 error (forbidden)
		redirect(403, ERROR_403, $url);
	}
}
