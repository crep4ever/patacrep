<?php 
if(!defined('PLX_ROOT')) exit;

echo '<ul>';

$menus = array();
$menus[] = '<li><a href="parametres_base.php" id="link_config1" title="'.L_MENU_CONFIG_BASE_TITLE.'">'.L_MENU_CONFIG_BASE.'</a></li>';
$menus[] = '<li><a href="parametres_affichage.php" id="link_view" title="'.L_MENU_CONFIG_VIEW_TITLE.'">'.L_MENU_CONFIG_VIEW.'</a></li>';
$menus[] = '<li><a href="parametres_users.php" id="link_users" title="'.L_MENU_CONFIG_USERS_TITLE.'">'.L_MENU_CONFIG_USERS.'</a></li>';
$menus[] = '<li><a href="parametres_avances.php" id="link_config2" title="'.L_MENU_CONFIG_ADVANCED_TITLE.'">'.L_MENU_CONFIG_ADVANCED.'</a></li>';
$menus[] = '<li><a href="parametres_plugins.php" id="link_plugins2" title="'.L_MENU_CONFIG_PLUGINS_TITLE.'">'.L_MENU_CONFIG_PLUGINS.'</a></li>';
$menus[] = '<li><a href="parametres_infos.php" id="link_info" title="'.L_MENU_CONFIG_INFOS_TITLE.'">'.L_MENU_CONFIG_INFOS.'</a></li>';
	
# Hook Plugins
eval($plxAdmin->plxPlugins->callHook('AdminSousNavigationParametresMenus'));

echo implode('', $menus);	
	
echo '</ul>';

?>