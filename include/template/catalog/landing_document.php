<?php

global $filterDoc;

if (is_array($arProp["PROP_DOC_1"]["VALUE"]))
    $filterDoc["ID"] = $arProp["PROP_DOC_1"]["VALUE"];

$elems = $arProp["PROP_DOC_1"]["LINK_ELEMENT_VALUE"];
$elem = array_shift($elems);
$iblock = $elem["IBLOCK_ID"]

?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "files", 
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_CONTAINER" => "Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "filterDoc",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => $iblock,
        "IBLOCK_TYPE" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Отзывы",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "AUTHOR_NAME",
            1 => "AUTHOR_JOB",
            2 => "",
        ),
        "RS_AUTHOR_JOB" => "AUTHOR_JOB",
        "RS_AUTHOR_NAME" => "AUTHOR_NAME",
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "COL_LG" => $colLg,
        "COL_MD" => $colMd,
        "COL_SM" => $colSm,
        "COL_XS" => $colXs,
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "reviews",
        "SHOW_PARENT_NAME" => "N",
        "USE_OWL" => "Y"
    ),
    false
);?>
