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

# Орлов А. вывод материалов с той же тематикой
if(isset($arParams['DISPLAY_WITH_THEMES_COUNT']) && $arParams['DISPLAY_WITH_THEMES_COUNT'] > 0){

	# получаем темы текущей новости
	$arThemes = [];
	$dbThemes = \CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $arParams["DISPLAY_WITH_THEMES_ELEMENT_ID"], array("sort" => "asc"), Array("CODE"=>"THEMES"));
	while($arTheme = $dbThemes->Fetch()) {
		$arThemes[] = $arTheme["VALUE"];
	}
	#\Akrustal\Lib\Utils::pr($arResult['ITEMS']);

	# получаем материалы по темам
	if(count($arThemes)){
		$arResult['ITEMS'] = [];
		$arThemesFilter = Array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ACTIVE" => "Y",
			"=PROPERTY_THEMES"=>$arThemes,
			"!ID" => $arParams["DISPLAY_WITH_THEMES_ELEMENT_ID"]
		);
		#\Akrustal\Lib\Utils::pr($arThemesFilter);
		$arSel = Array("ID","IBLOCK_ID","CODE","NAME","PREVIEW_PICTURE","PREVIEW_TEXT","DATE_CREATE","DETAIL_PAGE_URL");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "DATE_CREATE"=>"ASC"), $arThemesFilter, false, array("nTopCount" =>$arParams['DISPLAY_WITH_THEMES_COUNT']), $arSel);
		while($ar_fields = $res->GetNext())	{
			$ar_fields['PREVIEW_PICTURE'] = \CFile::GetFileArray($ar_fields['PREVIEW_PICTURE']);
			$arResult['ITEMS'][] = $ar_fields;
		}
	}

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