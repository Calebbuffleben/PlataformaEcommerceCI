<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja Bem-vindo a nossa loja.</h3>
        <p>As camisetas mais legais do mercado</p>
        <a class="btn btn-medium btn-success" href="#">Cadastre-se</a>
    </div>
    <div class="row-fluid">
        <?php
        $contador = 0;
        foreach ($categorias as $categoria){
            $contador++;
            echo "<div class='span4 caixacategoria'>";
            echo heading($categoria->titulo, 3);
            if (is_file('assets/images/produtos/'.  md5($categoria->id) . '.jpg')){
                echo img('assets/images/produtos/' .md5($categoria->id).'.jpg');
            }
            echo "<p>". word_limiter($categoria->descricao, 40). "</p>";
            echo anchor(base_url("categoria/".$categoria->id. "/".limpar($categoria->titulo)), "Ver Produtos", array('class'=>'btn'));
            echo "</div>";
            if($contador%3 == 0){
                echo "</div><div class='row-fluid'>";
            }
        }
        ?>
    </div>
</div>
