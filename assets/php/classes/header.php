<?php   require 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
               
            <?php
                if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                <?php 
                require './assets/php/classes/usuarios.php';
                $id = $_SESSION['cLogin'];
                $u = new Usuarios();
                $nome = $u->getNome($id);
                echo "<li class='welcome'> ".$nome['nome']." </li>";
                ?>
                <li><a href="./meus-anuncios.php">Meus anuncios</a></li>
                <li><a href="./sair.php">Sair</a></li>
                <?php else: ?>
                <li><a href="./cadastrar.php">Cadastre-se</a></li>
                <li><a href="./login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>