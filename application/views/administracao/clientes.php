<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Clientes</h1>
            </div>
            <div class="col-lg-12">
                <h3>Listar clientes</h3>
                <?php
                echo form_open(base_url("administracao/clientes"));
                $filtro = array('todos'=>'Todos', 'novos'=>'Novos', 'pedidos-abertos' => 'Com pedidos em aberto');
                echo form_dropdown('filtro', $filtro, 'todos') .
                form_submit("buscar", "Filtrar") .
                form_close();
                $txt_status = array("Novo", "Ativo");
                $this->table->set_heading("Excluir", "Nome do cliente", "Status", "Pedidos");
                foreach($clientes as $cliente){
                    $excluir = '<div class="button button_small">'. anchor(base_url("administracao/clientes/excluir/". md5($cliente->id)), "Excluir") . '</div>';
                    $detalhes = '<div class="button button_small">'. anchor(base_url("administracao/clientes/detalhes/". md5($cliente->id)), ($cliente->nome . "&nbsp" . $cliente->sobrenome)) . '</div>';
                    $status = $txt_status[$cliente->status];
                    $pedidos = $cliente->numero_pedidos;
                    $this->table->add_row($excluir, $detalhes, $status, $pedidos);
                }
                $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                echo $this->table->generate();
                ?>
            </div>
        </div>
    </div>
</div>
