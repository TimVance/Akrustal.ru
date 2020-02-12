<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (count($arResult['ITEMS']) > 0):
?>
<div class="b-articles">
	<div class="b-articles__items">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
		<div class="b-articles__item">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-articles__item__title" target="_blank"><?=$arItem['NAME']?></a>
			<div class="b-articles__item__text"><?=$arItem['PREVIEW_TEXT']?></div>
		</div>
    <?php endforeach; ?>
	</div>
</div>
<?php endif;
