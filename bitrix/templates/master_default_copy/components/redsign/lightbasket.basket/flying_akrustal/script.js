'use strict';

function RSFlyingCart(params) {
  this.id = params['ID'];
  this.$cart = $("#" + this.id);
  this.$content = this.$cart.find('.flying-cart__content');
  this.$btn = this.$cart.find('.flying-cart__icon');

  this.templateName = params['TEMPLATE_NAME'];
  this.arParams = params['TEMPLATE_PARAMS'];
  this.ajaxPath = params['AJAX_PATH'];
  this.siteId = params['SITE_ID'];

  this.resize();

  BX.addCustomEvent('add2basket.rs_lightbasket', $.proxy(this.add2cart, this));
  BX.addCustomEvent('clear.rs_lightbasket', $.proxy(this.refresh, this));
  BX.addCustomEvent('delete.rs_lightbasket', $.proxy(this.refresh, this));
  BX.addCustomEvent('update.rs_lightbasket', $.proxy(this.refresh, this));
  //this.$btn.on('click', $.proxy(this.openPopup, this)); Орлов А. не используем высплывающее окно
  $(window).on('resize.flycart', BX.debounce($.proxy(this.resize, this), 250));

  this.initContentEvents();
}

RSFlyingCart.prototype.initContentEvents = function() {
  this.$content.find('.product-item-amount .dropdown-menu > li').on('click', this.changeQuantity);
  this.$content.find('.product-item-amount-field').on('change', $.proxy(this.updateQuantity, this));
  this.$content.find('.dropdown').on('show.bs.dropdown', $.proxy(this.quantityDropdownPosition, this));

  this.$content.find('.js-cart__remove').on('click', $.proxy(function (e) {
    e.preventDefault();
    this.startLoader();
    var id = $(e.target).closest('[data-id]').data('id');
    Basket.delete(id);
  }, this));

  this.$content.find('.js-cart__clear').on('click', $.proxy(function() {
    this.startLoader();
    Basket.clear();
  }, this));
}

RSFlyingCart.prototype.refresh = function() {
    this.startLoader();

    // Орлов А.
    this.updateBasketTotalSum();

	this.hideOrShow();

	if (this.isShown()) {
		this.$cart
			.css('transition', '0s')
			.css('height', this.$content.outerHeight());

		setTimeout($.proxy(function () {
			this.$cart.css('transition', '');
		}, this), 0);
	}

	this.initContentEvents();
	this.endLoader();

  /*BX.ajax({
    url: this.ajaxPath,
    method: 'POST',
    dataType: 'json',
    data: {
      action: 'get',
      sessid: BX.bitrix_sessid(),
      templateName: this.templateName,
      arParams: this.arParams,
      siteId: this.siteId
    },
    onsuccess: function(result) {
      this.$content.html(result['CONTENT']);
      this.updateCount(result['COUNT']);
      this.hideOrShow();

      if (this.isShown()) {
        this.$cart
          .css('transition', '0s')
          .css('height', this.$content.outerHeight());

        setTimeout($.proxy(function () {
          this.$cart.css('transition', '');
        }, this), 0);
      }

      this.initContentEvents();
      this.endLoader();
    }.bind(this)
  });*/
}

RSFlyingCart.prototype.hideOrShow = function() {
  if (RS.Application().inBreakpoint('xs') && Basket && Basket.inbasket().length > 0) {
    this.$cart.show();

    $(document).on('keyup.cart_escape', $.proxy(function (e) {
      if (e.keyCode === 27) {
        this.closePopup();
      }
    }, this));

  } else if (!this.isShown()) {
    this.$cart.hide();

    $(document).off('keyup.cart_escape');
  }
}

RSFlyingCart.prototype.resize = function() {
  this.hideOrShow();
  this.position();
}

RSFlyingCart.prototype.position = function() {
  var cartButtonWidth = 95;
  var container = $('<div>').addClass('container').css('visibility', 'hidden');
  $('body').append(container);
  var containerWidth = container.outerWidth();
  var containerOffsetLeft = container.offset().left + containerWidth;
  var windowWidth = $(window).outerWidth();

  this.$cart.css('right', (windowWidth > containerOffsetLeft + cartButtonWidth) ? windowWidth - containerOffsetLeft - cartButtonWidth : 15);
  container.remove();
}

RSFlyingCart.prototype.openPopup = function() {

  if (!RS.Application().inBreakpoint('sm')) {
    window.location.href = this.arParams['PATH_TO_CART'];
    return;
  }

  var that = this;

  this.$cart
    .css('height', this.$content.outerHeight())
    .css('top', this.$cart.offset().top)
    .css('position', 'absolute')
    .addClass('is-open')

  $('body').append('<div class="fancybox-container fancybox-is-open"><div class="fancybox-bg"></div></div>');
  this.$cart.trigger('open.rs.flying_cart');


  $('.fancybox-container').on('click.close-cart', function() {
    if (!$(this).is(that.$cart) || that.$cart.find(this).length !== 0) {
      that.closePopup();
      $('.fancybox-container').off('click.close-cart');
      that.$cart.off('click.close-cart');
    }
  });

  this.$cart.on('click.close-cart', '.js-cart-close', function(event) {
    event.preventDefault();
    that.closePopup();
    $('.fancybox-container').off('click.close-cart');
    that.$cart.off('click.close-cart');
  });
}

RSFlyingCart.prototype.closePopup = function() {
  this.$cart
    .css('height', '')
    .css('top', '')
    .css('position', '')
    .removeClass('is-open');

  $('.fancybox-container').remove();
  $(this.$cart).trigger('close.rs.flying_cart');
}

RSFlyingCart.prototype.changeQuantity = function() {
  var $el = $(this);
  if ($el.hasClass('product-item-amount-var')) {
    $el.closest('.product-item-amount').find('.product-item-amount-field').val($el.text()).change();
  } else {
    $el.closest('.product-item-amount').find('.product-item-amount-field').val('').focus();
  }
}

RSFlyingCart.prototype.updateQuantity = function(e) {
  this.startLoader();

  var $input = $(e.target);
  var quantity = parseFloat($input.val(), 10);
  var itemId = $input.closest('[data-id]').data('id');
  var defer = $.Deferred();

  var request = Basket.updateQuantity(itemId, quantity);
}

// Орлов А. получаем сумму товаров в Bitrix
RSFlyingCart.prototype.updateBasketTotalSum = function() {

	var basketArParams = {
		"HIDE_ON_BASKET_PAGES" :"Y",
		"PATH_TO_BASKET" : "/cart/",
		"PATH_TO_ORDER" : "/cart/order/",
		"PATH_TO_PERSONAL" : "/personal/",
		"PATH_TO_PROFILE" : "/personal/",
		"PATH_TO_REGISTER" : "/login/?register=yes",
		"POSITION_FIXED" :"Y",
		"POSITION_HORIZONTAL" :"right",
		"POSITION_VERTICAL" :"top",
		"SHOW_AUTHOR" :"Y",
		"SHOW_DELAY" :"N",
		"SHOW_EMPTY_VALUES" :"Y",
		"SHOW_IMAGE" :"Y",
		"SHOW_NOTAVAIL" :"N",
		"SHOW_NUM_PRODUCTS" :"Y",
		"SHOW_PERSONAL_LINK" :"N",
		"SHOW_PRICE" :"Y",
		"SHOW_PRODUCTS" :"Y",
		"SHOW_SUMMARY" :"Y",
		"SHOW_TOTAL_PRICE" :"Y",
		"AJAX": "Y",
	};

	BX.ajax({
		url: '/bitrix/components/bitrix/sale.basket.basket.line/ajax.php',
		method: 'POST',
		dataType: 'json',
		data: {
			action: 'post',
			sessid: BX.bitrix_sessid(),
			templateName: 'ajax_template',
			arParams: basketArParams,
			siteId: this.siteId
		},
		onsuccess: function(result) {
			var total_sum = result['total_sum']+' &#8381;';

			this.$cart = $("#flycart");
			this.$content = this.$cart.find('.flying-cart__content');
			this.$btn = this.$cart.find('.flying-cart__icon');

			this.$content.html(total_sum);
			this.$btn.find('.flying-cart__count').html(total_sum);
			$('.js-mobile-cart-icon').html(total_sum);
		}.bind(this)
	});

}

RSFlyingCart.prototype.updateCount = function(sum) {
	this.$btn.find('.flying-cart__count').html(sum);
	$('.js-mobile-cart-icon').html(sum)
}

RSFlyingCart.prototype.quantityDropdownPosition = function(e) {
  var scrollTop = this.$content.find('.js-cart__products').scrollTop();
  var $target = $(e.target);
  $target.find('.dropdown-menu').css('margin-top', -scrollTop + 2);

  this.$content.find('.js-cart__products').one('scroll.dropdown', function() {
    $target.removeClass('open');
  });
}

RSFlyingCart.prototype.isShown = function() {
  return this.$cart.hasClass('is-open');
}

RSFlyingCart.prototype.startLoader = function () {
  this.$cart.addClass('is-loading');
}

RSFlyingCart.prototype.endLoader = function () {
  this.$cart.removeClass('is-loading');
}

RSFlyingCart.prototype.add2cart = function () {
  this.$cart.addClass('in-cart-animation');
  setTimeout($.proxy(function () {
      this.$cart.removeClass('in-cart-animation');
  }, this), 500);

  this.refresh();
}
