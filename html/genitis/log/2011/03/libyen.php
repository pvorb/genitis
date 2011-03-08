<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Libyen | Genitis</title>
    <link rel="stylesheet" href="/res/css/gorn.css">
    <link rel="icon" href="/res/img/gorn.ico">
    <link rel="alternate" href="alternate" href="/log/feed.xml"
      type="application/atom+xml">
    <meta name="author" content="Paul Vorbach">
    <link rel="author" href="http://vorb.de">
    <meta name="keywords" content="">
    <meta name="description" content="">
  </head>
  <body>
    <header id="top"><a href="/">Genitis</a></header>
    <nav id="nav">
      <ul id="branches">
	<li><a href="/projects/">Projekte</a>
        <li class="active"><a href="/log/">Blog</a>
        <li><a href="/about/">Über</a>
      </ul>
      <ol id="path">
        <li><a href="/log/">Blog</a>
        <li>2011
        <li>03
        <li>Libyen
      </ol>
      <ol id="access">
        <li><a href="#top" title="Anfang" id="back">↑</a>
        <li><a href="#nav">Navigation</a>
        <li><a href="#content">Inhalt</a>
        <li><a href="#sf">Suche</a>
      </ol>
    </nav>
    <article id="content">
      <header>
        <h1>Libyen</h1>
        <p class="meta">Geschrieben von Paul <?php ctime(__FILE__); ?>
          – <a href="#comments">Kommentare</a></p>
        <aside class="teaser">
          <figure>
            <img src="img/dune.jpg" width="320" height="240">
          </figure>
        </aside>
      </header>
      <section>
        <p>Ich bin enttäuscht darüber, dass es wichtiger ist, einen deutschen
          Politiker zu verhöhnen als einem Volk zu helfen.</p>
      </section>
      <footer class="meta">
        <p>Kategorien: <a href="/log/tag/war">Krieg</a>,
          <a href="/log/tag/politics">Politik</a></p>
      </footer>
    </article>
    <section id="comments">
      <h2>Kommentare</h2>
<?php
$c = new comment();
$c->print_list();
$c->print_form();
?>
    </section>
    <aside id="extra">
      <form id="sf" action="/search" method="get">
        <fieldset>
          <legend>Suche</legend>
          <input name="s" type="text">
          <input name="submit" type="submit" value="OK">
        </fieldset>
      </form>
    </aside>
    <footer id="about">
      <p>© 2011 – Paul Vorbach. <a href="/about/legal">Impressum</a>.</p>
    </footer>
  </body>
</html>