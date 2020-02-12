<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
?>

<div class="bx-soa-empty-cart-container">
	<div class="container-fluid">
		<div class="b-cart-empty">
			<div class="b-cart-empty__icon">
				<svg class="icon-svg">
					<use xlink:href="#svg-cart"></use>
				</svg>
			</div>
			<h3 class="b-cart-empty__title">Ваша корзина пуста</h3>
			<div class="b-cart-empty__note">Исправить это просто - посетите наш каталог продукции и наполните
				корзину нужными товарами
			</div>
			<a class="btn btn-primary b-cart-empty__btn" href="/catalog/">Каталог товаров</a>
		</div>
	</div>
</div>