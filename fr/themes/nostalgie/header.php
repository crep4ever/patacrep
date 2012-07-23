<?php if(!defined('PLX_ROOT')) exit; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $plxShow->defaultLang() ?>" lang="<?php $plxShow->defaultLang() ?>">

<head>

	<title><?php $plxShow->pageTitle(); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php $plxShow->charset(); ?>" />
	<?php $plxShow->meta('description') ?>
	<?php $plxShow->meta('keywords') ?>
	<?php $plxShow->meta('author') ?>

	<link rel="icon" href="<?php $plxShow->template(); ?>/img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="<?php $plxShow->template(); ?>/css/screen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php $plxShow->template(); ?>/css/patacrep.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php $plxShow->template(); ?>/css/cssplayBox.css" media="screen" />
	<?php $plxShow->templateCss() ?>

	<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS') ?>" href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>" href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires') ?>" />


<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
</script>

</head>

<body id="top">

<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="header">

                <div id="title">
			<h1><?php $plxShow->mainTitle('link'); ?></h1>
			<p><?php $plxShow->subTitle(); ?></p>
                </div>

	<?php
	/*Fonction pour naviguer entre les langues*/
	function getPageFolder($newLang) {
                /*récupérer le nom de base de pluxml (avant le '?') */
		$debURL = substr($_SERVER["REQUEST_URI"],0,strrpos($_SERVER["REQUEST_URI"],'?')-3);
		/*récupérer la page appelée*/
    $finURL = substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],'?')-1);
		return $debURL . $newLang . $finURL;
	}
	?>
	<div id="language">
		<ul>
			<li><a href="<?php echo getPageFolder('en') ?>"><img src="../data/images/flag-en.png" alt="English" title="English"></img></a></li>
			<li><a href="<?php echo getPageFolder('fr') ?>"><img src="../data/images/flag-fr.png" alt="Français" title="Français"></img></a></li>
		</ul>
	</div>

		<ul id="nav">
			<?php $plxShow->staticList($plxShow->getLang('HOME'),'<li id="#static_id"><a href="#static_url" class="#static_status" title="#static_name">#static_name</a></li>'); ?>
			<?php $plxShow->pageBlog('<li id="#page_id"><a class="#page_status" href="#page_url" title="#page_name">#page_name</a></li>'); ?>
			<li class="feed">
				<ul>
					<li><a href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" title="RSS">RSS</a></li>
				</ul>
			</li>
		</ul>

	</div>
