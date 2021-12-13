<?php

namespace php8;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$xml = new \XMLWriter();
$xml->openUri("/Users/fuliang/code/fuliang10000/design_pattern/files/test.xml");
$xml->setIndent(true);
$xml->startDocument('1.0', 'utf-8');
$xml->endDocument();
$xml->startElement("Root");
$xml->startElement("Body");
$xml->writeAttribute("type", "1");
$xml->startElement("username");
$xml->text("yzmedu");
$xml->endElement();
$xml->startElement("password");
$xml->text("123");
$xml->endElement();
$xml->endElement();
$xml->endElement();
header("Content-type: text/xml");
$xmlFile = readfile('/Users/fuliang/code/fuliang10000/design_pattern/files/test.xml');

var_export($xmlFile);