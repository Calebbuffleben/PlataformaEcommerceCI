<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pedido <?php echo $detalhes[0]->id ?></h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        echo heading("Detalhes do pedido", 4);
                        $pedidos_status = array(0 => "Novo", 1 => "Pagamento confirmado", 2 => "Enviado");
                        foreach ($detalhes as $detalhe) {
                            echo "<b>Pedido n�mero: </b>" . $detalhe->id .
                            "<b> Data do pedido: </b>" . dataMySQL_to_dataBr($detalhe->data) . br() .
                            "<b> Valor produtos: </b>" . reais($detalhe->produtos) . br(2) .
                            "<b> Status </b>" .
                            form_open(base_url("administracao/pedidos/alterar")) .
                            form_hidden('pedido_id', $detalhe->id) .
                            form_dropdown('status', $pedidos_status, $detalhe->status, array("class" => "form-control")) .
                            "<b> Coment�rios </b>" .
                            form_input(array("id" => "comentarios", "name" => "comentarios", "value" => $detalhe->comentarios, "class" => "form-control")) .
                            form_submit(array("name" => "submit", "value" => "Alterar pedido", "class" => "btn btn-default")) .
                            form_close() . br() .
                            "<b> Valor frete: </b>" . reais($detalhe->frete) .
                            "<b> Total: </b>" . reais($detalhe->produtos = $detalhe->frete) . br() .
                            "<b> Status: </b>" . $pedidos_status[$detalhe->status] . br();
                        }
                        echo heading("Detalhes do cliente", 4);
                        foreach ($cliente as $cli) {
                            echo "<b>Cliente: </b>" . $cli->nome . " " . $cli->sobrenome . br();
                            echo "<b>Rua: </b>" . $cli->rua . " , <b>N�mero: </b>" . $cli->numero . ", <b>Bairro: </b>" . $cli->bairro .
                            ", <b>Cidade</b>" . $cli->cidade . ", <b>Estado</b>" . $cli->estado . ", <b> - CEP:</b>" . $cli->cep . br();
                            echo "<b>Telefone: </b>" . $cli->telefone . ", <b>Celular</b>" . $cli->celular . ", <b>email: </b> <a href='malito:" . $cli->email . "'>" . $cli->email . "</a>";
                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <?php
                        $this->table->set_heading("Foto", "Item", "Titulo", "Quantidade", "Valor unit�rio", "Subtotal");
                        foreach ($itens as $item) {
                            $foto = "&nbsp;";
                            if (is_file("assets/images/produtos/" . md5($item->id) . ".jpg")) {
                                $foto = img("assets/images/produtos/" . md5($item->id) . ".jpg");
                            }
                            $this->table->add_row($foto, $item->item, $item->titulo, $item->quantidade, reais($item->preco), reais($item->preco), reais($item->preco * $item->quantidade));
                        }
                        $this->table->add_row("<a href='javascript:jistory.go(-1)'>Voltar</a>", "<a href='javascript:self.print()'>Imprimir</a>", "&nbsp;", "&nbsp", "&nbsp", reais($detalhes[0]->produtos));
                        $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                        echo $this->table->generate();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
