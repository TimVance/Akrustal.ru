<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
#\Akrustal\Lib\Utils::d($arResult['ITEMS']);
if (count($arResult['ITEMS']) > 0):
?>
<div class="b-reviews">
	<div class="b-reviews__items">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
		<div class="b-reviews__item">
			<p><?=$arItem['PROPERTIES']['AUTHOR_JOB']['VALUE']['TEXT']?><br><strong><?=$arItem['PROPERTIES']['AUTHOR_NAME']['~VALUE']?></strong></p>
			<div class="b-reviews__item__text"><?=$arItem['PREVIEW_TEXT']?></div>
		</div>
    <?php endforeach; ?>
	</div>
</div>
<?php endif;
