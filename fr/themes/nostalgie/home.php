<?php include(dirname(__FILE__).'/header.php'); ?>

<div id="section">
  
  <div id="content">
    
    <?php while($plxShow->plxMotor->plxRecord_arts->loop()): ?>
    
    <div class="art-chapo"><?php $plxShow->artChapo(); ?></div>
    
    <?php endwhile; ?>
    
    <p id="pagination"><?php $plxShow->pagination(); ?></p>
    
  </div>
  
  <?php include(dirname(__FILE__).'/sidebar.php'); ?>
  
</div>

<?php include(dirname(__FILE__).'/footer.php'); ?>
