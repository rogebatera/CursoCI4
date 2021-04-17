<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exemploe CI4</title>
    <?php
        echo link_tag('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        echo link_tag('favicon.ico', 'shortcut icon', 'image/ico');
    ?>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

</head>
<body>
    <div class='container'>
        <div class="row">
            <div class="col-md-9">
                <h1><?= $title; ?></h1>  
            </div>
            <div class="col-md-3">
                <?php if($session->get('logged_in')): ?>
                    <p>Bem Vindo ao Sistema, <?= $session->get('user'); ?> ! <a href="/usuarios/logout">Sair</a></p>
                <?php else: ?>
                    <a href="/login" class="btn btn-primary">Entrar no Sistemas</a>    
                <?php endif; ?>
            </div>
        </div>

    </div>