<?php
/**
 * This file grabs needed html files.
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 0.1.0
 * @package org.genitis.yuki
 */

// Requires conf.php
require_once '../files/conf.php';
define('DIR_PUB', dirname(__FILE__));

$file = NULL;
$dir = NULL;

if (isset($_GET['file'])) {
	$file = $_GET['file'];
	unset($_GET['file']);
	$path = DIR_PUB.DIR_SEP.$file;

	if (strrpos($file, '/') === strlen($file) - 1) {
		include $path.'index'.FILE_EXT;
	} elseif (file_exists($path.FILE_EXT)) {
		include $path.FILE_EXT;
		exit;
	} else {
		redirect(404, ERROR_PAGE_404, $file);
	}

} elseif (isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	unset($_GET['dir']);
	$path = DIR_PUB.DIR_SEP.$dir;

	if ($dir == '' || $dir == '/') {
		include 'index'.FILE_EXT;
	} elseif (file_exists($path)) {
		include $path.'index'.FILE_EXT;
	} else {
		redirect(404, ERROR_PAGE_404, $dir);
	}

} else {
	include 'index'.FILE_EXT;
}

// Redirections
include '../files/redirections.php';
require_once '../files/functions.php';
if (isset($redirections[$path]))
	redirect(301, $redirections[$path]);

