<?php

$nimi = $_GET['nimi'];
$sahkoposti = $_GET['sahkoposti'];
$palaute = $_GET['palaute'];
$date =  date("d-m-Y h:i:s");

define('XML_FILE', 'data_lomake.xml');
$xml = simplexml_load_file(XML_FILE);

$uusi_rivi = $xml->addchild('rivi');
$uusi_rivi->addchild('nimi', $nimi);
$uusi_rivi->addchild('sahkoposti', $sahkoposti);
$uusi_rivi->addchild('palaute', $palaute);
$uusi_rivi->addchild('date', $date);

$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save(XML_FILE);

header("Location: show_xml.html");
exit();

?>