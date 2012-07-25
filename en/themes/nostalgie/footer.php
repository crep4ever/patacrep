<?php if(!defined('PLX_ROOT')) exit; ?>

<div id="footer">
  
  <p>&copy; <?php $plxShow->mainTitle('link'); ?> -
    <?php $plxShow->lang('POWERED_BY') ?> <a href="http://pluxml.org" title="<?php $plxShow->lang('PLUXML_DESCRIPTION') ?>">PluXml</a>
    <?php $plxShow->lang('IN') ?> <?php $plxShow->chrono(); ?>
    <?php $plxShow->httpEncoding() ?>
  </p>
  <div id="foot-links">
    <a id="foot-admin" rel="nofollow" href="<?php $plxShow->urlRewrite('core/admin/') ?>" title="<?php $plxShow->lang('ADMINISTRATION') ?>"><?php $plxShow->lang('ADMINISTRATION') ?></a>
    <a id="foot-top" href="<?php echo $plxShow->urlRewrite('#top') ?>" title="<?php $plxShow->lang('GOTO_TOP') ?>"><?php $plxShow->lang('TOP') ?></a></div>
  
  <footer style="color:#2e3436;">
    <p>
      These songbooks are by no means a commercial product. The authors think that they benefit copyright holders as free advertisement. Anyway, if an author or an accredited company does not wish the distribution of his tabs, please contact us and they will be withdrawn. These songbooks are based on the <a href="http://songs.sourceforge.net" style="color:#204a87;">Songs LaTeX Package</a> project.
    </p>
  </footer>
  
</div>

</body>
</html>
