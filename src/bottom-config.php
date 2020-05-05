<?php

$cachedContent = fopen($cachedFile, 'w');
fwrite($cachedContent, ob_get_contents());
fclose($cachedContent);
ob_end_flush();
