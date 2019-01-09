<?php

$nimi = $_POST['nimi'];
$sahkoposti = $_POST['sahkoposti'];
$palaute = $_POST['palaute'];
$aika = $_POST['aika'];

define('XML_FILE', 'data_lomake.xml');
$xml = simplexml_load_file(XML_FILE);

$uusi_rivi = $xml->addchild('rivi');
$uusi_rivi->addchild('nimi', $nimi);
$uusi_rivi->addchild('sahkoposti', $sahkoposti);
$uusi_rivi->addchild('palaute', $palaute);
$uusi_rivi->addchild('aika', $aika);

$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save(XML_FILE);

?>