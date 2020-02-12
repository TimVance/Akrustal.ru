<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Loader;

if (!Loader::includeModule('redsign.devfunc')) {
    return;
}

$arResult['RIGHT_WORD'] = RSDevFunc::BasketEndWord(count($arResult['ITEMS']));

# Орлов А. сумма в корзине
$basket = Bitrix\Sale\Basket::loadItemsForFUser(Bitrix\Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$arResult['TOTAL_SUM'] = $basket->getPrice(); # Сумма с учетом скидок
$tmp = \CCurrencyLang::CurrencyFormat($arResult['TOTAL_SUM'], \CSaleLang::GetLangCurrency(SITE_ID), true);
$arResult['TOTAL_SUM_FORMATED'] = str_replace(' руб.',' &#8381;', $tmp);
