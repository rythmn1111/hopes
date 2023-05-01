<?php
$file = 'messages.xml';

// Load the messages from the XML file
$xml = simplexml_load_file($file);
if (!$xml) {
  $xml = new SimpleXMLElement("<messages></messages>");
}

// Output the messages as XML
header('Content-Type: application/xml');
echo $xml->asXML();
