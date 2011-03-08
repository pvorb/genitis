<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Feinschliff | Genitis</title>
    <link rel="stylesheet" href="/res/css/gorn.css">
    <link rel="icon" href="/res/img/gorn.ico">
    <link rel="alternate" href="/log/feed.xml" type="application/atom+xml">
    <meta name="author" content="Paul Vorbach">
    <link rel="author" href="http://vorb.de">
    <meta name="keywords" content="Feinschliff, Blog, Genitis">
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
        <li>Feinschliff
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
        <h1>Feinschliff</h1>
        <p class="meta">Geschrieben von Paul <?php ctime(__FILE__); ?>
          – <a href="#comments">Kommentare</a></p>
        <aside class="teaser">
          <figure>
            <img src="img/finishing.jpg" alt="„Fabrication“ von kavitha"
              width="320" height="617">
          </figure>
        </aside>
      </header>
      <section>
	<p>Während der vergangenen beiden Tage habe ich dem Weblog und der
          ganzen Website den letzten Feinschliff verpasst.</p>
        <p>Ein Problem war bisher, dass die Bilder (und auch andere Dateien) vom
          Browser nicht gecached wurden. Dies lag daran, dass jeder Request
          zunächst von einem PHP-Skript behandelt wird, welches dann die
          angeforderte Datei lädt, um eine einfache URL-Behandlung zu bieten.
          Nun werden zusätzliche Informationen im HTTP-Header versendet, um
          korrektes Cacheing zu begünstigen.</p>
        <p>Außerdem wurde die URL-Behandlung verbessert. Um doppelten Inhalt zu
          vermeiden, habe ich einige Weiterleitungen eingeführt:</p>
        <p>Überflüssige Dateiendungen in URLs werden nun entfernt
          (<code>http://genitis.org/about/legal.html -&gt;
          http://genitis.org/about/legal</code>). Fehlende Schrägstriche bei
          Verzeichnissen werden automatisch hinzugefügt
          (<code>http://genitis.org/about -&gt;
          http://genitis.org/about/</code>). Ebenso werden überflüssige
          Schrägstriche in Dateinamen entfernt. Unnötige Verweise auf den
          Verzeichnisindex werden ebenfalls entfernt
          (<code>http://genitis.org/about/index -&gt;
          http://genitis.org/about/</code>).</p>
        <p>In den kommenden Tagen werde ich mir die Zeit nehmen und die
          Realisierung genauer beschreiben.</p>
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
