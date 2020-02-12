<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(is_array($arResult["SEARCH"]) && !empty($arResult["SEARCH"])):?>
	<noindex>
		<div class="search-tags-cloud">
			<div class="tags_title darken font_md option-font-bold"><?=\Bitrix\Main\Localization\Loc::getMessage('TAG_TITLE');?></div>
			<div class="tags">
				<?foreach ($arResult["SEARCH"] as $key => $res):?>
					<a href="<?=$res["URL"]?>" rel="nofollow"><?=$res["NAME"]?></a>
				<?endforeach;?>
			</div>
		</div>
	</noindex>
<?endif;?>