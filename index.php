<?php

require_once __DIR__ . "/framework/TinyWiki.php";

$tinyWiki = new TinyWiki(__DIR__."/config.custom.json");
$tinyWiki->go();