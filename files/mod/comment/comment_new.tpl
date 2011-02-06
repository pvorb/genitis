<h3 id="new-comment" class="success">Dein Kommentar wurde gespeichert.</h3>
<article class="new">
	<header>
		<p><?php if ($this->website) echo '<a href="'.$this->website.'">'.$this->name.'</a>'; ?> schrieb <time datetime="<?php echo $this->datetime; ?>">am <?php echo $this->date; ?> um <?php echo $this->time; ?></time>.</p>
	</header>
	<?php echo $this->message; ?>
</article>
