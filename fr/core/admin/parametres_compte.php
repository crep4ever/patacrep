<?php

/**
 * Edition du compte rédacteur
 *
 * @package PLX
 * @author	Florent MONTHEL
 **/

include(dirname(__FILE__).'/prepend.php');

# On édite la configuration
if(!empty($_POST)) {
	$msg = $plxAdmin->editRedacteur($_POST);
	header('Location: parametres_compte.php?msg='.urlencode($msg));
	exit;
}

# On inclut le header
include(dirname(__FILE__).'/top.php');
?>

<h2>Edition des param&egrave;tres de PluXml</h2>

<form action="parametres_compte.php" method="post" id="change-cf-file">
	<fieldset class="withlabel">
		<legend>Compte r&eacute;dacteur :</legend>	
		<p class="field"><label>Nom du r&eacute;dacteur (login)&nbsp;:</label></p>
		<?php plxUtils::printInput('login', plxUtils::strCheck($_SESSION['author'])); ?>
		<p class="field"><label>Mot de passe&nbsp;:</label></p>
		<?php plxUtils::printInput('pwd','','password'); ?>
		<p class="field"><label>Confirmer le mot de passe&nbsp;:</label></p>
		<?php plxUtils::printInput('pwd2','','password');?>
	</fieldset>
	<p class="center"><input type="submit" value="Modifier le compte r&eacute;dacteur" /></p>
</form>

<?php
# On inclut le footer
include(dirname(__FILE__).'/foot.php');
?>