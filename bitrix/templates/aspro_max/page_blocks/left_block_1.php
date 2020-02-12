<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<? global $arTheme, $APPLICATION, $bShowCallBackBlock, $bShowQuestionBlock, $bShowReviewBlock, $isIndex, $isShowIndexLeftBlock;?>
<div class="left_block sticky-sidebar<?=($isIndex ? ($isShowIndexLeftBlock ? "" : " hidden") : "");?>">
	<div class="sticky-sidebar__inner">
		<?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/menu.left_menu.php",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "sidebar",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_TEMPLATE" => ""
	),
	false
);?>

		<?$APPLICATION->ShowViewContent('left_menu');?>
		<?$APPLICATION->ShowViewContent('under_sidebar_content');?>

		<?CMax::get_banners_position('SIDE', 'Y');?>

		<?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."/include/forms/ask/",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "",
		"PRICE_CODE" => array(
			0 => "",
			1 => "",
		),
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STIKERS_PROP" => "HIT",
		"SALE_STIKER" => "SALE_TEXT",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "N"
	),
	false
);?>

		<?if($bShowCallBackBlock || $bShowQuestionBlock || $bShowReviewBlock):?>
			<div class="form-action-wrapper">
				<?\Aspro\Functions\CAsproMax::showSideFormLink('CALLBACK', $bShowCallBackBlock);?>
				<?\Aspro\Functions\CAsproMax::showSideFormLink('ASK', $bShowQuestionBlock);?>
				<?\Aspro\Functions\CAsproMax::showSideFormLink('REVIEW', $bShowReviewBlock);?>
			</div>
		<?endif;?>

		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/comp_staff.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>

		<?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."/include/sidebar/socials.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false
);?>

		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH" => SITE_DIR."include/left_block/comp_news_articles.php",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "include_area.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
	</div>
</div>