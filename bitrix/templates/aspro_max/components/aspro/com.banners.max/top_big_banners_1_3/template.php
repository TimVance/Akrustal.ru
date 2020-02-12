<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?if($arResult['ITEMS']):?>
	<div class="top_big_banners nop <?=($arResult['HAS_CHILD_BANNERS'] ? 'with_childs' : '');?>">
		<div class="row dd">
			<?if($arResult['HAS_SLIDE_BANNERS'] && $arResult['HAS_CHILD_BANNERS']):?>
				<?$iSmallBannersCount = count($arResult["ITEMS"][$arParams["BANNER_TYPE_THEME_CHILD"]]["ITEMS"]);?>
				<div class="col-md-<?=($iSmallBannersCount <= 2 ? "9" : "6 col-m-push-25");?> slide">
					<?include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/components/aspro/com.banners.max/common_files/slider.php');?>
				</div>
				<div class="col-md-3 child <?=($iSmallBannersCount > 2 ? "col-m-pull-50" : "");?>"><div class="row">
					<?foreach($arResult['ITEMS'][$arParams['BANNER_TYPE_THEME_CHILD']]['ITEMS'] as $key => $arItem):?>
						<?if($key > 4) continue;?>
						<?if($key == 2):?>
							</div></div><div class="col-md-3 child"><div class="row">
						<?elseif($key == 4):?>
							</div></div><div class="col-md-12 items clearfix"><div class="row">
						<?endif;?>
						<?include('float.php');?>
					<?endforeach;?>
				<?if($key <= 4):?>
					</div>
				<?else:?>
					</div>
				<?endif;?>
				</div>
			<?elseif($arResult['HAS_SLIDE_BANNERS']):?>
				<div class="col-md-12">
					<?include_once('slider.php');?>
				</div>
			<?elseif($arResult['HAS_CHILD_BANNERS']):?>
				<?foreach($arResult['ITEMS'][$arParams['BANNER_TYPE_THEME_CHILD']]['ITEMS'] as $key => $arItem):?>
					<div class="col-md-12 items clearfix">
						<?include('float.php');?>
					</div>
				<?endforeach;?>
			<?endif;?>
			<?if($arResult['HAS_CHILD_BANNERS2']):?>
				<div class="col-md-12 items">
					<?foreach($arResult['ITEMS'][$arParams['BANNER_TYPE_THEME_CHILD2']]['ITEMS'] as $key => $arItem):?>
						<?include('float.php');?>
					<?endforeach;?>
				</div>
			<?endif;?>
		</div>
	</div>
<?endif;?>