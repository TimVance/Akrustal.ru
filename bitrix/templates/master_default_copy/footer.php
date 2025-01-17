<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
  die();
}

\Bitrix\Main\Loader::includeModule('redsign.master');

use \Bitrix\Main\Application;
use \Bitrix\Main\Localization\Loc;
use \Redsign\Master\SVGIconsManager;
use \Redsign\Master\MyTemplate;

Loc::loadMessages(__FILE__);

$isHideSidebar = $APPLICATION->GetProperty('hide_sidebar') == 'Y';
if(!$isHideSidebar) {
    $sPageClasses = ' has-sidebar';
    $sPageClasses .= ($APPLICATION->GetProperty('sidebar_position') == 'right' ? ' is-right' : ' is-left');

    $APPLICATION->AddViewContent('has-sidebar', $sPageClasses);
} elseif ($APPLICATION->GetProperty('wide_page') != 'Y') {
    $APPLICATION->AddViewContent('has-sidebar', ' has-container');
}

$APPLICATION->AddViewContent('svg-icons', SVGIconsManager::releaseSVG());
?>
            </div><!--l-page__content-->
            <?php if (!$isHideSidebar): ?>
                <aside class="l-page__sidebar">

                    <?php
                    $sSidebarPath = $APPLICATION->GetProperty('sidebar-path');
                    ?>

                    <?php if (strlen($sSidebarPath) > 0 && file_exists(Application::getDocumentRoot().$sSidebarPath)):?>

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => $sSidebarPath,
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>

                    <?php else: ?>

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "sect",
                                "AREA_FILE_SUFFIX" => "sidebar",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>

                    <?php endif; ?>

                </aside>
            <?php endif; ?>
        </div><!--l-page-->
        <?php include 'include/footers/'.(MyTemplate::getInstance()->getFootType()).'.php'; ?>
    </div><!--wrapper-->

    <?$APPLICATION->IncludeFile(
  		SITE_DIR."include/footer/cart.php",
  		Array(),
  		Array("MODE"=>"html")
  	);?>

    <script>
    var template_path = '<?=SITE_TEMPLATE_PATH?>';
    $('#svg-icons').setHtmlByUrl({url:template_path+'/assets/images/icons.svg?123312347'});
    </script>

	<?$APPLICATION->IncludeFile(
		SITE_DIR."include/tuning/component.php",
		Array(),
		Array("MODE"=>"html")
	);?>

    <?$APPLICATION->IncludeFile(SITE_DIR."include/template/body_end.php", array(), array("MODE" => "html"))?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>
<script src="https://akrustal.ru/bitrix/templates/master_default_copy/promo.js"></script>
</body>
</html>
