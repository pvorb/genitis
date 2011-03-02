<h3 id="new-comment" class="success">Dein Kommentar wurde gespeichert.</h3>
<article class="new comment">
  <header>
    <figure class="avatar">
      <img src="http://www.gravatar.com/avatar/<?php echo md5($this->email); ?>?s=60&d=http%3A%2F%2Fgenitis.org%2Fres%2Fimg%2Favatar.png" alt="Avatar" width="60" height="60">
    </figure>
    <p class="meta"><?php
    if ($this->website)
    	echo '<a href="'.$this->website.'">'.$this->name.'</a>';
    else
    	echo $this->name;
    ?> schrieb <time datetime="<?php echo $this->datetime; ?>">am <?php echo $this->date; ?> um <?php echo $this->time; ?></time>.</p>
  </header>
  <section class="content">
<?php echo $this->message; ?>
  </section>
</article>
