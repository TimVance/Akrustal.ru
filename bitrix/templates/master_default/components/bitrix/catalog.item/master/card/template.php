<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>

<article class="product-item" itemscope itemtype="http://schema.org/Product">
	<a class="product-item-image-wrapper" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>" data-entity="image-wrapper" style="display: inline;">
		<?/*
		<span class="product-item-image-original" id="<?=$itemIds['PICT']?>"
			style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>);"
            itemprop="image"></span>
*/?>
        <span>
            <img class="product-item-image-pic" id="<?=$itemIds['PICT']?>" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['PREVIEW_PICTURE']['ALT']?>" title="<?=$item['PREVIEW_PICTURE']['TITLE']?>">
        </span>

            <meta itemprop="width" content="<?=$item['PREVIEW_PICTURE']['WIDTH']?>">
            <meta itemprop="height" content="<?=$item['PREVIEW_PICTURE']['HEIGHT']?>">

		<?
		if ($item['LABEL'])
		{
			?>
			<span class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>" style="top: 20px;">
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
					{
                        $sLabelStyle = '';
                        if (substr($item['PROPERTIES'][$code]['VALUE_XML_ID'], 0, 1) == '#') {
                            $sLabelStyle = ' style="background:'.$item['PROPERTIES'][$code]['VALUE_XML_ID'].'"';
                        }
						?>
						<span class="product-item-label-text-item<?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' hidden-xs' : '')?>">
							<span title="<?=$value?>"<?if (strlen($sLabelStyle) > 0){ echo $sLabelStyle; }?>><?=$value?></span>
						</span>
						<?
					}
				}
				?>
			</span>
			<?
		}
		?>
	</a>
	<h2 class="product-item-title">
		<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>" itemprop="name"><?=$productTitle?></a>
	</h2>
	<div class="product-item-desc">
		<?=\Akrustal\Lib\Utils::getTextBySize($item['~PREVIEW_TEXT'],300);?>
	</div>
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>
					<div class="product-item-info-container product-item-price-container" data-entity="price-block">
                        <div class="product-item-info-container-title"><?=Loc::getMessage('RS.MASTER.BCI_MASTER.PRICE')?>:</div>
                        <span
                            class="product-item-price-current<?=($price['RATIO_PRICE'] < $price['RATIO_BASE_PRICE'] ? ' discount' : '')?>"
                            id="<?=$itemIds['PRICE']?>">
                            <?
                            if ($actualItem['CAN_BUY']) {
                                if (!empty($price))
                                {
                                    if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
                                    {
                                        echo Loc::getMessage(
                                            'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
                                            array(
                                                '#PRICE#' => $price['PRINT_RATIO_PRICE'],
                                                '#VALUE#' => $measureRatio,
                                                '#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
                                            )
                                        );
                                    }
                                    else
                                    {
                                        echo $price['PRINT_RATIO_PRICE'];
                                    }
                                }
                            } else {
                                echo Loc::getMessage('RS.MASTER.BCI_MASTER.NO_PRICE');
                            }
                            ?>
                        </span>
                        <?
                        if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                        {
                            ?>
                            &nbsp;<span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
                                <?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
                                <?=$price['PRINT_RATIO_BASE_PRICE']?>
                            </span>
                            <?
                        }
                        ?>
					</div>
					<?
					break;
/*
				case 'quantityLimit':
					if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
					{
						if ($haveOffers)
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>"
									style="display: none;" data-entity="quantity-limit-block">
									<div class="product-item-info-container-title">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
									</div>
								</div>
								<?
							}
						}
						else
						{
							if (
								$measureRatio
								&& (float)$actualItem['CATALOG_QUANTITY'] > 0
								&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
								&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
							)
							{
								?>
								<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>">
									<div class="product-item-info-container-title">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity">
											<?
											if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
											{
												if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
												{
													echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
												}
												else
												{
													echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
												}
											}
											else
											{
												echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
											}
											?>
										</span>
									</div>
								</div>
								<?
							}
						}
					}

					break;
*/
				case 'quantity':
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container" data-entity="quantity-block">
                                <div class=" product-item-amount dropdown">
                                    <div class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="<?=$itemIds['QUANTITY_MENU']?>">
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="tel"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
                                        <span class="product-item-amount-measure" id="<?=$itemIds['QUANTITY_MEASURE']?>">
                                            <?=$actualItem['ITEM_MEASURE']['TITLE']?>
                                        </span>
                                        <?/*<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>*/?>
                                        <svg class="product-item-amount-icon icon-svg"><use xlink:href="#svg-chevron-down"></use></svg>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="<?=$itemIds['QUANTITY_MENU']?>">
                                        <?php for($i = 1; $i < 10; $i++): ?>
                                            <li class="product-item-amount-var"><a href="javascript:;"><?=$measureRatio*$i;?></a></li>
                                        <?php endfor; ?>
                                        <li><a class="product-item-amount-custom" href="javascript:;"><?=$measureRatio*10;?>+</a></li>
                                    </ul>
                                </div>
							</div>
							<?
						}
					}
/*
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<a class="product-item-amount-field-btn-minus" id="<?=$itemIds['QUANTITY_DOWN']?>"
											href="javascript:void(0)" rel="nofollow">
										</a>
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="tel"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
										<a class="product-item-amount-field-btn-plus" id="<?=$itemIds['QUANTITY_UP']?>"
											href="javascript:void(0)" rel="nofollow">
										</a>
										<span class="product-item-amount-description-container">
											<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
											<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
										</span>
									</div>
								</div>
							</div>
							<?
						}
					}
*/
					break;

				case 'buttons':
					?>
					<div class="product-item-info-container" data-entity="buttons-block">
						<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'] && $arParams['IS_USE_CART'] == 'Y')
							{
								?>
								<div class="product-item-button-container js-buy" id="<?=$itemIds['BASKET_ACTIONS']?>" data-productid="<?=$actualItem['ID']?>">
									<a class="btn btn-primary <?=$buttonSizeClass?> js-buy__add2cart" id="<?=$itemIds['BUY_LINK']?>"
										href="javascript:void(0)" rel="nofollow">
										<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
									</a>
                                    <a href="<?=$arParams['BASKET_URL']?>" class="btn btn-primary js-buy__incart"><?=Loc::getMessage('RS.MASTER.BCI_MASTER.GOTO_CART')?></a>
									<a class="btn btn-primary" data-type="ajax" title="Заказать в 1 клик" href="/include/forms/product_ask/?element_id=<?=$actualItem['ID']?>">
										<span>Помощь оператора</span>
									</a>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<?
/*
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
                                    ?>
									<a class="btn btn-default <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="<?=$item['DETAIL_PAGE_URL']?>" rel="nofollow">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
*/
                                    ?>
									<a class="btn btn-default <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="<?=$item['DETAIL_PAGE_URL']?>" rel="nofollow">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
/*
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $item['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										style="display: <?=($actualItem['CAN_BUY'] ? 'none' : '')?>;">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
									<div id="<?=$itemIds['BASKET_ACTIONS']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
										<a class="btn btn-default <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)" rel="nofollow">
											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
										</a>
									</div>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<a class="btn btn-default <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
*/
						?>
					</div>
					<?
					break;

				case 'props':
					if (!$haveOffers)
					{
						if (!empty($item['DISPLAY_PROPERTIES']))
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
									{
										?>
										<dt<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
											<?=$displayProperty['NAME']?>
										</dt>
										<dd<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
											<?=(is_array($displayProperty['DISPLAY_VALUE'])
												? implode(' / ', $displayProperty['DISPLAY_VALUE'])
												: $displayProperty['DISPLAY_VALUE'])?>
										</dd>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}

						if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
						{
							?>
							<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
								<?
								if (!empty($item['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
										?>
										<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
											value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
										<?
										unset($item['PRODUCT_PROPERTIES'][$propID]);
									}
								}

								if (!empty($item['PRODUCT_PROPERTIES']))
								{
									?>
									<table>
										<?
										foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
										{
											?>
											<tr>
												<td><?=$item['PROPERTIES'][$propID]['NAME']?></td>
												<td>
													<?
													if (
														$item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
														&& $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
													)
													{
														foreach ($propInfo['VALUES'] as $valueID => $value)
														{
															?>
															<label>
																<? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
																<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
																	value="<?=$valueID?>" <?=$checked?>>
																<?=$value?>
															</label>
															<br />
															<?
														}
													}
													else
													{
														?>
														<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]">
															<?
															foreach ($propInfo['VALUES'] as $valueID => $value)
															{
																$selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
																?>
																<option value="<?=$valueID?>" <?=$selected?>>
																	<?=$value?>
																</option>
																<?
															}
															?>
														</select>
														<?
													}
													?>
												</td>
											</tr>
											<?
										}
										?>
									</table>
									<?
								}
								?>
							</div>
							<?
						}
					}
					else
					{
						$showProductProps = !empty($item['DISPLAY_PROPERTIES']);
						$showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

						if ($showProductProps || $showOfferProps)
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									if ($showProductProps)
									{
										foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
										{
											?>
											<dt<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
												<?=$displayProperty['NAME']?>
											</dt>
											<dd<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
												<?=(is_array($displayProperty['DISPLAY_VALUE'])
													? implode(' / ', $displayProperty['DISPLAY_VALUE'])
													: $displayProperty['DISPLAY_VALUE'])?>
											</dd>
											<?
										}
									}

									if ($showOfferProps)
									{
										?>
										<span id="<?=$itemIds['DISPLAY_PROP_DIV']?>" style="display: none;"></span>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}
					}
					break;
/*
				case 'sku':
					if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
						?>
						<div id="<?=$itemIds['PROP_DIV']?>">
							<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
								<div class="product-item-info-container product-item-hidden" data-entity="sku-block">
									<div class="product-item-scu-container" data-entity="sku-line-block">
										<?=$skuProperty['NAME']?>
										<div class="product-item-scu-block">
											<div class="product-item-scu-list">
												<ul class="product-item-scu-item-list">
													<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
															<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-color-block">
																	<div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
																		style="background-image: url(<?=$value['PICT']['SRC']?>);">
																	</div>
																</div>
															</li>
															<?
														}
														else
														{
															?>
															<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-text-block">
																	<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
																</div>
															</li>
															<?
														}
													}
													?>
												</ul>
												<div style="clear: both;"></div>
											</div>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div>
						<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
*/
				case 'sku':
                    if (
                        $arParams['DISPLAY_COMPARE']
                        && (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
                    )
                    {
                        ?>
                        <div class="product-item-compare-container">
                            <div class="product-item-compare">
                                <div class="checkbox">
                                    <label id="<?=$itemIds['COMPARE_LINK']?>">
                                        <input type="checkbox" data-entity="compare-checkbox">
                                        <span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?
                    }
					break;
			}
		}
	}
	?>
</article>
