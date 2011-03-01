<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Register | Genitis</title>
    <link rel="stylesheet" href="/res/css/gorn.css">
    <link rel="icon" href="/res/img/gorn.ico">
    <link rel="alternate" href="alternate" href="/log/feed.xml"
      type="application/atom+xml">
    <meta name="author" content="Paul Vorbach">
    <link rel="author" href="http://vorb.de">
    <meta name="keywords" content="Alles, Index">
    <meta name="description" content="Verzeichnis aller Artikel des Blogs">
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
        <li><a href=".">Blog</a>
        <li><span>Register</span>
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
        <h1>Register</h1>
        <aside class="teaser">
          <figure>
            <img src="img/numbers.jpg" alt="„Numbers“ von Ulrik">
          </figure>
        </aside>
      </header>
      <section>
        <p>Dies ist ein Verzeichnis aller Artikel des Blogs.</p>
        <table class="rows">
          <colgroup>
            <col width="25%">
            <col width="75%">
          <thead>
            <tr>
              <th>Datum
              <th>Name
          <tbody>
<?php
$f = fopen(DIR_PUB.'log'.DIR_SEP.'register.txt', 'r');
while (!feof($f)) {
	$line = fgets($f);
	if (trim($line) != '' && strpos($line, '#') !== 0) {
		$entry = explode(';', $line, 2);
		$date = explode('/', $entry[0]);
		echo "\n".'<tr>';
		echo "\n".'  <td>'.$date[2].'.'.$date[1].'.'.$date[0];
		echo "\n".'  <td><a href="'.$entry[0].'">'.$entry[1].'</a>';
	}
}
fclose($f);
?>
        </table>
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
      <p>© 2011 – Paul Vorbach. <a href="/about/legal">Impressum</a>.</p>
    </footer>
  </body>
</html>
