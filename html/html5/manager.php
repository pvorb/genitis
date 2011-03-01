<?php
/**
 * This file includes requested HTML files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */

require 'conf.php';
require DIR_LIB.'functions.php';

// Check for prefix redirections.
require DIR_PUB.'redirect.php';
$url = $_GET['url'];
foreach ($redir_prefix as $from => $to) {
	if (strpos($url.'/', $from) === 0) {
		$i = 1;
		$goto = str_replace($from, $to, $url.'/', $i);
		redirect(301, $goto, FALSE, (strpos($goto, '//') != FALSE));
		exit;
	}
}

// Initialize $path
$url = '';

// Check for GET variable 'sub', which means a sumdomain.
if (isset($_GET['sub'])) {
	// Append the subdomain directory to $path.
	$url .= $subdomains[$_GET['sub']];
}

// Append the url part to $path.
$url .= $_GET['url'];

// If $path is a directory
if (is_dir(DIR_PUB.$url)) {
	// include its default file.
	include_file($url.DEFAULT_FILE);
}
// If it is an existing file
elseif (file_exists(DIR_PUB.$url)) {
	// get the file extension
	$info = explode('.', $url);
	$ext = $info[count($info) - 1];

	// get the content type from the file
	if (isset($content_types[$ext])) {
		$ct = $content_types[$ext];
		header('Content-Type: '.$ct);

		$tmp = explode('/', $ct);
		if ($tmp[0] != 'text') {
			readfile(DIR_PUB.$url);
		} else {
			include DIR_PUB.$url;
		}
	} else {
		redirect(403, ERROR_403, $url);
	}
} else {
	load_modules($modules);
	include_file($url);

	// Redirect, if there is an redirection exactly for this file.
	if (isset($redirects[$url])) {
		redirect(301, $redir[$url], FALSE, (strpos($goto, '//') != FALSE));
	}

	// Redirect to the 404 error page.
	redirect(404, ERROR_404, $url);
}
