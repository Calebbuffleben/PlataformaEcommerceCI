<html>
    <head>
        <title>Hype Brazil</title>
    </head>
    <body>
        <h2>Hype Brazil</h2>
        <h4>Seu pedidos fois atualizado</h4>
        <?php
        $pedidos_status = array(0 => "Novo", 1 => "Pagamento confirmado", 2 => "Enviado");
        foreach ($detalhes as $detalhe) {
            echo "<b>Pedido número: </b>" . $detalhe->id .
            "<b> Data do pedido: </b>" . dataMySQL_to_dataBr($detalhe->data) .
            "<b> Valor produtos: </b>" . reais($detalhe->produtos) .
            "<b> Valor do frete: </b>" . reais($detalhe->frete) .
            "<b> Total: </b>" . reais($detalhe->produtos + $detalhe->frete) .
            "<b> Status: </b>" . $pedidos_status[$detalhe->status] . br() .
            "<b> Comentários: </b>" . $detalhe->comentarios;
        }
        echo heading("Endereço para entrega", 4);
        foreach ($cliente as $cli) {
            echo "<b>Cliente: </b>" . $cli->nome . " " . $cli->sobrenome . br();
            echo "<b>Rua: </b>" . $cli->rua . " , <b>Número: </b>" . $cli->numero . ", <b>Nairro: </b>" . $cli->bairro .
            ", <b>Cidade</b>" . $cli->cidade . ", <b>Estado</b>" . $cli->estado . ", <b> - CEP:</b>" . $cli->cep . br();
            echo "<b>Telefone: </b>" . $cli->telefone . ", <b>Celular</b>" . $cli->celular;
        }
        echo heading("Itens do pedido", 4);
        $this->table->set_heading("Foto", "Item", "Titulo", "Quantidade", "valor unitário", "Subtotal");
        foreach ($itens as $item) {
            $foto = "&nbsp;";
            if (is_file("assets/images/produtos/" . md5($item->id) . ".jpg")) {
                $propriedades_foto = array("assets/images/produtos/" . md5($item->id). ".jpg", "width"=>"100");
                $foto = img($propriedades_foto);
            }
            $this->table->add_row($foto, $item->item, $item->titulo, $item->quantidade, reais($item->preco), reais($item->preco), reais($item->preco * $item->quantidade));
        }
        echo $this->table->generate();
        ?>
        <!-- Itens do pedido -->
        <p>Obrigado por comprar conoscoEste email foi encaminhado automaticamente pelo nosso sistema em <?php echo date("d/m/Y H:i:s") ?>
    </body>
</html>
