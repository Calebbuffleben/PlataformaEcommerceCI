<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja Bem-vindo a nossa loja.</h3>
        <p>As camisetas mais legais do mercado</p>
        <a class="btn btn-medium btn-success" href="#">Cadastre-se</a>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <?php
            $contador = 0;
            foreach ($destaques as $destaque) {
                $contador++;
                echo '<div class="span4">' .
                heading($destaque->titulo, 3);
                if (is_file('assets/images/produtos/' . md5($destaque->id) . '.jpg')) {
                    echo img('assets/images/produtos/' . md5($destaque->id) . '.jpg');
                }
                echo "<p>" . word_limiter($destaque->descricao, 20) . "</p>" .
                        anchor(base_url("produto/" . $destaque->id . "/" . limpar($destaque->titulo)), "Ver Produto", array('class' => 'btn')) .
                        "</div>";
                if ($contador % 3 == 0) {
                    echo '</div><div class= "row-fluid">';
                }
            }
            ?>
        </div>
    </div>
</div>