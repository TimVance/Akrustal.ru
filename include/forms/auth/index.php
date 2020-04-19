<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? $APPLICATION->IncludeComponent('bitrix:system.auth.authorize',
                                  'flat',
                                  array(
	                                  'AUTH_RESULT' => $APPLICATION->arAuthResult,
	                                  'REGISTER_URL' => "/login/?register=yes",
								      'PROFILE_URL' => "/personal/",
								      'SHOW_ERRORS' => "N"
                                  ),false
); ?>