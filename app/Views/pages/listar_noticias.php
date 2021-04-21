<?php
    //print '<pre>';
    //print_r($noticias);
    //print '</pre>';
?>

<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Autor</th>
                <th>Nome Categoria</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if(!empty($noticias)):
            foreach($noticias as $noticia): 
        ?>
            <tr>
                <td><?= $noticia['id']; ?></td>
                <td><?= $noticia['titulo']; ?></td>
                <td><?= $noticia['descricao']; ?></td>
                <td><?= $noticia['autor']; ?></td>
                <td><?= $noticia['nome_categoria']; ?></td>
            </tr>
        <?php 
            endforeach;
        endif;  
         
        ?>    
        </tbody>
    </table>
    <div>
        <?= $pager->links(); ?>
    </div>    
</div>