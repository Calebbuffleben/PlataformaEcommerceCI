<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja Bem-vindo a nossa loja.</h3>
        <p>As camisetas mais legais do mercado</p>
        <a class="btn btn-medium btn-success" href="#">Cadastre-se</a>
    </div>
    <div class="row-fluid">
        <?php
        $contador = 0;
        foreach ($produtos as $produto) {
            $contador++;
            echo "<div class='span4 caixacategoria'>";
            echo heading($produto->titulo, 3);
            echo "<p>" . word_limiter($produto->descricao, 40) . "</p>";
            echo anchor(base_url("produtos/" . $produto->id . "/" . limpar($produto->titulo)), "Ver Produtos", array('class' => 'btn'));
            echo "</div>";
            if ($contador % 3 == 0) {
                echo "</div><div class='row-fluid'>";
            }
        }
        ?>
    </div>
</div>