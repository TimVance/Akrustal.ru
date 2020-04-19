<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"aspro:com.banners.max", 
	"top_big_banners_1_2", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "6",
		"TYPE_BANNERS_IBLOCK_ID" => "50",
		"SET_BANNER_TYPE_FROM_THEME" => "N",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "ASC",
		"PROPERTY_CODE" => array(
			0 => "URL",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"SIZE_IN_ROW" => "3",
		"BG_POSITION" => "center",
		"CACHE_GROUPS" => "N",
		"SECTION_ITEM_CODE" => "float_banners_type_1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"BANNER_TYPE_THEME" => "BANNER_IMG_WIDE",
		"COMPONENT_TEMPLATE" => "top_big_banners_1_2",
		"FILTER_NAME" => "arRegionLink",
		"BANNER_TYPE_THEME_CHILD" => "",
		"SECTION_ID" => "",
		"NEWS_COUNT3" => "20",
		"PRICE_CODE" => array(
		),
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"CONVERT_CURRENCY" => "N"
	),
	false
);?>