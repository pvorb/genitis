<?php
/**
 * This file grabs needed html files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 0.1.0
 * @package org.genitis.yuki
 */

// Requires <em>conf.php</em>
require_once '../lib/conf.php';

// Set <code>$_GET['q']</code> as <code>$path</code>, default is
// <code>''</code>.
$path = '';
if (isset($_GET['q'])) {
	$path = $_GET['q'];
	unset($_GET['q']);
}

// Set <code>$content</code> and <code>$index</code>
if ($path == '') {
	$content = '.';
	$index = '../content/index';
} elseif (strrpos($path, 'index/')) {
	// Redirect to a 404 error, no content file has been found
	require_once '../lib/functions.php';
	redirect(404, ERROR_PAGE_404, $path);
} else {
	$content = '../content/'.$path;
	$index = $content.'index';
	$content = rtrim($content, '/'); // remove trailing slash
}

// Append <code>.LANG</code> to <code>$file_path</code> if <code>LANG</code>
// is defined.
if (defined('LANG')) {
	$content .= '.'.LANG;
	$index .= '.'.LANG;
}

// Try to include the file with different file endings with the order that was
// specified in lib/conf.php in variable <code>$file_ext</code>.
for ($i = 0; $i < sizeof($file_ext); $i++) {
	// Append file extension
	$content_path = $content.$file_ext[$i];
	$index_path = $index.$file_ext[$i];

	// Require functions
	if ($file_ext[$i] == '.php')
		require_once '../lib/functions.php';

	// Include content
	if (file_exists($content_path)) {
		include $content_path;
		exit;
	} elseif (file_exists($index_path)) {
		include $index_path;
		exit;
	}
}

include '../lib/redirections.php';
if (isset($redirections[$path]))
	redirect(301, $redirections[$path]);

// Redirect to a 404 error, no content file has been found
require_once '../lib/functions.php';
redirect(404, ERROR_PAGE_404, $path);
