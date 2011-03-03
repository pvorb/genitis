<?php
/**
 * This file includes requested HTML files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */

require 'conf.php';

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

// Handle subdomains.
handle_subdomains();

// Append the url part to $path.
$url .= $_GET['url'];

// Send 'Cache-Control' header.
header_cache($url);

// Load the modules.
load_modules($modules);

// If $path is a directory
if (is_dir(DIR_PUB.$url)) {
	// include its default file.
	read_file($url.DEFAULT_FILE);

	// If nothing was found, redirect to 404 error page.
	redirect(404, ERROR_404, $url);
}

// If it is an existing file
elseif (file_exists(DIR_PUB.$url)) {
	// check if there its file extension is unnecessary.
	remove_ext($url);

	// If nothing was found,
	read_file_ext($url);
}

// If a URL like dir/DEFAULT_FILE is requested
elseif (strrpos($url, DEFAULT_FILE)
		// (Get difference of string lengths.)
		=== ($diff = strlen($url) - strlen(DEFAULT_FILE))) {
	// redirect to dir/.
	redirect(301, substr($url, 0, $diff));
}

// If there is an redirection in $redirect exactly for this file
elseif (isset($redir[$url])) {
	// redirect according to $redirect
	redirect(301, $redir[$url], FALSE, (strpos($goto, '//') != FALSE));
}

// Load modules and include the file.
else {
	read_file($url);

	// If nothing was found, redirect to 404 error page.
	redirect(404, ERROR_404, $url);
}
