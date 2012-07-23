<?php
header('Location: http://www.patacrep.com/fr/?categorie4/news'); //Adresse de la nouvelle page
header('HTTP/1.1 301 Moved Permanently'); //Code HTTP de redirection permanente
header('Status: 301 Moved Permanently'); //Doublon utile à certaines versions de PHP et serveurs
header('Content-Type: text/html; charset=UTF-8');
echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>'; //entête XML
?>