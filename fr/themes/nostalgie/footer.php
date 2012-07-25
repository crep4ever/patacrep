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
      Ce recueil de chansons n'a absolument aucune vocation commerciale et joue sur l'autorisation tacite des auteurs et des ayants droits, pensant que la publication de ces tablatures représente plutôt une publicité positive à leur égard.
      Cependant, si un auteur ou une société accréditée désire s'opposer à la publication de ses tablatures, merci de nous contacter et celles-ci seront immédiatement retirées du site. Ces recueils de chansons sont écrits d'après le style du projet <a href="http://songs.sourceforge.net" style="color:#204a87;">Songs LaTeX Package</a>.
    </p>
  </footer>
  
</div>

</body>
</html>
