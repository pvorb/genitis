<h3 class="success">Dein Kommentar wurde gespeichert.</h3>
<article id="new-comment">
	<header>
		<p><?php if ($this->website) echo '<a href="'.$this->website.'">'.$this->name.'</a>'; ?> schrieb <time>am <?php echo $this->date; ?> um <?php echo $this->time; ?></time>.</p>
	</header>
	<?php echo $this->message; ?>
</article>
