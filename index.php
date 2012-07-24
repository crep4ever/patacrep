<?
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
   case "fr":
     header("Location: fr/index.php");
     break;
    default:
     header("Location: en/index.php");
     break;
}
?>
