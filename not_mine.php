<?
//Замените названия module.name1, module.name2, module.name3 и так далее на модули которые хотите скрыть от серверов битрикса
$arModules = array(
'redsign.master',
'redsign.lightbasket',
'redsign.devfunc',
'step2use.redirects',
'acrit.exportpro'
);

foreach($arModules as $val){
    if(isset($arClientModules[$val])) unset($arClientModules[$val]);
}