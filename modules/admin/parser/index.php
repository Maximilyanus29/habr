<?php
 require ('phpQuery.php');
$count=298;
  $url="https://www.kinopoisk.ru/film/".$count."/";

 $content = file_get_contents($url);
  
 $document = phpQuery::newDocument($content);
  
 $hentry = $document->find('span.alternativeHeadline');

var_dump($hentry);
  

?>