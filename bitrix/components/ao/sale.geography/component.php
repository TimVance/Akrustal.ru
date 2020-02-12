<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Service\GeoIp;

if(!\Bitrix\Main\Loader::includeModule('iblock')) {
	ShowError( "Необходимо подклюсчить модуль инфоблоков!" );
	return;
}

/* @var CBitrixComponent $this */
/** @var array $arParams */
/* @var array $arResult */
/* @var string $componentPath */
/* @var string $componentName */
/* @var string $componentTemplate */
/* @global CDatabase $DB */
/* @global CUser $USER */
/* @global CMain $APPLICATION */

if (!isset($arParams['CACHE_TIME'])) {
    $arParams['CACHE_TIME'] = 36000000;
}

$arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);

$arResult['SECTIONS'] = array();
$arResult['ERRORS'] = array();
$arResult['FILTER'] = array();

# геотаргетинг
$arResult['CENTER'] = '[55.74785075595348,37.62603079816959]'; # Москва
$ipAddress = GeoIp\Manager::getRealIp();
$geoResult = GeoIp\Manager::getDataResult($ipAddress, "ru");
if($geoResult) {
	if ( $geoResult->isSuccess() ) {
		$obGeoData = $geoResult->getGeoData();
		$arResult['CENTER'] = '['.$obGeoData->latitude.','.$obGeoData->longitude.']';
	}
}

if ($this->StartResultCache(false, $arParams['SEARCH_QUERY'])) {

	$arSelect = array(
		'ID',
		'CODE',
		'DEPTH_LEVEL',
		'NAME',
		'SECTION_PAGE_URL',
		'PICTURE',
		'LEFT_MARGIN',
		'RIGHT_MARGIN',
		'IBLOCK_SECTION_ID',
		'SORT',
		'UF_REGION_CODE',
		'UF_NETWORK_WEBSITE',
		'UF_NETWORK_PHONE'
	);
	$arSalesGeography  = \Akrustal\Lib\SalesGeography::getAll($arParams['IBLOCK_ID'],$arSelect,$arParams['SEARCH_QUERY']);

	$arResult['SECTIONS'] = $arSalesGeography['SECTIONS'];
	$arResult['ERRORS'] = $arSalesGeography['ERRORS'];
	$arResult['FILTER'] = $arSalesGeography['FILTER'];

	if(!count($arResult['SECTIONS'])){
		$arResult['IS_EMPTY'] = true;
		$this->AbortResultCache();
	}

	$this->IncludeComponentTemplate();
}




