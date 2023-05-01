<?php
$file = 'messages.xml';

// Get the message from the request body
$message = json_decode(file_get_contents('php://input'))->message;

// Load the existing messages from the XML file
$xml = simplexml_load_file($file);
if (!$xml) {
  $xml = new SimpleXMLElement("<messages></messages>");
}

// Add the new message to the XML file
$entry = $xml->addChild('message', htmlspecialchars($message));
$entry->addAttribute('timestamp', time());
file_put_contents($file, $xml->asXML());
http_response_code(201);
