<div id='homebody'>
    <div class="alinhado-centro borda-base espaco-vertical">
        <?php
        echo heading($categoria['detalhes'][0]->titulo, 3) . "<p>"
        . $categoria['detalhes'][0]->descricao . "</p>";
        ?>
    </div>
    <div class="row-fluid">
        <?php
        $contador = 0;
        foreach ($categoria['produtos'] as $produto) {
            $contador++;
            echo "<div class='span4 caixacategoria'>";
            echo heading($produto->titulo, 3);
            echo heading($produto->codigo, 6);
            if (is_file('assets/images/produtos/'.  md5($produto->id) . '.jpg')){
                echo img('assets/images/produtos/' .md5($produto->id).'.jpg');
            }
            echo "<p>" . word_limiter($produto->descricao, 15) . "</p>";
            echo heading(reais($produto->preco, 5));
            echo anchor(base_url("produto/" . $produto->id . "/" . limpar($produto->titulo)), "Ver Produto", array('class' => 'btn'));
            echo "</div>";
            if ($contador % 3 == 0) {
                echo "</div><div class='row-fluid'>";
            }
        }
        ?>
    </div>

