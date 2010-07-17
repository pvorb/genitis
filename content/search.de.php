<?php
/**
 * Search the site with Google
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 0.1.0
 * @package org.genitis.content
 */

if (isset($_GET['s'])) {
	header('Location: http://www.google.de/search?hl=de&q=site:genitis.org+'
		. $_GET['s']);
}

