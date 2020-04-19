<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"API_KEY" => "",
		"CONTROLS" => array("ZOOM","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:56.48464958202824;s:10:\"yandex_lon\";d:84.94770472344275;s:12:\"yandex_scale\";i:18;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:3:\"LON\";d:37.602921142578;s:3:\"LAT\";d:55.744122672927;s:4:\"TEXT\";s:76:\"г. Томск, ул. 79-й Гв. дивизии, д. 4\\5, стр. 2###RN###\";}i:1;a:3:{s:3:\"LON\";d:84.94770472344275;s:3:\"LAT\";d:56.48462138502475;s:4:\"TEXT\";s:79:\"г. Томск, ул. 79-й Гв. дивизии, д. 4\\5, стр. 2 офис 6\";}}}",
		"MAP_HEIGHT" => "100%",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING"),
		"USE_REGION_DATA" => "Y"
	)
);?>