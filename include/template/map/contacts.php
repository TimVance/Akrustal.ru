<div class="b-map-contacts__content">
    <?$APPLICATION->IncludeComponent(
          "bitrix:main.include",
          "",
          array(
              "AREA_FILE_SHOW" => "file",
              "PATH" => "/include/index/map_contacts.php",
              "EDIT_TEMPLATE" => ""
          ),
        false
    );?>
</div>
<a href="/contacts/" class="b-map-contacts__link">Контакты</a>