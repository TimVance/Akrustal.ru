<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    return;
}

if ($arParams['USE_OWL'] == 'Y') {
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

if (isset($arParams['RS_LINK_PROP']) && $arParams['RS_LINK_PROP'] != '-') {
    foreach ($arResult['ITEMS'] as &$arItem) {
        if (isset($arItem['DISPLAY_PROPERTIES'][$arParams['RS_LINK_PROP']])) {
            $arItem['DETAIL_PAGE_URL'] = $arItem['DISPLAY_PROPERTIES'][$arParams['RS_LINK_PROP']]['VALUE'];
        }
    }
    unset($arItem);
}

# Орлов А.
# картинка
if (isset($arParams['RS_IMG_WIDTH']) && $arParams['RS_IMG_WIDTH'] <> 0) {
	if(count($arResult['ITEMS'])) {
		foreach ( $arResult['ITEMS'] as &$arItem ) {

			if ( $arItem["PREVIEW_PICTURE"] ) {

				$file = \CFile::ResizeImageGet( $arItem["PREVIEW_PICTURE"]['ID'], array(
					'width'  => $arParams['RS_IMG_WIDTH'],
					'height' => $arParams['RS_IMG_HEIGHT']
				), BX_RESIZE_IMAGE_PROPORTIONAL, true );

				$arItem["PREVIEW_PICTURE"]['SRC'] = $file['src'];
				$arItem["PREVIEW_PICTURE"]['WIDTH'] = $file['width'];
				$arItem["PREVIEW_PICTURE"]['HEIGHT'] = $file['height'];
				$arItem["PREVIEW_PICTURE"]['FILE_SIZE'] = $file['size'];
			}
		}
	}
}