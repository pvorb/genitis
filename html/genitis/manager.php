<?php
/**
 * This file includes requested HTML files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki
 */

require '.conf.php';
require DIR_LIB.'functions.php';

$url = $_GET['url']; // request

// Manage redirections
require '.redirect.php';
// If a redirection for $url is defined, make a redirect as defined.
if (!isset($_GET['sub']) && isset($redirections[$url])) {
	// If the redirection does not include sth. like http://,
	// make a relative redirect.
	if (strpos($redirections[$url], '://') === FALSE)
		redirect(301, $redirections[$url], FALSE, FALSE);
	// Otherwise redirect absolutely.
	else
		redirect(301, $redirections[$url], FALSE, TRUE);
}

// Check for GET parameter 'file'
if (isset($_GET['file'])) {
	// Include file
	get_file($url);
}
// Check for GET parameter 'dir'
elseif (isset($_GET['dir'])) {
	// Include dir
	get_dir($url);
}
// Check for GET parameter 'err'
elseif (isset($_GET['err'])) {
	// Redirect relatively to a 404 error.
	redirect(404, ERROR_404, $url, FALSE);
}
