<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <?php echo heading($produto[0]->titulo, 3); ?>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <?php
            if (is_file("assets/images/produtos/" . md5($produto[0]->id) . ".jpg")) {
                $foto = base_url("assets/images/produtos/" . md5($produto[0]->id) . ".jpg");
            } else {
                $foto = base_url("assets/images/produto-sem-foto.png");
            }
            echo img($foto);
            ?>
        </div>
        <div class='span5'>
            <?php
            foreach ($produto as $prod) {
                echo '<p>' . $prod->descricao . '</p>' .
                heading($prod->codigo, 6) .
                heading(reais($prod->preco), 5);
            }
            ?>
        </div>
        <div class="span3">
            <?php
            echo heading("Comprar " . $produto[0]->titulo, 5) .
            "Preço unitário: " . reais($produto[0]->preco) . br() .
            form_open(base_url("carrinho/adicionar"));
            $campos_hidden = array(
                'id' => $produto[0]->codigo,
                'url' => base_url(uri_string()),
                'foto' => img($foto),
                'nome' => $produto[0]->titulo,
                'altura' => $produto[0]->altura_caixa_mm,
                'largura' => $produto[0]->largura_caixa_mm,
                'comprimento' => $produto[0]->comprimento_caixa_mm,
                'peso' => $produto[0]->peso_gramas,
                'preco' => $produto[0]->preco);
            echo form_hidden($campos_hidden) .
            form_input("quantidade", 1) .
            form_submit("adicionar", "Adicionar ao carrinho") .
            form_close();
            ?>
        </div>
    </div>
</div>
