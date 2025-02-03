<?php

// LER ARQUIVO XML

$xml = simplexml_load_file('arquivo.xml');

echo($xml->informacoes->item->title);
echo $xml->informacoes2->item->title;

// CRIANDO ARQUIVO XML A PARTIR DE UM ARRAY

$arr = ['Alan' => 'nome', 28 => 'idade'];

$xml = new SimpleXMLElement('<root/>');
array_walk_recursive($arr, array($xml, 'addChild'));
file_put_contents('arquivo2.xml', $xml->asXML());

$content = simplexml_load_file('arquivo2.xml');

echo $content->nome;

// CRIANDO UMA FUNÇÃO PARA GERAR O ARQUIVO XML

writeXML(array('Alan' => 'nome', 24 => 'idade', 'Jogar e Ler' => 'hobbies'), 'arquivo3.xml');

$content = simplexml_load_file('arquivo3.xml');

echo $content->hobbies;

function writeXML($arr, $fileName)
{
    $xml = new SimpleXMLElement('<root/>');
    array_walk_recursive($arr, array($xml, 'addChild'));
    file_put_contents($fileName, $xml->asXML());
}
