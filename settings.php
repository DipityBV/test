<?php
declare(strict_types=1);

$url = 'https://development.getfrontender.brickson.kitchen.local/api/controls';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$content = curl_exec($ch);
print_r($content);
$info = curl_getinfo($ch);
print_r($info);
curl_close($ch);
