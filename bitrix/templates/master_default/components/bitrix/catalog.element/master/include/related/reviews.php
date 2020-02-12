<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
# отбираем по свойству
$GLOBALS['arReviewsFilter'] = array(
	"ACTIVE" => "Y",
	'PROPERTY_RELATED_CATALOG' => $arResult['ID']

);
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_reviews",
	Array(
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_IMG_WIDTH" => "80",
		"DISPLAY_IMG_HEIGHT" => "56",
		"LINE_NEWS_COUNT" => "2",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "company",
		"IBLOCK_ID" => "13",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "RAND",
		"SORT_ORDER1" => "RAND",
		"SORT_BY2" => "RAND",
		"SORT_ORDER2" => "RAND",
		"FILTER_NAME" => "arReviewsFilter",
		"FIELD_CODE" => array(0 => ""),
		"PROPERTY_CODE" => array(
			0 => "AUTHOR_NAME",
			1 => "AUTHOR_JOB",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"NAME_BLOCK" => "Последние новости",
	),
	$component
);?>