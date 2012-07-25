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
    
    <script type="text/javascript">
      
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-5736177-1']);
      _gaq.push(['_trackPageview']);
      
      (function() {
	  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      
    </script>
    
  </head>
  
  <body id="top">
    
    <div id="header">
      
      <div id="title">
	<h1><?php $plxShow->mainTitle('link'); ?></h1>
	<p><?php $plxShow->subTitle(); ?></p>
      </div>
      
      <?php function getPageFolder($lang)
      	{
	  $url = $_SERVER['REQUEST_URI'];
	  if ($lang == 'fr')
	    {
	      $url = str_replace("/en/", "/fr/", $url);
	    }
	  elseif ($lang == 'en')
	    {
	      $url = str_replace("/fr/", "/en/", $url);
	    }
	  return $url;
	}
      ?>
      
      <div id="language">
	<ul>
	  <li><a href="<?php echo getPageFolder('en') ?>"><img src="../data/images/flag-en.png" alt="English" title="English" /></a></li>
	  <li><a href="<?php echo getPageFolder('fr') ?>"><img src="../data/images/flag-fr.png" alt="Français" title="Français" /></a></li>
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
