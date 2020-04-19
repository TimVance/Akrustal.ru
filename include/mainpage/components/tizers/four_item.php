<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"front_tizers", 
	array(
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "69",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "ICON",
			2 => "URL",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/company/news/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "250",
		"ACTIVE_DATE_FORMAT" => "d F Y",
		"SET_TITLE" => "Y",
		"SHOW_DETAIL_LINK" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "ajax",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "front_tizers",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"TYPE_IMG" => "md",
		"CENTERED" => "Y",
		"SIZE_IN_ROW" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"BORDERED" => "N",
		"TITLE_BLOCK" => "Новости",
		"TITLE_BLOCK_ALL" => "Все новости",
		"ALL_URL" => "contact/stores/",
		"KEY_MAP" => "",
		"INCLUDE_FILE" => "",
		"SHOW_SECTION_NAME" => "N",
		"BG_POSITION" => "top left",
		"SHOW_SUBSCRIBE" => "Y",
		"TITLE_SUBSCRIBE" => "Текст подписки",
		"HALF_BLOCK" => "Y",
		"ALL_BLOCK_BG" => "N",
		"FON_BLOCK_2_COLS" => "N",
		"USE_BG_IMAGE_ALTERNATE" => "N",
		"TITLE_SHOW_FON" => "N",
		"TITLE_BLOCK_DETAIL" => "Новости",
		"SHOW_ADD_REVIEW" => "Y",
		"TITLE_ADD_REVIEW" => "Оставить отзыв",
		"COMPACT" => "N",
		"IMAGE_POSITION" => "left",
		"USE_SHARE" => "N",
		"S_ASK_QUESTION" => "",
		"S_ORDER_SERVICE" => "",
		"T_GALLERY" => "",
		"T_DOCS" => "",
		"T_GOODS" => "",
		"T_SERVICES" => "",
		"T_PROJECTS" => "",
		"T_REVIEWS" => "",
		"T_STAFF" => "",
		"SALE_MODE" => "N",
		"HIDE_SECTION_NAME" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>