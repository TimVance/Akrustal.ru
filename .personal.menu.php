<?
$aMenuLinks = Array(
	Array(
		"Мой кабинет",
		"personal/",
		Array(),
		Array(),
		""
	),
	Array(
		"Мои заказы",
		"personal/orders/",
		Array(),
		Array(),
		""
	),

	Array(
		"Личный счет",
		"personal/account/",
		Array(), 
		Array(),
		"CBXFeatures::IsFeatureEnabled('SaleAccounts')"
	),

	Array(
		"Личные данные",
		"personal/private/",
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"История заказов",
		"personal/orders/?filter_history=Y",
		Array(),
		Array(),
		""
	),
	Array(
		"Профили заказов",
		"personal/profiles/",
		Array(),
		Array(),
		""
	),
	Array(
		"Корзина",
		"personal/cart/",
		Array(),
		Array(),
		""
	),
	/*Array(
		"Подписки на товары",
		"personal/subscribe/",
		Array(),
		Array(),
		""
	),*/
	Array(
		"Подписки",
		"/company/subscribe/",
		Array(),
		Array(),
		""
	),
);
?>