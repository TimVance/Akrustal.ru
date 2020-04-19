<?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	"phone", 
	array(
        "COMPONENT_TEMPLATE" => "phone",
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/empty.php",
		"PHONES" => array(
			0 => "8 (800) 700 40 95",
		),
		"EDIT_TEMPLATE" => "",
		"SLOGAN" => "Звонок бесплатный по РФ"
	),
	false
); ?>