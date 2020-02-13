/*RS.Application().ready(function () {*/
$(document).ready(function () {

	/* Яндекс.Карта */
	var $sale_geography_ya_map;

	/* кластер Яндекс.Карт */
	var $myClusterer;

	/* шаблон метки Яндекс.Карт */
	var $myBalloonLayout;

    /* география */
    var $sale_geography = $('.js-sale-geography');

    /* яндекс карты */
    var $sale_geography_map = $('#sale-geography-map');

	ymaps.ready(init);

	if (window.location.hash) {
		$sale_geography.find('.collapsed[href="#collapse_' + window.location.hash.split('#')[1] + '"]').click();
	}

	var $sale_geography_accordion = $('#sale_geography_accordion');

	$sale_geography_accordion.on('shown.bs.collapse', function () {
		var $active = $sale_geography.find('.collapse.in').closest('.panel');
		window.location.hash = $active.data('code');
		refreshPlacemarks();
	});

	$sale_geography_accordion.on('hidden.bs.collapse', function () {
		var $active = $sale_geography.find('.collapse.in').closest('.panel');
		window.location.hash = $active.data('code');
		refreshPlacemarks();
	});

	/* фильтр по стране */
	$sale_geography.find('[data-filter]').on('click', function (e) {
		e.preventDefault();

		var filter = $(this).data('filter');

		if (filter) {
			$sale_geography
				.find('.panel')
				.show()
				.not('[data-country="' + filter  + '"]')
				.hide()

			$sale_geography.find('.panel:visible:eq(0) a.collapsed').click();
		} else {
			$sale_geography.find('.panel').show();
		}

		$(this)
			.removeClass('btn-default')
			.addClass('btn-primary')
			.siblings('.btn-primary')
			.removeClass('btn-primary')
			.addClass('btn-default')
	});

	/* заголовок фильтра */

	/* обновляем метки на карте */
	function refreshPlacemarks(all) {

		if(!$sale_geography_ya_map) return;

		/* только магазины открытых панелей */
		$myClusterer.removeAll();

		var Placemark = {}; //Пустой объекта, куда будут помещены точки на для карты

		//Перебираем все блоки с картой и считываем данные для формирования точки и балуна по ранее заданному шаблону
		$sale_geography.find('.b-sale-geography__city'+(!all?'.collapse.in':'')+' .shop-data').each(function(){

			//Координаты точки
			var X = $(this).attr("data-yandex-x");
			var Y = $(this).attr("data-yandex-y");

			$sale_geography_ya_map.setCenter([X,Y],14);

			Obj = $(this).attr("data-index");

			//Создаём объект с заданными координатами и доп.свойствами
			Placemark[Obj] = new ymaps.Placemark([X,Y], {
				name: $(this).attr("data-name"),    //Наименование магазина
				address: $(this).attr("data-address"),  //Адрес
				worktime: $(this).attr("data-worktime"),  //Часы работы
				phone: $(this).attr("data-phone"),  //Контактный телефон
				iconContent: '<div class="b-sale-geography__map__marker">'+$(this).attr("data-index")+"</div>",   //Порядковый номер на карте
			},{
				//Ниже некоторые параметры точки и балуна
				balloonContentLayout: $myBalloonLayout,
				balloonOffset: [5,0],
				balloonCloseButton: true,
				balloonMinWidth: 450,
				balloonMaxWidth:450,
				balloonMinHeught:150,
				balloonMaxHeught:200,
				iconImageHref: '/bitrix/templates/master_default/components/ao/sale.geography/akrustal/images/point.png',  //Путь к картинке точки
				iconImageSize: [58, 80],
				iconImageOffset: [-24, -80],
				iconLayout: 'default#imageWithContent',
				iconactive: '/bitrix/templates/master_default/components/ao/sale.geography/akrustal/images/point.png' //Путь к картинке точки при наведении курсора мыши
			});

			//Добавляем маркер (точку) через кластер
			$myClusterer.add(Placemark[Obj]);

		});

		/* сформируем заголовок карты */
		var sale_geography_map_cities = '';
		var sale_geography_map_title = $('.b-sale-geography__map__title');

		sale_geography_map_title.html();
		if(all)
		{

			sale_geography_map_title.html("<h4>Показаны все точки продаж</h4>");

			var centerX = 60;
			var centerY = 80;
			var defaultZoom = 3;

			var info = $("#sale_geography_accordion");
			var dataCity = info.attr("data-city");
			var dataCountry = info.attr("data-country");
			var dataLat = info.attr("data-lat");
			var dataLng = info.attr("data-lng");

			if (dataCountry !== '') {
				if($(".panel.panel-master[data-name-country='" + dataCountry + "']").length) {
					centerX = dataLat;
					centerY = dataLng;
					defaultZoom = 7;
					sale_geography_map_title.html("<h4>Точки продаж - " + dataCountry + "</h4>");
				}
			}
			if (dataCity !== '') {
				if($(".b-sale-geography__city[data-city-title='" + dataCity + "']").length) {
					centerX = dataLat;
					centerY = dataLng;
					defaultZoom = 11;
					sale_geography_map_title.html("<h4>Точки продаж в городе " + dataCity + "</h4>");
				}
			}

			$sale_geography_ya_map.setZoom( defaultZoom );
			$sale_geography_ya_map.setCenter( [centerX, centerY] );
		}
		else
		{
			if (Object.keys(Placemark).length !== 0)
			{
				$sale_geography.find('.b-sale-geography__city.collapse.in').each(function () {
					var title = $(this).attr("data-city-title");
					sale_geography_map_cities += title+', ';
				});
				sale_geography_map_title.html("<h4>Показаны точки продаж в городах: "+sale_geography_map_cities.substr(0,sale_geography_map_cities.length-2)+"</h4>");
			}
		}

		if (Object.keys(Placemark).length !== 0)
		{
			$sale_geography_map.show();

			//Добавление кластера на карту
			$sale_geography_ya_map.geoObjects.add($myClusterer);
		}
	}

	function init() {

		/* покажем при обновлении меток на карте */
		$sale_geography_map.hide();

        $sale_geography_ya_map = new ymaps.Map("sale-geography-map", {
          center: [55.526127377126,37.504044234375],
          zoom: 12
        });

        /*Кластера - группируем близко расположенные друг к другу объекты, чтобы при отдалении карты появлялась другая иконка
        с количеством объектов в данной точке*/

        var ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="b-sale-geography__map__claster">$[properties.geoObjects.length]</div>');

        /*Параметры иконки кластера, обычно её делают отличной от точки, чтобы пользователь не путал номер объекта
        и количество объектов*/
        var clusterIcons=[{
          href: '/bitrix/templates/master_default/components/ao/sale.geography/akrustal/images/cluster.png',
          size:[58, 80],
          offset:[-24, -80],
        }];

        //Создание самого кластера
        $myClusterer = new ymaps.Clusterer({
            clusterIcons: clusterIcons,
            clusterNumbers:[1],
            zoomMargin: [30],
            clusterIconContentLayout: ClusterContent
        });

        //HTML шаблон балуна, того самого всплывающего блока, который появляется при щелчке на карту
        $myBalloonLayout = ymaps.templateLayoutFactory.createClass(
            '<address class="b-sale-geography__map__balloon">'+
            '<p><strong>$[properties.name]</strong><br /></p>'+
            '<ul class="balloon-info">'+
            '<li><strong>Адрес:&nbsp;</strong>$[properties.address]</li>'+
            '<li><strong>Часы работы:&nbsp;</strong>$[properties.worktime]</li>'+
            '<li><strong>Телефон:&nbsp;</strong>$[properties.phone]</li>'+
            '</ul>' +
            '</address>'
        );

		refreshPlacemarks(true);

        //Запрещаем изменение размеров карты по скролу мыши
        /*map.behaviors.disable("scrollZoom");*/
    };

	// ссылка "показать на карте"
	$('.b-sale-geography__map__link').on('click', function (e) {
		e.preventDefault();

		var lat = $(this).data('lat');
		var lot = $(this).data('lot');

		$('html, body').animate({
			scrollTop: $sale_geography_map.offset().top - 60
		}, 500);

		$sale_geography_ya_map.panTo([lat,lot], {}).then(function (result) {
			$sale_geography_ya_map.setZoom(14, {duration: 300});
		});
	});

	// ссылка показать все
	//$('.b-sale-geography__map__showall__link').on('click', function (e) {
		//e.preventDefault();
		//console.log('4566');
		//var all = true;
		//refreshPlacemarks(true);
	//});
});
