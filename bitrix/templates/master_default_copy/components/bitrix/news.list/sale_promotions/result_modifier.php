<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    return;
}

if ($arParams['USE_OWL']) {
    $arParams['OWL_PARAMS'] = array(
        'items' => 4,
        'responsive' => array(
            '0' => array('items' => '1'),
            '480' => array('items' => $arParams['OWL_PHONE']),
            '769' => array('items' => $arParams['OWL_TABLET']),
            '996' => array('items' => $arParams['OWL_PC']),
        ),
        'autoplay' => $arParams['OWL_AUTOPLAY'] == 'Y',
        'autoplaySpeed' => $arParams['OWL_CHANGE_SPEED'],
        'smartSpeed' => $arParams['OWL_CHANGE_SPEED'],
        'autoplayTimeout' => $arParams['OWL_CHANGE_DELAY'],
        'dots' => false,
        'nav' => true,
        'margin' => 20,
        'navContainer' => '.b-newslist__nav',
        'navText' => array(
            '<svg class="icon-svg icon-svg-chevron-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-chevron-left"></use></svg>',
            '<svg class="icon-svg icon-svg-chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-chevron-right"></use></svg>'
        )
    );
}
