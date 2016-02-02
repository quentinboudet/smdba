<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

//Le nombre de caracteres
$ncarac = 5;
//Le nombre de lignes
$nlignes = 4;
//Les caractres qui seront utilises
$carac = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$nca = count($carac);//On determine le nombre de lettres possible: 26
//Police de caractere a utiliser
$font = 'arial.ttf';
//On determine les tailles de limage
$x = $ncarac*30+10;
$y = 40;
//On cree limage
$img = imagecreatetruecolor($x,$y);
//On remplit limage avec du blanc
imagefill($img,0,0,imagecolorallocate($img, 177,177,199));
//On ajoute les caracteres
$chaine = "";
for($i=1;$i<=$ncarac;$i++)//On ajoute $ncarac caracteres
{
        $c = $carac[rand(0,($nca-1))];//Le nouveau caractere sera choisi aleatoirement
        imagettftext($img, 25, rand(-10,10), (($i-1)*30)+5, 30, imagecolorallocate($img, rand(57,57), rand(57,57), rand(77,77)),$font, $c);//On ajoute le caractere sur limage
        $chaine .= $c;//On ajoute le nouveau caractere a la chaine
}
//On ajoute les lignes
for($i=1;$i<=$nlignes;$i++)//On ajoute "$nlignes" lignes
{
        imagesetthickness($img,rand(1,2));//On specifie lepaisseur de la ligne
        imageline($img,rand(0,$x),rand(0,$y),rand(0,$x),rand(0,$y), imagecolorallocate($img, rand(150,150), rand(190,190), rand(16,16)));//On ajoute la ligne
}
//On stoque la chaine de caractere dans les sessions
//session_start();
$_SESSION['captcha'] = $chaine;
//On affiche l'image finale
header('Content-type: image/png');
imagepng($img);
?>