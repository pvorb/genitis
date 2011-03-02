<?php
/**
 * Commenting module, which may be used by any html file to add a comment form
 * and show previously saved comments.
 *
 * There are the public methods print_form() and print_list().
 *
 * Usage:
 *   To use this class simply create a new comment object with
 *   $c = new comment(). Then print the things you want to show with
 *   $c->print_list() and $c->print_form().
 *
 * @author Paul Vorbach <vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.yuki.mod.comment
 */

/**
 * List all existing comments.
 */
define('COMMENT_MODE_LIST', 0);

/**
 * Preview the comment.
 */
define('COMMENT_MODE_PREVIEW', 1);

/**
 * Save the comment.
 */
define('COMMENT_MODE_SAVE', 2);

/**
 * Comment has been saved.
 */
define('COMMENT_MODE_SAVED', 3);

class comment {
	private $mode = 0, $message = '', $user = '', $email = '',
		$website = '', $spam = '', $datetime = '',
		$date = '', $time = '';

	private $errors = array(),
		$is_valid = FALSE;

	/**
	 * Creates a new comment object.
	 */
	function __construct() {
		if (isset($_POST['cf-preview'])) {
			$this->mode = COMMENT_MODE_PREVIEW;
		} elseif (isset($_POST['cf-save'])) {
			$this->mode = COMMENT_MODE_SAVE;
		} else {
			$this->mode = COMMENT_MODE_LIST;
		}

		if ($this->mode != COMMENT_MODE_LIST) {
			// Set new comment data.
			$this->message = $_POST['cf-message'];
			$this->user    = $_POST['cf-name'];
			$this->email   = $_POST['cf-email'];
			$this->website = $_POST['cf-website'];
			$this->spam    = isset($_POST['cf-spam']) ? TRUE : FALSE;

			// Set current date and time.
			$now = time();
			$this->datetime = date('c', $now);
			$this->date     = format_date($now+3600);
			$this->time     = format_time($now+3600);
		}
	}

	/**
	 * Lists the comments.
	 *
	 * This method may be used by any html file to show the already posted comments.
	 */
	function print_list() {
		if (strrpos($_GET['url'], '/') === 0) {
			$file = DIR_PUB.str_replace('/', DIR_SEP, $_GET['url']).DEFAULT_FILE.'.comments';

			if (file_exists($file))
				include $file;
			else {
				$f = fopen($file, 'ab');
				fclose($f);
			}
		} else {
			$file = DIR_PUB.str_replace('/', DIR_SEP, $_GET['url']).'.comments';
			if (file_exists($file))
				include $file;
			else {
				$f = fopen($file, 'ab');
				fclose($f);
			}
		}

		// Comment saving and inclusion logic
		if ($this->mode == COMMENT_MODE_PREVIEW) {
			// If a preview is requested, show it.
			$this->sanitize();
			$this->validate();
			include 'comment_preview.tpl';
		}
		// If a save is requested, check validity of the comment.
		elseif ($this->mode == COMMENT_MODE_SAVE) {
			$this->sanitize();
			$this->validate();
			// Save, if it is valid and show the new comment.
			if ($this->is_valid) {
				$this->save();
				include 'comment_new.tpl';
				// Set to saved.
				$this->mode = COMMENT_MODE_SAVED;
			}
			// Do not save it, if it is not valid and show the preview.
			else {
				include 'comment_preview.tpl';
			}
		}
	}

	/**
	 * Inserts the comment form.
	 *
	 * This function may be used by any html file to add an comment form.
	 */
	function print_form() {
		include 'comment_form.tpl';
	}

	/**
	 * Validates the comment.
	 */
	private function validate() {
		$this->errors = array();

		global $comment_required;

		// Validate values.
		foreach ($comment_required as $field => $req) {
			$fn = 'validate_'.$field;
			if ($req && (empty($this->$field) || !$fn($this->$field)))
				$this->errors[$field] = $field;
		}

		if (count($this->errors) == 0)
			$this->is_valid = TRUE;
	}


	/**
	 * Sanitizes a comment.
	 */
	private function sanitize() {
		// Sanitize user input
		$this->message = sanitize_html($_POST['cf-message']);
		$this->name    = sanitize_string($_POST['cf-name']);
		$this->email   = $_POST['cf-email'];
		$this->website = sanitize_url($_POST['cf-website']);
	}

	/**
	 * Writes a new comment to the comments file of the article.
	 */
	private function save() {
		// Get contents of template
		$comment = file_get_contents(dirname(__FILE__).DIR_SEP.'comment.tpl');
		// Replace patterns with values
		$comment = str_replace('{{{comment_message}}}', $this->message, $comment);
		$comment = str_replace('{{{comment_by}}}', $this->website
				? '<a href="'.$this->website.'">'.$this->name.'</a>'
				: '<span>'.$this->name.'</span>', $comment);
		$comment = str_replace('{{{comment_datetime}}}', $this->datetime, $comment);
		$comment = str_replace('{{{comment_date}}}', $this->date, $comment);
		$comment = str_replace('{{{comment_time}}}', $this->time, $comment);
		$comment = str_replace('{{{comment_emailhash}}}', md5($this->email), $comment);

		// Open comments file for writing
		// If this is a directory, open DEFAULT_FILE.comments
		if (strrpos($_GET['url'], '/') === 0)
			$f = fopen(DIR_PUB.str_replace('/', DIR_SEP, $_GET['url']).DEFAULT_FILE.'.comments', 'ab');
		// Otherwise open
		else
			$f = fopen(DIR_PUB.str_replace('/', DIR_SEP, $_GET['url']).'.comments', 'ab');

		// Write $comment to the end of the file
		fwrite($f, $comment);
		// Close
		fclose($f);
	}
}