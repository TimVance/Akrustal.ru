<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><p>
	 <?$APPLICATION->IncludeComponent(
	"redsign:news.archive", 
	".default", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"FILTER_NAME" => "500",
		"IBLOCK_ID" => "42",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"SHOW_MONTHS" => "Y",
		"SHOW_TITLE" => "Y",
		"SHOW_YEARS" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>