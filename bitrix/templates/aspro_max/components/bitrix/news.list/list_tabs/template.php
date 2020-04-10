<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);

$use_filter = false;
if(!isset($arParams['DISPLAY_TOP_SECTIONS']) || $arParams['DISPLAY_TOP_SECTIONS'] == 'Y'){
	$use_filter = true;
}

#\Akrustal\Lib\Utils::d($use_filter);

if (count($arResult['ITEMS']) > 0):?>

	<div class="b-newslist js-newslist">

	<?	$open_section_id = 0; ?>

		<?php if($use_filter): ?>

			<div class="b-newslist__btns btn-group">
				<?php
				$i=0;
				foreach ( $arResult['SECTIONS'] as $section_id => $arSection ){
					$isOpen = $i<>0 ? 'btn-default' : 'btn-primary';
					$open_section_id = $i<>0 ? $open_section_id : $section_id;
					$i++;
					?>
					<button class="btn <?= $isOpen ?>" data-filter="<?= $section_id ?>">
						<span class="b-newslist__btns__title"><?= $arSection['NAME'] ?></span>
					</button>
					<?
				}

				?>
				<button class="btn <?= $isOpen ?>" data-filter="all">
					<span class="b-newslist__btns__title">Все статьи</span>
				</button>
			</div>

		<?endif;?>

        <?php if (isset($arParams['RS_SHOW_TITLE']) && $arParams['RS_SHOW_TITLE'] == 'Y'): ?>
            <?php if (!empty($arParams['RS_TITLE'])): ?>
            <h3 class="b-newslist__title"><?=$arParams['RS_TITLE']?></h3>
            <?php else: ?>
            <a class="b-newslist__title" href="<?=$arResult['ITEMS'][0]['LIST_PAGE_URL']?>"><h3><?=$arResult['NAME']?></h3></a>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($arParams['DISPLAY_TOP_PAGER']):?>
        <div class="text-center"><?=$arResult["NAV_STRING"]?></div>
        <?php endif; ?>

        <div class="b-newslist__items row" id="newslist" role="tablist" aria-multiselectable="true">

        <?php foreach ($arResult["ITEMS"] as $arItem): ?>

	        <? $style = ($arItem['IBLOCK_SECTION_ID'] == $open_section_id || !$use_filter) ? '': 'style="display: none;"'; ?>

            <?php
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="panel panel-master" id="<?= $arItem['ID'] ?>" data-section="<?= $arItem['IBLOCK_SECTION_ID'] ?>" data-code="<?= $arItem['CODE'] ?>"<?= $style ?>>

                <div class="b-newslist__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" itemscope itemtype="http://schema.org/NewsArticle">
                    <?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
                    <div class="b-newslist__pic" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" >
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>" title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>" itemprop="contentUrl">
                        </a>
                        <meta itemprop="width" content="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>">
                        <meta itemprop="height" content="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>">
                    </div>
                    <?php endif; ?>
                    <div class="b-newslist__data">
	                    <?if($arParams['DISPLAY_DATE'] == 'Y'):?>
                        <time class="b-newslist__date" itemprop="datePublished"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
						<?endif;?>
                        <div class="b-newslist__datainner">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-newslist__name" itemprop="name"><?=$arItem['NAME']?></a>
                            <div class="b-newslist__desc" itemprop="description"><?=$arItem['PREVIEW_TEXT']?></div>
                        </div>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>

        <div class="panel panel-master" data-section="all" style="display: none;">
	        <div class="b-articles__items">
		        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
			        <div class="b-articles__item">
				        <p>
					        <?if($arParams['DISPLAY_DATE'] == 'Y'):?>
						        <time class="b-articles__item__date" itemprop="datePublished"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time><br>
					        <?endif;?>
					        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><strong><?=$arItem['NAME']?></strong></a>
				        </p>
				        <div class="b-articles__item__text"><?=$arItem['PREVIEW_TEXT']?></div>
			        </div>
		        <?php endforeach; ?>
	        </div>
        </div>

        </div>

        <?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <div class="text-center"><?=$arResult["NAV_STRING"]?></div>
        <?php endif; ?>

	</div>

<?php endif;
