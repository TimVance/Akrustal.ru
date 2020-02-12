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

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>

<div class="b-sectionlist">

<?php if ($arParams['ADD_CONTAINER'] == 'Y'): ?>
    <div class="container">
<?php endif; ?>

		<div class="b-sectionlist__items row">

		<?php foreach ($arResult['SECTIONS'] as $arSection): ?>

		    <div class="col-sm-6">

			    <div class="b-sectionlist__item" id="<?=$this->GetEditAreaId($arSection['ID']);?>" itemscope itemtype="http://schema.org/NewsArticle">
				    <?php if (!empty($arSection['PICTURE']['SRC'])): ?>
					    <div class="b-sectionlist__pic" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
						    <a href="<?=$arSection['SECTION_PAGE_URL']?>" >
							    <img src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['PICTURE']['ALT']?>" title="<?=$arSection['PICTURE']['TITLE']?>" itemprop="contentUrl">
						    </a>
						    <meta itemprop="width" content="<?=$arSection['PICTURE']['WIDTH']?>">
						    <meta itemprop="height" content="<?=$arSection['PICTURE']['HEIGHT']?>">
					    </div>
				    <?php endif; ?>
				    <div class="b-sectionlist__data">
					    <div class="b-sectionlist__datainner">
						    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="b-sectionlist__name" itemprop="name"><?=$arSection['NAME']?></a>
						    <div class="b-sectionlist__desc" itemprop="description"><?=$arSection['DESCRIPTION']?></div>
					    </div>
				    </div>
			    </div>

	        </div>

		<?php endforeach ?>

		</div>

<?php if ($arParams['ADD_CONTAINER'] == 'Y'): ?>
    </div>
<?php endif; ?>

</div>
