<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'           => 'agparentmediaurls',
    'title'        => 'Aggrosoft Parent Media Urls',
    'description'  => 'Load media urls from parent if variant has none',
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        \OxidEsales\Eshop\Application\Model\Article::class => Aggrosoft\ParentMediaUrls\Application\Model\ParentMediaUrlsArticle::class
    )
);
