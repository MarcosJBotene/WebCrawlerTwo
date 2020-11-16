<?php

$proxy = '10.1.21.254:3128';

$arrayConfig = array(
    'http' => array(
        'proxy' => $proxy,
        'request_fulluri' => true
    ),
    'https' => array(
        'proxy' => $proxy,
        'request_fulluri' => true
    )
);

$context = stream_context_create($arrayConfig);
//==============================================================================

$url = 'https://www.pokemon.com/br/pokedex/';
$html = file_get_contents($url, false, $context);

$dom = new DOMDocument();
libxml_use_internal_errors(true);

// Transforma o HTML em objeto
$dom->loadHTML($html);
libxml_clear_errors();

// Captura das Tags </p>
$tagsP = $dom->getElementsByTagName('div');

$arrayP = [];

foreach ($tagsP as $section) {
    $class = $section->getAttribute('class');
    if ($class == 'page_content') {
        $divsInternas = $section->getElementsByTagName('div');
//        foreach ($divsInternas as $divInterna) {
//            $classeInterna = $divInterna->getAttribute('class');
//            if ($classeInterna == 'box_announce') {
//                $PsInternos = $divInterna->getElementsByTagName('p');
//                foreach ($PsInternos as $PsInterno) {
//                    $arrayP[] = $PsInterno->nodeValue;
//                }
//                break;
//            }
//        }
        print_r($divsInternas);
        break;
    }
}

$tagsLi = $dom->getElementsByTagName('section');
$tagUl = $dom->getElementsByTagName('ul');
$tagLi = $dom->getElementsByTagName('li');

$arrayLi = [];

print_r($tagsLi);
print_r($tagUl);
print_r($tagLi);

foreach ($tagsLi as $section) {
    $class = $section->getAttribute('class');
    if ($class == 'section pokedex-results overflow-visible') {
        
    }
}