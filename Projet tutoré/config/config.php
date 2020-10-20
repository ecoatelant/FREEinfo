<?php
define('CONFIG', true, false); //Definition de la constante CONFIG valant true sensitif à la casse indiquant que le site est bien configuré

$incDir = realpath('./inc/'); //Direction du dossier d'include
$incExt = '.inc.php'; //extension des fichiers includes
$pageExt = '.php'; //extension des pages (articles)
$securityFile = 'security'; //nom du fichier sécurité
$headerFile = 'header'; //nom du header
$footerFile = 'footer'; //nom du footer
$articleFile= 'article'; //nom du fichier de fonctions des articles
$articleDir=realpath('./articles');

?>
