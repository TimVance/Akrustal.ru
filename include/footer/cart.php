<?$APPLICATION->IncludeComponent(
    "redsign:lightbasket.basket",
    "flying_akrustal",
    array(
        "COMPONENT_TEMPLATE" => "master",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "1",
        "PROPS" => array(
            0 => "CML2_ARTICLE",
            1 => "",
        ),
        "PATH_TO_ORDER" => "/cart/order/",
        "AJAX_MODE" => "N",
        "PATH_TO_CART" => "/cart/",
        "PATH_TO_CATALOG" => "/catalog/",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO"
    ),
    false
);?>