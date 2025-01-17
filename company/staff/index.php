<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудники");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"blog", 
	array(
		"IBLOCK_TYPE" => "company",
		"IBLOCK_ID" => "40",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/company/staff/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "EMAIL",
			2 => "POST",
			3 => "SEND_MESSAGE_BUTTON",
			4 => "PHONE",
			5 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "N",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "EMAIL",
			2 => "POST",
			3 => "PHONE",
			4 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"VIEW_TYPE" => "table",
		"SHOW_TABS" => "N",
		"SHOW_SECTION_PREVIEW_DESCRIPTION" => "Y",
		"COUNT_IN_LINE" => "3",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_REVIEW" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SHOW_DETAIL_LINK" => "Y",
		"IMAGE_POSITION" => "left",
		"COMPONENT_TEMPLATE" => "blog",
		"SET_LAST_MODIFIED" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"STRICT_SECTION_CHECK" => "N",
		"SECTION_ELEMENTS_TYPE_VIEW" => "FROM_MODULE",
		"ELEMENT_TYPE_VIEW" => "element_1",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILE_404" => "",
		"SIDE_LEFT_BLOCK" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK" => "FROM_MODULE",
		"SIDE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"TYPE_LEFT_BLOCK_DETAIL" => "FROM_MODULE",
		"T_ALSO_ITEMS" => "",
		"T_GALLERY" => "",
		"T_PREV_LINK" => "",
		"IBLOCK_LINK_NEWS_ID" => "",
		"IBLOCK_LINK_SERVICES_ID" => "",
		"IBLOCK_LINK_TIZERS_ID" => "",
		"IBLOCK_LINK_REVIEWS_ID" => "",
		"IBLOCK_LINK_STAFF_ID" => "",
		"IBLOCK_LINK_VACANCY_ID" => "",
		"IBLOCK_LINK_BLOG_ID" => "",
		"IBLOCK_LINK_PROJECTS_ID" => "",
		"IBLOCK_LINK_BRANDS_ID" => "",
		"IBLOCK_LINK_LANDINGS_ID" => "",
		"BLOCK_SERVICES_NAME" => "",
		"BLOCK_NEWS_NAME" => "",
		"BLOCK_TIZERS_NAME" => "",
		"BLOCK_REVIEWS_NAME" => "",
		"BLOCK_STAFF_NAME" => "",
		"BLOCK_VACANCY_NAME" => "",
		"BLOCK_PROJECTS_NAME" => "",
		"BLOCK_BRANDS_NAME" => "",
		"BLOCK_BLOG_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"T_GOODS" => "",
		"IBLOCK_LINK_PARTNERS_ID" => "",
		"BLOCK_PARTNERS_NAME" => "",
		"SHOW_BORDER_ELEMENT" => "N",
		"USE_BG_IMAGE_ALTERNATE" => "N",
		"BG_POSITION" => "top left",
		"TYPE_IMG" => "lg",
		"SIZE_IN_ROW" => "4",
		"TITLE_SHOW_FON" => "Y",
		"USE_SUBSCRIBE_IN_TOP" => "N",
		"ALSO_ITEMS_POSITION" => "bottom",
		"LIST_VIEW" => "slider",
		"LINKED_ELEMENST_PAGE_COUNT" => "20",
		"USE_SHARE" => "N",
		"ALSO_ITEMS_COUNT" => "5",
		"GALLERY_TYPE" => "small",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N",
		"STAFF_TYPE_DETAIL" => "list",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_BLOCKS_ALL_ORDER" => "tizers,desc,char,docs,services,news,vacancy,blog,reviews,projects,staff,comments,brands,gallery,video,goods,landings,form_order,partners,sale",
		"DETAIL_USE_COMMENTS" => "Y",
		"PRICE_CODE" => array(
		),
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"HIDE_NOT_AVAILABLE" => "N",
		"DETAIL_BLOG_USE" => "N",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>