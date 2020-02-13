<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

#\Akrustal\Lib\Utils::pr($arResult['SECTIONS']);
use Bitrix\Main\Loader,
    Rover\GeoIp\Location;

$this->addExternalJs('//api-maps.yandex.ru/2.1/?lang=ru_RU&load=package.full"');

if (count($arResult['ERRORS']) > 0) {
	?>
	<div class="alert alert-danger">
		<?php
			foreach ( $arResult['ERRORS'] as $errors ){
				echo  $errors,'<br>';
			}
		?>
	</div>
	<?
};

if(isset($arResult['IS_EMPTY']) && $arResult['IS_EMPTY']){
	?>
	<div class="alert alert-danger">
		<?
		$template_path = $this->GetFolder();
		include $_SERVER['DOCUMENT_ROOT'].$template_path.'/empty_text.php';
		?>
	</div>
	<?
}

$frame = $this->createFrame()->begin('Загрузка ...');

echo \Bitrix\Main\Service\GeoIp\Manager::getRealIp();


// Пытаемся определить страну или город
if (Loader::includeModule('rover.geoip')){
    try{
        $location = Location::getInstance(\Bitrix\Main\Service\GeoIp\Manager::getRealIp());

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
} else
    echo 'Модуль GeoIp Api не установлен';


$lat = ($location->getLat() ? $location->getLat() : "");
$lng = ($location->getLng() ? $location->getLng() : "");
$city = ($location->getCityName() ? $location->getCityName() : "");
$country = ($location->getCountryName() ? $location->getCountryName() : "");



if (count($arResult['SECTIONS']) > 0) {
	?>
	<div class="b-sale-geography js-sale-geography">
		<div data-lat="<?=$lat?>" data-lng="<?=$lng?>" data-city="<?=$city?>" data-country="<?=$country?>" style="display:none" class="panel-group" id="sale_geography_accordion" role="tablist" aria-multiselectable="true">
			<?php
			$i = 0;
			$YMap_data = '';
            foreach ( $arResult['SECTIONS'] as $country_id => $arCountry ){
				$isOpen = ($i == 0);
				$i++;
				$arAreas = $arCountry['SUB_SECTIONS'];
				foreach ( $arAreas as $area_id => $arArea ){
					if(empty($arArea['SUB_SECTIONS'])) continue;
					$style= $isOpen ? '': 'style="display: none;"';
					?>
					<div class="panel panel-master" id="<?= $area_id ?>" data-name-country="<?=$arCountry["~NAME"]?>" data-country="<?= $country_id ?>" data-code="<?= $arArea['CODE'] ?>"<?= $style ?>>
						<div class="panel-heading" role="tab" id="heading_<?= $arArea['CODE'] ?>">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#sale_geography_accordion" href="#collapse_<?= $arArea['CODE'] ?>" aria-expanded="true" aria-controls="collapse_<?= $arArea['CODE'] ?>" class="collapsed">
									<?php if(!empty($arArea['UF_REGION_CODE'])) echo $arArea['UF_REGION_CODE'],". "; ?>
									<?= $arArea['~NAME'] ?>
								</a>
							</h4>
						</div>
						<div id="collapse_<?= $arArea['CODE'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $arArea['CODE'] ?>">
							<div class="panel-body">

								<?php
								$arCities = $arArea['SUB_SECTIONS'];
								foreach ( $arCities as $city_id => $arCity ){
									if(empty($arCity['SUB_SECTIONS'])) continue;
									?>
									<div class="panel panel-master" id="<?= $city_id ?>" data-country="<?= $country_id ?>" data-code="<?= $arCity['CODE'] ?>">
										<div class="panel-heading" role="tab" id="heading_<?= $arCity['CODE'] ?>">
											<h5 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#collapse_<?= $arArea['CODE'] ?>" href="#collapse_<?= $arCity['CODE'] ?>" aria-expanded="true" aria-controls="collapse_<?= $arCity['CODE'] ?>" class="collapsed">
													<?= $arCity['~NAME'] ?>
												</a>
											</h5>
										</div>
										<div id="collapse_<?= $arCity['CODE'] ?>" data-city-title="<?= $arCity['~NAME'] ?>" class="panel-collapse collapse b-sale-geography__city" role="tabpanel" aria-labelledby="heading_<?= $arCity['CODE'] ?>">
											<div class="panel-body">

												<?php
												$arNetworks = $arCity['SUB_SECTIONS'];
												foreach ( $arNetworks as $network_id => $arNetwork ){
													if(empty($arNetwork['ELEMENTS'])) continue;

													$network_phone = $arNetwork['UF_NETWORK_PHONE'];
													$website = $arNetwork['UF_NETWORK_WEBSITE'];

													?>
													<div class="b-sale-geography__item" id="<?= $network_id ?>" data-country="<?= $country_id ?>" data-code="<?= $arNetwork['CODE'] ?>">
														<div class="b-sale-geography__title"><?= $arNetwork['~NAME'] ?></div>
														<div class="b-sale-geography__network">
														<?
														$image='';
														if($arNetwork['PICTURE']) {
															$image = '<img alt="' . $arNetwork['~NAME'] . '" src="' . $arNetwork['PICTURE']['src'] . '" width="' . $arNetwork['PICTURE']['width'] . '" height="' . $arNetwork['PICTURE']['height'] . '" />';
															?>
															<div class="b-sale-geography__network__logo"><?= $image ?></div>
															<?
														}

														if($network_phone){
															?>
															<div class="b-sale-geography__network__phone"><strong>Телефон для справок:</strong> <?= $network_phone ?></div>
															<?
														}

														if($website){
															?>
															<div class="b-sale-geography__network__website"><a href="<?= $website ?>" alt="<?= $arNetwork['~NAME'] ?>" rel="nofollow" target="_blank"><?= $website ?></a></div>
															<?
														}
														?>
														</div>
														<?php
														$index = 1; # Порядковый номер объекта на карте
														$arItems = $arNetwork['ELEMENTS'];
														foreach ( $arItems as $arItem ){

															$title =  $arItem['PROPERTIES']['PHARMACY_TYPE']['~VALUE'].' '.$arItem['NAME'];

															$phones = $arItem['PROPERTIES']['PHONES']['~VALUE'];

															$address = $arCity['~NAME'].', ул. '. $arItem['PROPERTIES']['ADDRESS_STREET']['~VALUE'].', дом '.$arItem['PROPERTIES']['ADDRESS_HOUSE']['~VALUE'];
															if(!empty($arItem['PROPERTIES']['ADDRESS_HOUSE2']['~VALUE']))
																$address .= ", корпус ".$arItem['PROPERTIES']['ADDRESS_HOUSE2']['~VALUE'];
															if(!empty($arItem['PROPERTIES']['ADDRESS_OFFICE']['~VALUE']))
																$address .= ", офис ".$arItem['PROPERTIES']['ADDRESS_OFFICE']['~VALUE'];

															$worktime = '';
															if(!empty($arItem['PROPERTIES']['WORKTIME_WEEKDAYS']['~VALUE']))
																$worktime = strtolower($arItem['PROPERTIES']['WORKTIME_WEEKDAYS']['~VALUE']).' (пт-пт)';
															if(!empty($arItem['PROPERTIES']['WORKTIME_SATURDAY']['~VALUE']))
																$worktime .= ', '.strtolower($arItem['PROPERTIES']['WORKTIME_SATURDAY']['~VALUE']).'  (сб)';
															if(!empty($arItem['PROPERTIES']['WORKTIME_SUNDAY']['~VALUE']))
																$worktime .= ', '.strtolower($arItem['PROPERTIES']['WORKTIME_SUNDAY']['~VALUE']).'  (вскр)';

															$payment = '';
															if(!empty($arItem['PROPERTIES']['PAYMENT_TYPE']['~VALUE']))
																$payment = strtolower(implode(', ',$arItem['PROPERTIES']['PAYMENT_TYPE']['~VALUE']));

															$landmark = $arItem['PROPERTIES']['LANDMARK']['~VALUE'];

															#Разбиваем координаты яндекс карты на X и Y координату
															$Yandex = explode(",", $arItem["PROPERTIES"]["MAP"]["~VALUE"]);
															$Yandex_X = $Yandex[0];
															$Yandex_Y = $Yandex[1];

															$yandex_phones = '';
															if(!empty($network_phone))
																$yandex_phones = $network_phone.', ';
															if(!empty($phones))
																$yandex_phones .= $phones;

															?>
															<div class="b-sale-geography__data shop-data"
															     data-index="<?= $index ?>" data-name="<?= $title ?>"
															     data-yandex-x="<?= $Yandex_X ?>"
															     data-yandex-y="<?= $Yandex_Y ?>"
															     data-address="<?= $address ?>"
																<?php if($worktime) { ?>
															     data-worktime="<?= $worktime ?>"
																<?php } ?>
																<?php if($yandex_phones) { ?>
															     data-phone="<?= $yandex_phones ?>"
																<?php } ?>
																data-id="<?= $arItem["ID"] ?>"
															>
																<div class="b-sale-geography__desc" itemprop="description">
																	<div class="b-sale-geography__item_title"><?= $title ?></div>
																	<?php if($phones) { ?>
																		<div class="b-sale-geography__desc_title">Телефон: </div> <div class="b-sale-geography__desc_value"><?= $phones ?></div>
																	<?php } ?>
																	<div class="b-sale-geography__desc_title">Адрес: </div> <div class="b-sale-geography__desc_value"><?= $address ?></div>
																	<?php if($worktime) { ?>
																		<div class="b-sale-geography__desc_title">Время работы: </div> <div class="b-sale-geography__desc_value"><?= $worktime ?></div>
																	<?php } ?>
																	<?php if($payment) { ?>
																		<div class="b-sale-geography__desc_title">Способы оплаты: </div> <div class="b-sale-geography__desc_value"><?= $payment ?></div>
																	<?php } ?>
																	<?php if($landmark) { ?>
																		<div class="b-sale-geography__desc_title">Ориентир: </div> <div class="b-sale-geography__desc_value"><?= $landmark ?></div>
																	<?php } ?>
																	<a href="#map" class="b-sale-geography__map__link" data-lat="<?= $Yandex_X ?>" data-lot="<?= $Yandex_Y ?>">показать на карте</a>
																</div>
															</div>
															<?php
															++$index;
														}
														unset($index);
														?>
													</div>
													<?php
												}
												?>

											</div>
										</div>
									</div>
									<?php
								}
								?>
								<div class="b-sale-geography__delivery">
									<a href="<?=SITE_DIR?>include/forms/delivery/" class="b-sale-geography__delivery__link--dotted" data-type="ajax" title="Хочу купить здесь!">Закажите доставку в удобную аптеку</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="b-sale-geography__map__title"></div>
		<div class="b-sale-geography__map" id="sale-geography-map" data-center="<?= $arResult['CENTER'] ?>"></div>

	</div>
	<?
};


$frame->end();