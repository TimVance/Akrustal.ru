<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.socnet.links",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"VKONTAKTE" => "https://vk.com/akrustal",
		"FACEBOOK" => "https://www.facebook.com/groups/246346112071894/",
		"TWITTER" => "https://twitter.com/akrustal",
		"INSTAGRAM" => "https://www.instagram.com/akrustal/",
		"YOUTUBE" => "https://www.youtube.com/channel/UCfH0Jih3pjL_WDrl1rnspjA/featured",
		"OK" => "https://ok.ru/akrustal"
	),
	false,
	array(
		"HIDE_ICONS" => "N"
	)
);?>