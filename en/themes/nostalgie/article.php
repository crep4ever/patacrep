<?php include(dirname(__FILE__).'/header.php'); ?>

<div id="section">
  
  <div id="content">
    <div class="article">
      <div class="art-date">
        <span class="art-numday"><?php $plxShow->artDate('#num_day'); ?></span>
        <?php $plxShow->artDate('#num_month | #num_year(4)'); ?>
      </div>
      <h2 class="art-title"><?php $plxShow->artTitle(''); ?></h2>
      <div class="art-topinfos">
        <p class="art-author"><?php $plxShow->lang('WRITTEN_BY') ?> <?php $plxShow->artAuthor() ?></p>
      </div>
      <div class="art-content"><?php $plxShow->artContent(); ?></div>
      
      <div class="author-infos"><?php $plxShow->artAuthorInfos('#art_authorinfos'); ?></div>
    </div>
    <?php include(dirname(__FILE__).'/commentaires.php'); ?>
  </div>
  
  <?php include(dirname(__FILE__).'/sidebar.php'); ?>
  
</div>

<?php include(dirname(__FILE__).'/footer.php'); ?>
