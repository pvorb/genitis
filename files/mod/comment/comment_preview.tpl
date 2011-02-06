<a id="new-comment"></a>
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
			case 'website':
				echo 'Die eingegebene Website war ungültig. Dieses Feld kann auch leer bleiben.';
			break;
			case 'email':
				echo 'Die eingegebene E-Mail-Adresse war ungültig. Dieses Feld kann auch leer bleiben.';
			break;
		}
		echo '</a></li>'.ENDL;
	}
?>
</ol>
<?php endif; ?>
<h3>Vorschau</h3>
<article class="preview">
	<header>
		<p><?php
if ($this->website)
	echo '<a href="'.$this->website.'">'.$this->name.'</a>';
else
	echo $this->name;
?> schrieb <time>am <?php echo $this->date; ?> um <?php echo $this->time; ?></time>.</p>
	</header>
<?php echo $this->message; ?>
</article>
