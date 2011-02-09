<h3 id="new-comment" class="success">Dein Kommentar wurde gespeichert.</h3>
<article class="new comment">
  <header>
    <figure class="avatar"></figure>
    <p class="meta"><?php if ($this->website) echo '<a href="'.$this->website.'">'.$this->name.'</a>'; ?> schrieb <time datetime="<?php echo $this->datetime; ?>">am <?php echo $this->date; ?> um <?php echo $this->time; ?></time>.</p>
  </header>
  <section class="content">
<?php echo $this->message; ?>
  </section>
</article>
