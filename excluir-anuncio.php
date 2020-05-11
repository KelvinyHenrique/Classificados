<?php 

session_start();
if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
}
    require './assets/php/classes/config.php';
    require './assets/php/classes/anuncios.php';

    
    $a = new Anuncios();

        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $a->excluirAnuncio($_GET['id']);
        }
        header("Location: meus-anuncios.php");
?>