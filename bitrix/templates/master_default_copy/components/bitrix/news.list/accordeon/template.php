<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);

if (count($arResult['ITEMS']) > 0):
?>
<div class="b-items js-items">
    <?php if (isset($arResult['FILTER']['VALUES'])): ?>
    <?php endif; ?>
    <div class="panel-group" id="items_accordion" role="tablist" aria-multiselectable="true">
        <?php
        foreach ($arResult['ITEMS'] as $index => $arItem):
            $isOpen = $index === 0;
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        ?>
        <div class="panel panel-master" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-type="<?=$arItem['DISPLAY_PROPERTIES'][$arParams['RS_TYPE_PROPERTY']]['VALUE_XML_ID']?>" data-code="<?=$arItem['CODE']?>">
            <div class="panel-heading" role="tab" id="heading_<?=$arItem['CODE']?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#items_accordion" href="#collapse_<?=$arItem['CODE']?>" aria-expanded="true" aria-controls="collapse_<?=$arItem['CODE']?>" class="<?php if (!$isOpen) echo 'collapsed';?>">
                        <?=$arItem['NAME']?>
                        <?php if (isset($arParams['NOTE_PROP']) && !empty($arItem['DISPLAY_PROPERTIES'][$arParams['NOTE_PROP']])):?>
                        <span class="panel-title-right"><?=$arItem['DISPLAY_PROPERTIES'][$arParams['NOTE_PROP']]['DISPLAY_VALUE']?></span>
                        <?php endif; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse_<?=$arItem['CODE']?>" class="panel-collapse collapse<?php if ($isOpen) echo ' in';?>" role="tabpanel" aria-labelledby="heading_<?=$arItem['CODE']?>">
                <div class="panel-body">
                    <?=$arItem['PREVIEW_TEXT']?>

                    <div class="b-items-tools">
                        <div class="b-items-tools__button">
                            <?php if (!empty($arParams['JOB_LINK'])): ?>
                            <a class="btn btn-primary" data-type="ajax" href="<?=str_replace("#ELEMENT_ID#", $arItem['ID'], $arParams['JOB_LINK'])?>"><?=Loc::getMessage('RS.JOB_LINK')?></a>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($arParams['SOCIAL_SERVICES'])): ?>
                        <div class="b-items-tools__share">
                            <span><?=Loc::getMessage('RS.SHARE')?></span>
                            <div class="b-items-tools__socials">
                                <div class="ya-share2"
                                        data-services="<?=$arParams['SOCIAL_SERVICES'];?>"
                                    data-lang="<?=LANGUAGE_ID?>"></div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
endif;
