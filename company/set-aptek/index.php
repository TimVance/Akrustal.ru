<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сеть аптек");
?><?$APPLICATION->IncludeComponent(
	"ao:sale.geography",
	"akrustal",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "38",
		"IBLOCK_TYPE" => "services",
        "SEARCH_QUERY" => trim($_REQUEST['q'])
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>