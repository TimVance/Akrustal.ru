<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php"); ?>

<?php
//$APPLICATION->ShowAjaxHead();
$APPLICATION->RestartBuffer();
//CJSCore::Init(array('jquery'));
//echo 'test';
?>
<?$APPLICATION->IncludeComponent(
    "ao:sale.geography",
    "detail_page",
    Array(
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => 38,
        "CACHE_TIME" => 36000000,
        "USE_SEARCH" => true,
        "SEARCH_QUERY" => trim($_REQUEST['q'])
    )
);?>