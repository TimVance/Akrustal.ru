<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$backurl = \Bitrix\Main\Application::getInstance()->getContext()->getRequest()->get("backurl");
if($backurl)
	$arResult["BACKURL"] = $backurl;

$arResult["AUTH_URL"] = '/login/';

$arResult["AUTH_FORGOT_PASSWORD_URL"] = '/login/?forgot_password=yes';

$arResult["AUTH_REGISTER_URL"] = $arParams['REGISTER_URL'];
