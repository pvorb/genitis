<form action="#new-comment" method="post" id="cf">
  <h3>Schreibe einen Kommentar</h3>
<?php
// Depending on if the user has pressed the commit button or the preview button
// an empty form will be included or not.
if ($this->mode != COMMENT_MODE_LIST && $this->mode != COMMENT_MODE_SAVED): ?>
  <textarea name="cf-message" rows="12" cols="30" id="cf-message"<?php if(isset($this->errors['message'])) echo ' class="error"'; ?>><?php echo $_POST['cf-message']; ?></textarea><br />
  <input name="cf-name" value="<?php echo $this->name; ?>" type="text" size="25" id="cf-name"<?php if (isset($this->errors['name'])) echo ' class="error"'?> />
  <label for="cf-name">Name</label><br>
  <input name="cf-email" value="<?php echo $this->email; ?>" type="text" size="25" id="cf-email"<?php if (isset($this->errors['email'])) echo ' class="error"'?>>
  <label for="cf-email">E-Mail-Adresse</label> <span class="opt" title="optional; nur für Gravatar">?</span><br>
  <input name="cf-website" value="<?php echo $this->website; ?>" type="text" size="25" id="cf-website"<?php if (isset($this->errors['website'])) echo ' class="error"'?> />
  <label for="cf-website">Website</label> <span class="opt" title="optional">?</span><br>
  <input name="cf-spam"<?php if($this->spam) echo ' checked="checked"'?> type="checkbox" id="cf-spam" <?php if(isset($this->errors['spam'])) echo ' class="error"'; ?>>
  <label for="cf-spam">Bin weder Hund noch Spambot.</label><br>
<?php else: ?>
  <textarea name="cf-message" rows="12" cols="30" placeholder="Kommentar" id="cf-message"></textarea><br>
  <input name="cf-name" type="text" size="30" id="cf-name">
  <label for="cf-name">Name</label><br>
  <input name="cf-email" type="text" size="30" id="cf-email">
  <label for="cf-email">E-Mail-Adresse</label> <span class="opt" title="optional; nur für Gravatar">?</span><br>
  <input name="cf-website" type="text" size="30" id="cf-website">
  <label for="cf-website">Website</label> <span class="opt" title="optional">?</span><br>
  <input name="cf-spam" type="checkbox" id="cf-spam">
  <label for="cf-spam">Bin weder Hund noch Spambot.</label><br>
<?php endif; ?>
  <input name="cf-save" type="submit" value="Kommentar abschicken"><input name="cf-preview" type="submit" value="Vorschau">
</form>
