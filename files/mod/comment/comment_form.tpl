<form action="" method="post">
<?php
// Depending on if the user has pressed the commit button or the preview button
// an empty form will be included or not.
if ($this->mode != COMMENT_MODE_LIST): ?>
	<h3>Dein Kommentar</h3>
	<label for="comment-form-message">Kommentar</label><br>
	<textarea name="comment-message" rows="15" cols="60" id="comment-form-message"<?php if(isset($this->errors['message'])) echo ' class="error"'; ?>><?php echo $_POST['comment-message']; ?></textarea><br />
	<input name="comment-name" value="<?php echo $this->name; ?>" type="text" size="25" id="comment-form-name"<?php if (isset($this->errors['name'])) echo ' class="error"'?> />
	<label for="comment-form-name">Name</label><br>
	<input name="comment-website" value="<?php echo $this->website; ?>" type="text" size="25" id="comment-form-website"<?php if (isset($this->errors['website'])) echo ' class="error"'?> />
	<label for="comment-form-website">Website</label><br>
	<input name="comment-email" value="<?php echo $this->email; ?>" type="text" size="25" id="comment-form-email"<?php if (isset($this->errors['email'])) echo ' class="error"'?> />
	<label for="comment-form-email">E-Mail</label><br>
<?php else: ?>
	<h3>Schreibe einen Kommentar</h3>
	<label for="comment-form-message">Kommentar</label><br>
	<textarea name="comment-message" rows="18" cols="55" id="comment-form-message"></textarea><br>
	<input name="comment-name" type="text" size="25" id="comment-form-name">
	<label for="comment-form-name">Name</label><br>
	<input name="comment-website" type="text" size="25" id="comment-form-website">
	<label for="comment-form-website">Website</label><br>
	<input name="comment-email" type="text" size="25" id="comment-form-email">
	<label for="comment-form-email">E-Mail</label><br>
	<input name="comment-spam" type="checkbox" id="comment-form-spam">
	<label for="comment-form-spam">Diese Nachricht enthält keinen Spam.</label><br>
<?php endif; ?>
	<input name="comment-save" type="submit" value="Kommentar abschicken"><input name="comment-preview" type="submit" value="Vorschau">
</form>
