<?php
/**
 * Classe plxcapchaimage
 *
 * @package PLX
 * @version 1.0
 * @date	16/12/2010 
 * @author	Stephane F
 **/
class plxcapchaimage extends plxPlugin {

	/**
	 * Constructeur de la classe
	 *
	 * @return	null
	 * @author	Stéphane F.  
	 **/	
	public function __construct($default_lang) {

		# Appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# Ajouts des hooks
		$this->addHook('plxShowCapchaQ', 'plxShowCapchaQ');
		$this->addHook('plxShowCapchaR', 'plxShowCapchaR');
		$_SESSION['capcha']=$this->_getCode(5);
	}

	/**
	 * Méthode qui affiche l'image du capcha
	 *
	 * @return	stdio
	 * @author	Stéphane F.  
	 **/
	public function plxShowCapchaQ() {

		echo '<img src="'.PLX_PLUGINS.'plxcapchaimage/capcha.php" alt="Capcha" id="capcha" /><br />';
		$this->lang('L_MESSAGE');
		echo '<?php return true; ?>'; # pour interrompre la fonction CapchaQ de plxShow

	}

	/**
	 * Méthode qui retourne la réponse du capcha encodée en sha1
	 *
	 * @return	stdio
	 * @author	Stéphane F.  
	 **/	
	public function plxShowCapchaR() {	
		echo sha1($_SESSION['capcha']);
		echo '<?php return true; ?>';  # pour interrompre la fonction CapchaR de plxShow
	}

	/**
	 * Méthode qui génère le code du capcha
	 *
	 * @return	string		code du capcha
	 * @author	Stéphane F.  
	 **/
	private function _getCode($length) {
		$chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ'; // Certains caractères ont été enlevés car ils prêtent à confusion
		$rand_str = '';
		for ($i=0; $i<$length; $i++) {
			$rand_str .= $chars{ mt_rand( 0, strlen($chars)-1 ) };
		}
		return $rand_str;
	}

}
?>