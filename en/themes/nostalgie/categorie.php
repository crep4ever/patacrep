<?php include(dirname(__FILE__).'/header.php'); ?>

<div id="section">
  
  <div id="content">
    
    <?php while($plxShow->plxMotor->plxRecord_arts->loop()): ?>
    <div class="article">
      <div class="art-date">
        <span class="art-numday"><?php $plxShow->artDate('#num_day'); ?></span>
        <?php $plxShow->artDate('#num_month | #num_year(4)'); ?>
      </div>
      <h2 class="art-title"><?php $plxShow->artTitle('link'); ?></h2>
      <div class="art-topinfos">
        <p class="art-author"><?php $plxShow->lang('WRITTEN_BY') ?> <?php $plxShow->artAuthor() ?></p>
      </div>
      <div class="art-chapo"><?php $plxShow->artChapo(); ?></div>
      <div class="art-infos">
        <span class="art-ncomments"><?php $plxShow->artNbCom(); ?></span>
      </div>
    </div>
    <?php endwhile; ?>
    
    <p class="feed-arts"><?php $plxShow->artFeed('rss',$plxShow->catId()); ?></p>
    
    <p id="pagination"><?php $plxShow->pagination(); ?></p>
    
  </div>
  
  <?php include(dirname(__FILE__).'/sidebar.php'); ?>
  
</div>

<?php include(dirname(__FILE__).'/footer.php'); ?>
