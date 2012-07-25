<?php if(!defined('PLX_ROOT')) exit; ?>

<div id="aside">
  
  
  <div id="side-articles" class="side-4">
    <h3><?php $plxShow->lang('LAST_ARTICLES') ?></h3>
    <ul>
      <?php $plxShow->lastArtList('<li class="#art_status"><a href="#art_url" title="#art_title">#art_title</a></li>'); ?>
    </ul>
  </div>
  
  <div id="side-tags" class="side-2">
    <h3><?php $plxShow->lang('TAGS') ?></h3>
    <ul>
      <?php $plxShow->tagList('<li class="#tag_status"><a href="#tag_url" title="#tag_name">#tag_name</a></li>', 20); ?>
    </ul>
  </div>
  
  <div id="side-comments" class="side-5">
    <h3><?php $plxShow->lang('LAST_COMMENTS') ?></h3>
    <ul>
      <?php $plxShow->lastComList('<li><a href="#com_url">#com_author '.$plxShow->getLang('SAID').' : #com_content(34)</a></li>'); ?>
    </ul>
  </div>
  
  <div id="side-categories" class="side-3">
    <h3>A few links</h3>
    <ul>
      <li>   <a href="http://songs.sourceforge.net/">Songs LaTeX Package</a>  </li>
      <li>   <a href="http://git.lohrun.net/?p=songbook.git;a=summary">Lohrun's</a></li>
      <li>   <a href="http://www.penofchaos.com/warham/donjon.htm">Donjon de Naheulbeuk</a>  </li>
      <li>   <a href="http://github.com/">Github</a>  </li>
      <li>   <a href="http://lilypond.org/web/">Lilypond</a>  </li>
      <li>   <a href="http://www.deviantart.com/">deviantART</a>  </li>
      <li>   <a href="http://www.myspace.com/sheepboxlegroupe">SheepBox</a></li>
    </ul>
  </div>
  
  
</div>
