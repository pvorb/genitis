<?php
if (isset($_GET['s'])) {
  $missing_page = explode(' ', $_GET['s']);
  $missing_page = implode('/', $missing_page);
}
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Seite nicht gefunden | Genitis</title>
    <link rel="stylesheet" href="/res/css/gorn.css">
    <link rel="icon" href="/res/img/gorn.ico">
    <meta name="author" content="Paul Vorbach">
    <link rel="author" href="http://vorb.de">
    <meta name="keywords" content="HTTP, Fehler, error, 404">
    <meta name="description" content="Wenn diese Fehlermeldung erscheint, wurde
      die angeforderte Seite nicht gefunden.">
  </head>
  <body>
    <header id="top"><a href="/">Genitis</a></header>
    <nav id="nav">
      <ul id="branches">
	<li><a href="/projects/">Projekte</a>
        <li><a href="/log/">Blog</a>
        <li><a href="/about/">Über</a>
      </ul>
      <ol id="path">
        <li><span>Fehler</span>
        <li><span>404</span>
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
        <h1>Seite nicht gefunden</h1>
      </header>
      <aside>
        <figure>
          <a href="http://www.flickr.com/photos/random_j/303093542/"><img
            src="img/zelda-error-110213.png" alt="I am error 110213." /></a>
          <figcaption>Ein netter Bürger aus <em lang="en">The Legend of
              Zelda</em> klärt auf.<br>
            <cite><a href="http://www.flickr.com/photos/random_j/" lang="en">J
              from the UK</a></cite></figcaption>
        </figure>
      </aside>
      <section>
<?php if (isset($missing_page)): ?>
        <p>Die Seite <code class="url">http://genitis.org/<?php
          echo $missing_page; ?></code> konnte nicht gefunden werden.</p>
<?php else: ?>
        <p>Die angeforderte Seite konnte nicht gefunden werden.</p>
<?php endif; ?>
        <p>Dies kann mehrere Gründe haben:</p>
        <ol>
          <li>
            <p>Es besteht ein <span lang="en">Hyperlink</span> auf eine
              <em>Datei, die nicht mehr existiert</em> oder verschoben
              wurde.</p>
            <p>Bitte benachrichtigen Sie mich in diesem Fall
              <a href="mailto:vorbach&#064;genitis&#046;org">per <span
                lang="en">E-Mail</span></a>, damit ich mich um eine Lösung
              bemühen kann.</p>
          <li>
            <p>Sie haben eine Adresse falsch in das Adressfeld Ihres Browsers
              eingetragen.</p>
        </ol>
      </section>
      <section>
        <form class="sf" action="/search" method="get">
          <fieldset>
            <legend>Suche</legend>
            <input name="s" type="text" size="40" <?php if (isset($_GET['s']))
              echo 'value="'.$_GET['s'].'" '; ?>/>
            <input name="submit" type="submit" value="Suchen" />
          </fieldset>
        </form>
      </section>
    </article>
    <aside id="extra">
      <form id="sf" action="/search" method="get">
        <fieldset>
          <legend>Suche</legend>
          <input class="term" name="s" type="text">
          <input class="submit" name="submit" type="submit" value="OK">
        </fieldset>
      </form>
    </aside>
    <footer id="about">
      <p>© 2010 - 2011 – Paul Vorbach. <a href="/about/legal">Impressum</a>.</p>
    </footer>
  </body>
</html>
