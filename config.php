<?php

if (!defined('NGCMS')) die ('HAL');

pluginsLoadConfig();
LoadPluginLang('pm_notif', 'config', '', '', '#');

if (!getPluginStatusActive('pm')) {
	msg(['type' => 'error', 'text' => $lang['pm_error']]);
	return print_msg( 'warning', $lang['pm_notif']['pm_notif'], $lang['pm_notif']['pm_error'], 'javascript:history.go(-1)' );
}

switch ($_REQUEST['action']) {
	case 'about':			about();		break;
	default: main();
}

function about()
{global $twig, $lang, $breadcrumb;
	$tpath = locatePluginTemplates(array('main', 'about'), 'pm_notif', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-comment-o btn-position"></i><span class="text-semibold">'.$lang['pm_notif']['pm_notif'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=pm_notif' => '<i class="fa fa-comment-o btn-position"></i>'.$lang['pm_notif']['pm_notif'].'',  '<i class="fa fa-exclamation-circle btn-position"></i>'.$lang['pm_notif']['about'].'' ) );

	$xt = $twig->loadTemplate($tpath['about'].'about.tpl');
	$tVars = array();
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$about = 'версия 0.1';
	
	$tVars = array(
		'global' => 'О плагине',
		'header' => $about,
		'entries' => $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}

function main()
{global $twig, $lang, $breadcrumb;
	
	$tpath = locatePluginTemplates(array('main', 'general.from'), 'pm_notif', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-comment-o btn-position"></i><span class="text-semibold">'.$lang['pm_notif']['pm_notif'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=pm_notif' => '<i class="fa fa-comment-o btn-position"></i>'.$lang['pm_notif']['pm_notif'].'' ) );

	if (isset($_REQUEST['submit'])){
		pluginSetVariable('pm_notif', 'localsource', (int)$_REQUEST['localsource']);
		pluginSetVariable('pm_notif', 'height', intval($_REQUEST['height']));
		pluginSetVariable('pm_notif', 'width', intval($_REQUEST['width']));
		pluginSetVariable('pm_notif', 'limit', intval($_REQUEST['limit']));
		pluginSetVariable('pm_notif', 'cunt', intval($_REQUEST['cunt']));
		pluginsSaveConfig();
		msg(array("type" => "info", "info" => "сохранение прошло успешно"));
		return print_msg( 'info', ''.$lang['pm_notif']['pm_notif'].'', 'Cохранение прошло успешно', '?mod=extra-config&plugin=pm_notif' );
	}
	
	$height = pluginGetVariable('pm_notif', 'height');
	$width = pluginGetVariable('pm_notif', 'width');
	$limit = pluginGetVariable('pm_notif', 'limit');
	$limit = '<option value="5000" '.($limit==5000?'selected':'').'>по умолчанию</option><option value="10000" '.($limit==10000?'selected':'').'>10сек</option><option value="30000" '.($limit==30000?'selected':'').'>30сек</option><option value="120000" '.($limit==120000?'selected':'').'>1мин</option>';
	$cunt = pluginGetVariable('pm_notif', 'cunt');

	$xt = $twig->loadTemplate($tpath['general.from'].'general.from.tpl');
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$tVars = array(
		'localsource'       => MakeDropDown(array(0 => 'Шаблон сайта', 1 => 'Плагина'), 'localsource', (int)pluginGetVariable('pm_notif', 'localsource')),
		'height' => $height,
		'width' => $width,
		'cunt' => $cunt,
		'limit' => $limit,
	);
	
	$tVars = array(
		'global' => 'Общие',
		'header' => '<i class="fa fa-exclamation-circle"></i> <a href="?mod=extra-config&plugin=pm_notif&action=about">'.$lang['pm_notif']['about'].'</a>',
		'entries' => $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}

?>