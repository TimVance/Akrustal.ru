<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"front_news", 
	array(
		"IBLOCK_TYPE" => "system",
		"IBLOCK_ID" => "39",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DATE_ACTIVE_FROM",
			2 => "ACTIVE_TO",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "SOURCES",
			2 => "PERIOD",
			3 => "SALE_NUMBER",
			4 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/docs/video/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "ajax",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "front_news",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"TITLE_BLOCK" => "Видео",
		"TITLE_BLOCK_ALL" => "Всё видео",
		"ALL_URL" => "/video/",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"NO_MARGIN" => "N",
		"TRANSPARENT" => "Y",
		"FILLED" => "N",
		"SIZE_IN_ROW" => "3",
		"TYPE_IMG" => "lg",
		"IS_AJAX" => CMax::checkAjaxRequest(),
		"MESSAGE_404" => "",
		"INCLUDE_FILE" => "",
		"IMG_POSITION" => "right",
		"BG_POSITION" => "center right",
		"VIEW_TYPE" => "grey_pict",
		"TITLE_BLOCK_DETAIL" => "Новости",
		"KEY_MAP" => "",
		"BORDERED" => "N",
		"TEMPLATE_THEME" => "blue",
		"MEDIA_PROPERTY" => "",
		"SLIDER_PROPERTY" => "",
		"SEARCH_PAGE" => "/search/",
		"USE_RATING" => "N",
		"USE_SHARE" => "N",
		"SHOW_SECTION_NAME" => "Y",
		"SHOW_SUBSCRIBE" => "N",
		"TITLE_SUBSCRIBE" => "",
		"HALF_BLOCK" => "N",
		"ALL_BLOCK_BG" => "N",
		"FON_BLOCK_2_COLS" => "Y",
		"USE_BG_IMAGE_ALTERNATE" => "N",
		"TITLE_SHOW_FON" => "N",
		"SHOW_ADD_REVIEW" => "Y",
		"TITLE_ADD_REVIEW" => "Оставить отзыв",
		"COMPACT" => "N",
		"IMAGE_POSITION" => "right",
		"SHOW_DETAIL_LINK" => "Y",
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