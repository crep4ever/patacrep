<?php 
if(!defined('PLX_ROOT')) exit;

if(!empty($_GET['a'])) $artId = $_GET['a'];
else $artId = '[0-9]{4}';

$NbComsOffline = 0;
if ($aComFiles = $plxAdmin->plxGlob_coms->query('/^_'.$artId.'.(.*).xml$/'))
	$NbComsOffline = sizeof($aComFiles);

$NbComsOnline = 0;
if ($aComFiles = $plxAdmin->plxGlob_coms->query('/^'.$artId.'.(.*).xml$/'))
	$NbComsOnline = sizeof($aComFiles);
	
echo '<ul>';

$menus = array();
$menus[] = '<li><a href="commentaires_offline.php?page=1'.(!empty($_GET['a'])?'&amp;a='.plxUtils::strCheck($_GET['a']):'').'" id="link_commentaires_offline" title="'.L_COMMENTS_OFFLINE_LIST.'">'.L_NEW_COMMENTS_TITLE.'</a> ('.$NbComsOffline.')</li>';
$menus[] = '<li><a href="commentaires_online.php?page=1'.(!empty($_GET['a'])?'&amp;a='.plxUtils::strCheck($_GET['a']):'').'" id="link_commentaires_online" title="'.L_COMMENT_ONLINE_TITLE.'">'.L_VALIDATED_COMMENTS_TITLE.'</a> ('.$NbComsOnline.')</li>';
if(!empty($_GET['a'])) {
	$menus[] = '<li><a href="commentaire_new.php?a='.plxUtils::strCheck($_GET['a']).'" id="link_commentaire_new" title="'.L_COMMENT_NEW_COMMENT_TITLE.'">'.L_COMMENT_NEW_COMMENT.'</a></li>';
}

# Hook Plugins
eval($plxAdmin->plxPlugins->callHook('AdminSousNavigationCommentairesMenus'));

echo implode('', $menus);

echo '</ul>';

?>