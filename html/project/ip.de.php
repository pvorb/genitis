<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>IP-Adresse | Genitis</title>
		<link rel="stylesheet" type="text/css" href="../../res/css/gorn.css" />
		<link rel="shortcut icon" href="../../res/img/desert.ico" type="image/x-icon" />
		<meta name="author" content="Paul Vorbach" />
		<meta name="description" content="Liefert die persönliche IP-Adresse" />
		<meta name="keywords" content="IP, Address, IP-Adresse" />
	</head>
	<body>
		<div id="title"><span>Genitis</span></div>
		<ul id="branch" class="nav">
			<li><a href="../" class="active">Projekte</a></li>
			<li><a href="../../about/">Über</a></li>
		</ul>
		<ol id="path" class="nav">
			<li><a href="../">Projekte</a></li>
			<li><span title="Sie sind hier.">IP</span></li>
		</ol>
		<div id="container">
			<h1 id="item-1"><?php echo $_SERVER['REMOTE_ADDR']; ?></h1>
			<div class="content">
				<p>ist Ihre aktuelle IP-Adresse.</p>
			</div>
		</div>
		<div class="nav extra">
			<ul>
				<li><a href="../../about/legal/">Impressum</a></li>
			</ul>
			<form id="sf" action="../../search/" method="get">
				<fieldset>
					<legend>Suche</legend>
					<input name="s" type="text" />
					<input name="submit" type="submit" value="OK" />
				</fieldset>
			</form>
		</div>
		<div id="about">
			<p>© 2008 - 2010 – Genitis, Paul Vorbach</p>
		</div>
		<!--[if lte IE 8]><script src="../../res/js/css3-mediaqueries.js"></script><![endif]-->
	</body>
</html>
