<?
$IS_AJAX = false;
if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) || (isset($_REQUEST['AJAX_CALL']) && $_REQUEST['AJAX_CALL']=='Y') ) {
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	$IS_AJAX = true;
} else {
	require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
	$APPLICATION->SetTitle("Заявка по поставку");
}
?>

<?$APPLICATION->IncludeComponent(
	"redsign:forms", 
	"popup",
	array(
		"IBLOCK_ID" => "41",
		"USE_CAPTCHA" => "Y",
		"AJAX_MODE" => "Y",
		"SUCCESS_MESSAGE" => "Cпасибо, ваша заявка принята!",
		"EVENT_TYPE" => "RS_FORM_DELIVERY",
		"EMAIL_TO" => "apteka@floriderm.su",
		"COMPONENT_TEMPLATE" => "popup",
		"IBLOCK_TYPE" => "forms",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"FIELD_PARAMS" => "{\"30\":{\"validate\":\"pattern\",\"validatePattern\":\"^.{3,}\$\",\"mask\":\"\"},\"31\":{\"validate\":\"email\",\"validatePattern\":\"\",\"mask\":\"\"},\"32\":{\"validate\":\"\",\"validatePattern\":\"\",\"mask\":\"\"},\"33\":{\"validate\":\"\",\"validatePattern\":\"\",\"mask\":\"+7 (999) 999-99-99\"}}",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "#USER_CONSENT_ID#",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N"
	),
	false
);?>

<?if(!$IS_AJAX):?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
<?endif;?>
