<?php 
// path para a classe
include ("classespider.php");
$traduzido_via_bing = new tradutor();

$qpalavra = 'Triste Fado';
// grante nunca entrar nulo
if (isset($_REQUEST['palavra'])){$qpalavra = $_GET['palavra'];}

// solicita o metodo instanciado na classe com a palavra escolhida
$traduzido_via_bing -> inglesParaPortugues($qpalavra);
 
echo "<div><br/>Traducao para: ".$traduzido_via_bing."</div>";

?>
