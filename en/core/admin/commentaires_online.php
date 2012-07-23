<?php

/**
 * Listing des commentaires en attente de validation
 *
 * @package PLX
 * @author	Stephane F 
 **/

include(dirname(__FILE__).'/prepend.php');
# Hook Plugins
eval($plxAdmin->plxPlugins->callHook('AdminCommentsOnlinePrepend'));

# Control de l'accès à la page en fonction du profil de l'utilisateur connecté
$plxAdmin->checkProfil(PROFIL_ADMIN, PROFIL_MANAGER, PROFIL_MODERATOR);

# Suppression des commentaires selectionnes
if(isset($_POST['selection']) AND $_POST['selection'] == 'delete' AND isset($_POST['idCom'])) {
	foreach ($_POST['idCom'] as $k => $v) $plxAdmin->delCommentaire($v);
	header('Location: commentaires_online.php'.(!empty($_GET['a'])?'?a='.$_GET['a']:''));
	exit;
}
# Mise hors-ligne des commentaires selectionnes
elseif (isset($_POST['selection']) AND ($_POST['selection'] == 'offline') AND isset($_POST['idCom'])) {
	foreach ($_POST['idCom'] as $k => $v) $plxAdmin->modCommentaire($v);
	header('Location: commentaires_online.php'.(!empty($_GET['a'])?'?a='.$_GET['a']:''));
	exit;
}

# Commentaires d'un article, on check
if(!empty($_GET['a'])) {
	# Infos sur notre article
	if(!$globArt = $plxAdmin->plxGlob_arts->query('/^'.$_GET['a'].'.(.*).xml$/','','sort',0,1)) { # Article inexistant 
		plxMsg::Error(L_COMMENT_ONLINE_ERROR_MSG);
		header('Location: index.php');
		exit;
	}
	$aArt = $plxAdmin->parseArticle(PLX_ROOT.$plxAdmin->aConf['racine_articles'].$globArt['0']);
	$portee = ''.L_COMMENT_ONLINE_ARTICLE.' &laquo;'.plxUtils::strCheck(plxUtils::strCut($aArt['title'],80)).'&raquo;';
	$artRegex = $_GET['a'];
} else { # Commentaires globaux
	$portee = ''.L_COMMENT_ONLINE_SITE.'';
	$artRegex = '[0-9]{4}';
}

# On inclut le header
include(dirname(__FILE__).'/top.php');
?>

<h2><?php echo L_COMMENT_ONLINE_TITLE . ' (' . $portee; ?>)</h2>

<?php eval($plxAdmin->plxPlugins->callHook('AdminCommentsOnlineTop')) # Hook Plugins ?>

<form action="commentaires_online.php<?php echo !empty($_GET['a'])?'?a='.plxUtils::strCheck($_GET['a']):'' ?>" method="post" id="form_comments">
<table class="table">
<thead>
	<tr>
		<th style="width:5px"><input type="checkbox" onclick="checkAll(this.form, 'idCom[]')" /></th>
		<th style="width:110px"><?php echo L_COMMENTS_LIST_DATE ?></th>
		<th style="width:100px"><?php echo L_COMMENTS_LIST_AUTHOR ?></th>
		<th><?php echo L_COMMENTS_LIST_MESSAGE ?></th>
		<th style="width:200px"><?php echo L_COMMENTS_LIST_ACTION ?></th>
	</tr>
</thead>
<tbody>
	
<?php
# On va récupérer les commentaires publiés pour cette page
$plxAdmin->getPage();
$start = $plxAdmin->aConf['bypage_admin_coms']*($plxAdmin->page-1);
$coms = $plxAdmin->getCommentaires('/^'.$artRegex.'.(.*).xml$/','rsort',$start,$plxAdmin->aConf['bypage_admin_coms'],'all');
if($coms) { # On a des commentaires
	$num=0;
	while($plxAdmin->plxRecord_coms->loop()) { # On boucle
		$year = substr($plxAdmin->plxRecord_coms->f('date'),0,4);
		$month = substr($plxAdmin->plxRecord_coms->f('date'),5,2);
		$day = substr($plxAdmin->plxRecord_coms->f('date'),8,2);
		$time = substr($plxAdmin->plxRecord_coms->f('date'),11,8);
		$artId = $plxAdmin->plxRecord_coms->f('article');
		$id = $artId.'.'.$plxAdmin->plxRecord_coms->f('numero');
		# On coupe le commentaire mais attention aux entités HTML
		if($plxAdmin->plxRecord_coms->f('type') == 'admin')
			$content = plxUtils::strCut(strip_tags($plxAdmin->plxRecord_coms->f('content')),70);
		else
			$content = plxUtils::strCheck(plxUtils::strCut(plxUtils::strRevCheck($plxAdmin->plxRecord_coms->f('content')),70));
		# On génère notre ligne
		echo '<tr class="line-'.(++$num%2).'">';
		echo '<td><input type="checkbox" name="idCom[]" value="'.$id.'" /></td>';
		echo '<td>&nbsp;'.$day.'/'.$month.'/'.$year.' '.$time.'</td>';
		echo '<td>&nbsp;'.plxUtils::strCut($plxAdmin->plxRecord_coms->f('author'),15).'</td>';
		echo '<td>&nbsp;<a href="'.PLX_ROOT.'?article'.intval($artId).'/#c'.$plxAdmin->plxRecord_coms->f('numero').'" title="'.L_COMMENT_ONLINE_TITLE.'">'.$content.'</a></td>';
		echo '<td style="text-align:center"> ';
		echo '<a href="commentaire.php?c='.$id.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:'').'" title="'.L_COMMENT_EDIT_TITLE.'">'.L_COMMENT_EDIT.'</a> - ';
		echo '<a href="commentaire_new.php?c='.$id.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:'').'" title="'.L_COMMENT_ANSWER_TITLE.'">'.L_COMMENT_ANSWER.'</a> - ';
		echo '<a href="article.php?a='.$artId.'" title="'.L_COMMENT_ARTICLE_LINKED_TITLE.'">'.L_COMMENT_ARTICLE_LINKED.'</a>';
		echo '</td></tr>';
	}
	?>
	<tr>
		<td colspan="5">
			<?php plxUtils::printSelect('selection', array(''=> L_FOR_SELECTION, 'delete' => L_DELETE, 'offline' => L_COMMENT_MAKE_ONLINE), ''); ?>
			<input class="button" type="submit" name="submit" value="<?php echo L_OK ?>" />
		</td>
	</tr>
	<?php		
} else { # Pas de commentaires
	echo '<tr><td colspan="5" class="center">'.L_NO_COMMENT.'</td></tr>';
}
?>
</tbody>
</table>
</form>

<div id="pagination">
<?php 
# Hook Plugins
eval($plxAdmin->plxPlugins->callHook('AdminCommentsOnlinePagination'));
# Affichage de la pagination
if($coms) { # Si on a des commentaires (hors page)
	# Calcul des pages
	$last_page = ceil($plxAdmin->plxGlob_coms->count/$plxAdmin->aConf['bypage_admin_coms']);
	if($plxAdmin->page > $last_page) $plxAdmin->page = $last_page;
	$prev_page = $plxAdmin->page - 1;
	$next_page = $plxAdmin->page + 1;
	# Generation des URLs
	$p_url = 'commentaires_online.php?page='.$prev_page.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:''); # Page precedente
	$n_url = 'commentaires_online.php?page='.$next_page.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:''); # Page suivante
	$l_url = 'commentaires_online.php?page='.$last_page.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:''); # Derniere page
	$f_url = 'commentaires_online.php?page=1'.(!empty($_GET['a'])?'&amp;a='.$_GET['a']:''); # Premiere page
	# On effectue l'affichage
	if($plxAdmin->page > 2) # Si la page active > 2 on affiche un lien 1ere page
		echo '<span><a href="'.$f_url.'" title="'.L_PAGINATION_FIRST_TITLE.'">&laquo;</a></span>';
	if($plxAdmin->page > 1) # Si la page active > 1 on affiche un lien page precedente
		echo '<span><a href="'.$p_url.'" title="'.L_PAGINATION_PREVIOUS_TITLE.'">'.L_PAGINATION_PREVIOUS.'</a></span>';
	# Affichage de la page courante
	echo '<span>'.L_PAGE.' '.$plxAdmin->page.' '.L_ON.' '.$last_page.'</span>';
	if($plxAdmin->page < $last_page) # Si la page active < derniere page on affiche un lien page suivante
		echo '<span><a href="'.$n_url.'" title="'.L_PAGINATION_NEXT_TITLE.'">'.L_PAGINATION_NEXT.'</a></span>';
	if(($plxAdmin->page + 1) < $last_page) # Si la page active++ < derniere page on affiche un lien derniere page
		echo '<span><a href="'.$l_url.'" title="'.L_PAGINATION_LAST_TITLE.'">&raquo;</a></span>';
} ?>
</div>

<?php if(!empty($plxAdmin->aConf['clef'])) : ?>
<fieldset class="withlabel">
<legend><?php echo L_COMMENTS_PRIVATE_FEEDS ?> :</legend>
	<ul class="feed">
		<?php $urlp_hl = $plxAdmin->racine.'feed.php?admin'.$plxAdmin->aConf['clef'].'/commentaires/hors-ligne'; ?>
		<li><?php echo L_COMMENT_OFFLINE_FEEDS ?> : <a href="<?php echo $urlp_hl ?>" title="<?php echo L_COMMENT_OFFLINE_FEEDS_TITLE ?>"><?php echo $urlp_hl ?></a></li>
		<?php $urlp_el = $plxAdmin->racine.'feed.php?admin'.$plxAdmin->aConf['clef'].'/commentaires/en-ligne'; ?>
		<li><?php echo L_COMMENT_ONLINE_FEEDS ?> : <a href="<?php echo $urlp_el ?>" title="<?php echo L_COMMENT_ONLINE_FEEDS_TITLE ?>"><?php echo $urlp_el ?></a></li>
	</ul>
</fieldset>
<?php endif; ?>

<?php
# Hook Plugins
eval($plxAdmin->plxPlugins->callHook('AdminCommentsOnlineFoot'));
# On inclut le footer
include(dirname(__FILE__).'/foot.php');
?>
