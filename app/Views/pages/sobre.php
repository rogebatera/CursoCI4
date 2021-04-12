<div class="container">
    <p>Conteudo da Pagina Sobre</p>

    <?php
        $texto = 'teste';
        $textoCripto = $cripto->encrypt($texto);
        $textoDescript = $cripto->decrypt($textoCripto);

        echo $textoCripto.'<br/><br/>';
        echo $textoDescript;
    
    ?>
</div>