<?php 
/**
 * A page to share feed items of facebook.
 * 
 * Copyright 2016 Cristiano Longo
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require("AlboComuneCTParser.php");
$repertorio=$_GET['repertorio'];
if (!isset($repertorio))
	die("E' necessario specificare un numero di repertorio.");

$entry = (new AlboComuneCTParser(2016))->getByRepertorio($repertorio);
if ($entry==null)
  die("Nessun elemento col numero di repertorio $repertorio");

$title="Albo POP Comune di Catania - Avviso $repertorio";
$logo="ct-logo-pop.jpg";
$description=$entry->repertorio." - ".$entry->tipo.": ".$entry->mittente_descrizione;
$link=$entry->link;
$credits="		
<img class=\"logo\" src=\"http://opendatahacklab.github.io/imgs/logo_cog4_ter.png\" alt=\"the opendatahacklab logo\" />
		<p>Il logo di questo albo pop &egrave; stato ottenuto dalla 
			pagina di Wikipedia che riporta lo <a href=\"https://it.wikipedia.org/wiki/File:Catania-Stemma.png\">stemma del comune di Catania</a>,
			elaborandolo poi con il tool <a href=\"https://photofunia.com/effects/popart\">PhotoFunia</a>.
		</p>
		
		<p>		
		L'albo pop del comune di Catania &egrave; stato realizzato da <a href=\"http://hackspacecatania.it\">Hackspace Catania</a>
		nell'ambito del progetto <a href=\"http://opendatahacklab.org\"><code>opendatahacklab</code></a>.
</p>";
require("../RSS/sharer-template.php");
?>