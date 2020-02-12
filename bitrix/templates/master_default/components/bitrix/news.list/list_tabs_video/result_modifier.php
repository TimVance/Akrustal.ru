<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    return;
}

if (isset($arParams['RS_LINK_PROP']) && $arParams['RS_LINK_PROP'] != '-') {
    foreach ($arResult['ITEMS'] as &$arItem) {
        if (isset($arItem['DISPLAY_PROPERTIES'][$arParams['RS_LINK_PROP']])) {
            $arItem['DETAIL_PAGE_URL'] = $arItem['DISPLAY_PROPERTIES'][$arParams['RS_LINK_PROP']]['VALUE'];
        }
    }
    unset($arItem);
}

if(count($arResult['ITEMS'])){

	$arSections = array();
	foreach ($arResult['ITEMS'] as $arItem){
		$arSections[$arItem['IBLOCK_SECTION_ID']] = true;
	}
	if(count($arSections)){
		$arFilter = array(
			"IBLOCK_ID"     => $arParams["IBLOCK_ID"],
			"ACTIVE"        => "Y",
			"GLOBAL_ACTIVE" => "Y",
			"ID"            => array_keys($arSections)
		);
		$arOrder = array(
			'SORT' => 'asc'
		);
		$arSel = array(
			"ID","CODE ","NAME","SORT","SECTION_PAGE_URL","IBLOCK_SECTION_ID"
		);
		$rsSections = CIBlockSection::GetList($arOrder, $arFilter ,false, $arSel);
		while ($arSection = $rsSections->GetNext()) {
			$arResult['SECTIONS'][$arSection['ID']] = $arSection;
		}
	}
}