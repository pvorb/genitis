<?php
if (isset($_GET['s'])) {
	$missing_page = explode(' ', $_GET['s']);
	$missing_page = implode('/', $missing_page).'/';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Seite nicht gefunden | Genitis</title>
		<link rel="stylesheet" href="../../res/css/gorn.css" charset="UTF-8" />
		<!--[if lte IE 8]><script src="../../res/js/css3-mediaqueries.js"></script><![endif]-->
		<meta name="author" content="Paul Vorbach" />
		<meta name="description" content="Fehlerseite, die Angezeigt wird, wenn eine Ressource nicht gefunden werden kann. Erörterung über die Vermeidung solcher Fehler auf Genitis.org." />
		<meta name="keywords" content="Fehler, Fehlermeldung, 404, HTTP" />
	</head>
	<body id="backend">
		<div id="title"><a href="../../">Genitis</a></div>
		<ul id="branch" class="nav">
			<li><a href="../../projects/">Projekte</a></li>
			<li><a href="../../about/">Über</a></li>
		</ul>
		<ol class="nav path">
			<li><a href="../../">Startseite</a></li>
			<li><span>Fehler</span></li>
			<li><span title="Sie sind hier.">404</span></li>
		</ol>
		<div id="container">
			<h1 id="item-1">Seite nicht gefunden</h1>
			<div class="content">
<?php if (isset($missing_page)): ?>
				<p>Die Seite <code class="url">http://www.genitis.org/<?php echo $missing_page ?></code> konnte nicht gefunden werden.</p>
<?php else: ?>
				<p>Die angeforderte Seite konnte nicht gefunden werden.</p>
<?php endif; ?>
				<p>Dies kann mehrere Gründe haben:</p>
				<ol>
					<li>
						<p>Es besteht ein <span xml:lang="en">Hyperlink</span> auf eine Datei, <em>die nicht mehr existiert</em> oder verschoben wurde.</p>
						<p>Bitte benachrichtigen Sie mich in diesem Fall <a href="mailto:vorbach&#064;genitis&#046;org">per <span xml:lang="en">E-Mail</span></a>, damit ich mich um eine Lösung bemühen kann.</p>
					</li>
					<li><p>Sie haben eine Adresse falsch in das Adressfeld Ihres Browsers eingetragen.</p></li>
				</ol>
				<p>Vielleicht kann Ihnen die Suche weiterhelfen.</p>
				<form class="sf" action="../../search/" method="get">
					<fieldset>
						<legend>Suche</legend>
						<input name="s" type="text" size="40" <?php if (isset($_GET['s'])) echo 'value="'.$_GET['s'].'" '; ?>/>
						<input name="submit" type="submit" value="Suchen" />
					</fieldset>
				</form>
				<h2 id="item-1-1">Problematik</h2>
				<p>Manchmal ist es nötig, eine <abbr title="Uniform Resource Locator">URL</abbr> zu ändern. <a href="http://www.w3.org/Provider/Style/URI.html" hreflang="en" title="Cool URIs don’t change">Gutes Design kann dies jedoch verhindern.</a></p>
				<p>Da jedoch niemand perfekt ist, – ich am allerwenigsten – passiert es doch ab und zu, dass mal eine URL geändert wird.</p>
				<p>Damit kommen die Probleme:</p>
				<ul>
					<li>Alle <span xml:lang="en">Hyperlinks</span> zu dieser Ressource werden unbrauchbar.</li>
					<li>Suchmaschinen finden verlinkte Inhalte nicht mehr und zeigen teilweise noch Wochen später auf die alten Inhalte.</li>
				</ul>
				<p>Die größten Nachteile entstehen aber für den Benutzer, für den es nicht immer leicht ist, seine gewünschten Inhalte wiederzufinden. Und eigentlich ist es auch nicht seine Aufgabe, danach zu suchen.</p>
				<p>Deshalb versuche ich, sämtliche URLs persistent zu halten, damit den Benutzern dieser <span xml:lang="en">Website</span> solche Dinge erspart bleiben.</p>
			</div>
			<div class="note">
				<div class="teaser fig">
					<div class="img">
						<a href="http://www.flickr.com/photos/random_j/303093542/"><img src="../../res/img/zelda-error-110213.png" alt="I am error 110213." /></a>
					</div>
					<div class="subtitle">
						Auch in <em>The Legend of Zelda</em> gibt es ähnliche Fehler.<br />
						<cite><a href="http://www.flickr.com/photos/random_j/" xml:lang="en">J from the UK</a></cite>, <a href="http://creativecommons.org/licenses/by/2.0/deed.de" xml:lang="en">CC Attribution-License 2.0</a>
					</div>
				</div>
				<div class="info">
					<h2 id="item-1-2">Der 404-Fehler</h2>
					<p>Der <em><a href="http://de.wikipedia.org/wiki/HTTP-Statuscode" title="Wikipedia: HTTP-Statuscode"><abbr title="Hypertext Transfer Protocol">HTTP</abbr>-Statuscode</a> 404</em> wird angezeigt, wenn versucht wird, eine nicht vorhandene Ressource anzufordern. <a href="http://de.wikipedia.org/wiki/Toter_Link" title="Wikipedia: Toter Link">Mehr zum Thema</a></p>
				</div>
			</div>
		</div>
		<div class="nav extra">
			<ul>
				<li><a href="impressum/">Impressum</a></li>
			</ul>
			<form id="sf" action="../../search/" method="get">
				<fieldset>
					<legend>Suche</legend>
					<input name="s" type="text" <?php if (isset($_GET['s'])) echo 'value="'.$_GET['s'].'" '; ?>/>
					<input name="submit" type="submit" value="OK" />
				</fieldset>
			</form>
		</div>
		<div id="about">
			<p>© 2007 - 2010 – Genitis, <a href="../../about/pvorb/">Paul Vorbach</a></p>
		</div>
	</body>
</html>
