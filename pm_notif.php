<?php

if (!defined('NGCMS')) die ('HAL');

add_act('index', 'pm_notif');

function pm_notif() {
	global $lang, $template, $mysql, $twig, $userROW, $parse;
	
	if (is_array($userROW)) {
	$pm = 0;
	$query = "SELECT p.id, p.subject, p.message, p.from_id, p.date, u.avatar, u.name FROM ".prefix."_pm as p, ".uprefix."_users as u WHERE p.from_id=u.id AND p.viewed='0' AND p.folder='inbox' AND p.to_id=".$userROW['id']." ORDER BY p.id DESC";
    foreach ($mysql->select($query) as $row) {
		$pm++;
		$id = $row['id'];
		$sabj = $row['subject'];
		$text = $parse->htmlformatter($parse->smilies($parse->bbcodes($row['message'])));
		$user = $row['name'];
		$userAvatar = userGetAvatar($row);
	}
}
	$tpath = locatePluginTemplates(array('skins/notif'), 'pm_notif', pluginGetVariable('pm_notif', 'localsource'));
	$xt = $twig->loadTemplate($tpath['skins/notif'].'skins/notif.tpl');
	
	$height = pluginGetVariable('pm_notif', 'height') ? pluginGetVariable('pm_notif', 'height') : '50px';
	$width = pluginGetVariable('pm_notif', 'width') ? pluginGetVariable('pm_notif', 'width') : '50px';
	
	$limit = pluginGetVariable('pm_notif', 'limit') ? pluginGetVariable('pm_notif', 'limit') : '5000';
	$cunt = pluginGetVariable('pm_notif', 'cunt') ? pluginGetVariable('pm_notif', 'cunt') : '200';

	$tVars = array(
		'pm' 	=> $pm,
		'limit' => $limit,
		'text' 	=> substr ($text, 0, $cunt)." ...",
		'sabj' 	=> $sabj,
		'user' 	=> $user,
		'foto' 	=> '<img src="'.$userAvatar[1].'" style="float: left;border-radius: 50%;padding:5px;height: '.$height.';width:'.$width.'" alt=""/>',
		'link' 	=> '<a href="/plugin/pm/?action=read&pmid='.$id.'&location=inbox">прочитать</a>',
	);
	
	if($pm > 0) {
		$xtars = $xt->render($tVars);
	} else {
		$xtars = '';
	}
	
	if (is_array($userROW)) {
		$template['vars']['pm_notif'] = $xtars;
	}else{
		$template['vars']['pm_notif'] = '';
	}

}

?>