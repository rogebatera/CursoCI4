<div class="container">
    <p>Conteudo da Pagina Home: <b>Valor de Cache: </b><?= $cache->get('valorCache'); ?></p>
    <a href="/limparCache" class="btn btn-primary">Limpar Cache</a>
    <a href="/adicionarCache" class="btn btn-primary">Adicionar Cache</a>
    <a href="/subtrairCache" class="btn btn-primary">Subtrair Cache</a>
    <?php 
    if(!$cache->get('escondeArea')): 
        $cache->save('escondeArea', true, 300);
    ?>
    <div class="alert alert-danger mt-3">
        <p>Área do Cache</p>
    </div>
    <?php 
    endif; 
    ?>
</div>