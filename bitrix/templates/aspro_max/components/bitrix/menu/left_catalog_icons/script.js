$(document).ready(function(){
	$('.sidebar_menu .sidebar_menu_inner .menu-wrapper').mCustomScrollbar({
		mouseWheel: {
			scrollAmount: 150,
			preventDefault: true
		}
	})

	$('.sidebar_menu .sidebar_menu_inner .menu-wrapper .menu_top_block .menu > li.v_hover > .dropdown-block > .dropdown-inner').mCustomScrollbar({
		mouseWheel: {
			scrollAmount: 150,
			preventDefault: true
		}
	})

	$(document).on('mouseenter', '.menu-wrapper .menu_top_block .menu > li.v_hover', function () {
		var _this = $(this),
			menu = _this.find('> .dropdown-block'),
			block2 = _this.find('.dropdown-block .dropdown-inner'),
			winHeight = $(window).height();

		block2.css('max-height', 'none');
		menu.find('.mCustomScrollBox').css('max-height', 'none');
		var pos = BX.pos(menu[0], true);
		if(pos.height)
		{
			if(_this.hasClass('m_line'))
			{
				if((winHeight - pos.top) < 200)
				{
					if(winHeight < pos.bottom)
					{
						menu.removeAttr('style');
						// block.css('margin-top',  "-" + (pos.bottom - winHeight) + "px");
						menu.css('margin-top',  "-" + (pos.bottom - winHeight + _this.height()) + "px");
						pos = BX.pos(_this.find('.dropdown-block')[0], true);
					}
				}
			}
			if(winHeight < pos.bottom)
				block2.css('max-height', winHeight - pos.top);
				menu.find('.mCustomScrollBox').css('max-height', winHeight - pos.top);
		}
		else
		{
			block2.css('max-height', 'none');
		}

		menu.velocity('stop').velocity('transition.fadeIn', {
			duration: 170,
			delay: 200,
			complete: function(){
				$('body').addClass('menu-hovered');

				if(!$('.shadow-block').length)
					$('<div class="shadow-block"></div>').appendTo($('body'));
				$('.shadow-block').velocity('stop').velocity('fadeIn', 200);
			}
		});

		_this.one('mouseleave', function () {

			menu.velocity('stop').velocity('transition.fadeOut', {
				duration: 100,
				delay: 10,
				complete: function(){
					$('.shadow-block').velocity('stop').velocity('fadeOut', {
						duration: 200,
						// delay: 100,
						complete: function(){
							$('body').removeClass('menu-hovered');
						}
					});
				}
			});
		});
	});

	/*$('.menu-wrapper .menu_top_block .menu > li.v_hover').hover(function(e) {
		var _this = $(this),
			block = _this.find('.dropdown-block'),
			block2 = _this.find('.dropdown-block .dropdown-inner'),
			winHeight = $(window).height();
		block2.css('max-height', 'none');
		block.find('.mCustomScrollBox').css('max-height', 'none');
		var pos = BX.pos(block[0], true);
		if(pos.height)
		{
			if(_this.hasClass('m_line'))
			{
				if((winHeight - pos.top) < 200)
				{
					if(winHeight < pos.bottom)
					{
						block.removeAttr('style');
						// block.css('margin-top',  "-" + (pos.bottom - winHeight) + "px");
						block.css('margin-top',  "-" + (pos.bottom - winHeight + _this.height()) + "px");
						pos = BX.pos(_this.find('.dropdown-block')[0], true);
					}
				}
			}
			if(winHeight < pos.bottom)
				block2.css('max-height', winHeight - pos.top);
				block.find('.mCustomScrollBox').css('max-height', winHeight - pos.top);
		}
		else
		{
			block2.css('max-height', 'none');
		}
	})*/
})