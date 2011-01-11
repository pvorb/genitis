<?php
/**
 * Search the site with Google
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

if (isset($_GET['s'])) {
	header('Location: http://www.google.de/search?hl=de&q=site:vorb.de+'
		. $_GET['s']);
}

