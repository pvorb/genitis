<h3 id="new-comment">Vorschau</h3>
<article class="new">
  <header>
<?php if ($this->email): ?>
    <figure class="avatar">
      <img src="http://www.gravatar.com/avatar/<?php echo md5($this->email); ?>?s=60&d=http%3A%2F%2Fgenitis.org%2Fres%2Fimg%2Favatar.png" alt="Avatar" width="60" height="60">
    </figure>
<?php endif; ?>
    <p><?php
if ($this->website)
	echo '<a href="'.$this->website.'">'.$this->name.'</a>';
else
	echo $this->name;
?> schrieb <time datetime="<?php echo $this->datetime; ?>">am <?php echo $this->date; ?> um <?php echo $this->time; ?></time></p>
	</header>
<?php echo $this->message; ?>
</article>
<?php if ($this->errors): ?>
<h3>Der Kommentar enthält Fehler.</h3>
<ol>
<?php
	foreach ($this->errors as $error) {
		echo '<li><a href="#cf-'.$error.'">';
		switch ($error) {
			case 'message':
				echo 'Die Nachricht darf nicht leer sein.';
			break;
			case 'name':
				echo 'Der Name darf nicht leer sein.';
			break;
			case 'email':
				echo 'Die eingegebene E-Mail-Adresse ist ungültig.';
			break;
			case 'website':
				echo 'Die eingegebene Website ist ungültig.';
			break;
			case 'spam':
				echo 'Spambots und Hunde dürfen keine Kommentare schreiben.';
			break;
		}
		echo '</a></li>'."\n";
	}
?>
</ol>
<?php endif; ?>
