<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Fehlstart | Genitis</title>
    <link rel="stylesheet" href="/res/css/gorn.css">
    <link rel="icon" href="/res/img/gorn.ico">
    <link rel="alternate" href="/log/feed.xml" type="application/atom+xml">
    <meta name="author" content="Paul Vorbach">
    <link rel="author" href="http://vorb.de">
    <meta name="keywords" content="Fehlstart, Blog">
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
        <li>Fehlstart
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
        <h1>Fehlstart</h1>
        <p class="meta">Geschrieben von Paul <?php ctime(__FILE__); ?>
          – <a href="#comments">Kommentare</a></p>
        <aside class="teaser">
          <img src="img/crash.jpg" alt="„Crash“ von simonok"
            width="320" height="240">
        </aside>
      </header>
      <section>
        <p>Puh. Ich hoffe das Gröbste habe ich hinter mir.</p>
        <p>Leider sind mir beim Veröffentlichen einige Fehler unterlaufen,
          weshalb die Website heute für ca. eine Stunde nicht erreichbar war –
          und auch danach hatte ich noch große Mühe, alle Funktionen aufrecht zu
          erhalten. Da war ich wohl zu voreilig.</p>
        <p>Die Kommentarfunktion ist nun auch seit ein paar Minuten aktiv. Heute
          Morgen habe ich ganz vergessen, die Kommentare zu testen. Sollten
          dadurch Unannehmlichkeiten entstanden sein, bitte ich um
          Entschuldigung.</p>
        <p>Ansonsten scheint für den Moment alles zu laufen, wie es soll.
          Sollten weitere Probleme bestehen, bitte ich um eine E-Mail an mich:
          <a href="mailto:vorbach&#64;genitis&#46;org">vorbach&#64;genitis&#46;org</a>.</p>
        <p>Das war ein harter Tag.</p>
      </section>
      <footer class="meta">
        <p>Kategorien: <a href="/log/tag/blog">Blog</a>
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
