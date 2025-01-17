<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?><h1>Отзывы о продукции "Акрустал"</h1>
 Мы очень рады, что наши покупатели присылают нам свои отзывы - только прочтите, сколько удивления и радости в их словах! Каждое высказывание напоминает нам о нашей Миссии, каждый Ваш отзыв говорит нам о том,&nbsp;что мы на правильном пути, и служит источником вдохновения для дальнейшего развития! Спасибо Вам за эти слова!&nbsp;<br>
<br>
<br>
<br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_REVIEW_BUTTON" => "",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALSO_ITEMS_COUNT" => "5",
		"ALSO_ITEMS_POSITION" => "bottom",
		"BG_POSITION" => "top left",
		"BLOCK_BLOG_NAME" => "",
		"BLOCK_BRANDS_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"BLOCK_NEWS_NAME" => "",
		"BLOCK_PARTNERS_NAME" => "",
		"BLOCK_PROJECTS_NAME" => "",
		"BLOCK_REVIEWS_NAME" => "",
		"BLOCK_SALE_NAME" => "",
		"BLOCK_SERVICES_NAME" => "",
		"BLOCK_STAFF_NAME" => "",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_VACANCY_NAME" => "",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"COUNT_IN_LINE" => "3",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,desc,docs,char,goods,services,blog,vacancy,news,sale,form_order,projects,reviews,video,gallery,brands,landings,staff,comments,partners",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FB_USE" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_VK_USE" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"FORM_ID_ORDER_SERVISE" => "",
		"GALLERY_TYPE" => "small",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "13",
		"IBLOCK_LINK_BLOG_ID" => "",
		"IBLOCK_LINK_BRANDS_ID" => "",
		"IBLOCK_LINK_LANDINGS_ID" => "",
		"IBLOCK_LINK_NEWS_ID" => "",
		"IBLOCK_LINK_PARTNERS_ID" => "",
		"IBLOCK_LINK_PROJECTS_ID" => "",
		"IBLOCK_LINK_REVIEWS_ID" => "",
		"IBLOCK_LINK_SALE_ID" => "",
		"IBLOCK_LINK_SERVICES_ID" => "",
		"IBLOCK_LINK_STAFF_ID" => "",
		"IBLOCK_LINK_TIZERS_ID" => "",
		"IBLOCK_LINK_VACANCY_ID" => "",
		"IBLOCK_TYPE" => "system",
		"IMAGE_POSITION" => "left",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LINE_ELEMENT_COUNT_LIST" => "3",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_VIEW" => "slider",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PRICE_CODE" => "",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ADD_REVIEW_BUTTON" => "Y",
		"SHOW_ASK_BLOCK" => "N",
		"SHOW_BORDER_ELEMENT" => "N",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"SHOW_FILTER_DATE" => "Y",
		"SHOW_MAX_ELEMENT" => "N",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"SIZE_IN_ROW" => "4",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STAFF_IBLOCK_ID" => "",
		"STAFF_TYPE_DETAIL" => "list",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STRICT_SECTION_CHECK" => "N",
		"S_ASK_QUESTION" => "",
		"S_ORDER_SERVISE" => "",
		"TITLE_SHOW_FON" => "Y",
		"TYPE_IMG" => "lg",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"T_ALSO_ITEMS" => "",
		"T_DOCS" => "",
		"T_GALLERY" => "",
		"T_GOODS" => "",
		"T_MAX_LINK" => "",
		"T_PREV_LINK" => "",
		"T_VIDEO" => "",
		"USE_BG_IMAGE_ALTERNATE" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"USE_SUBSCRIBE_IN_TOP" => "N",
		"TEMPLATE_THEME" => "blue",
		"MEDIA_PROPERTY" => "",
		"SLIDER_PROPERTY" => "",
		"VIEW_TYPE" => "list",
		"SHOW_TABS" => "Y",
		"SHOW_SECTION_NAME" => "N",
		"SHOW_ASK_QUESTION_BLOCK" => "Y",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
		)
	),
	false
);?><br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>