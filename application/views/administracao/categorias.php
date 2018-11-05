<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h1 class="page-header">Administrar categorias</h1>
            <div class="col-lg-6">
                <h2>Adicionar nova categoria</h2>
                <?php
                echo validation_errors();
                $titulo = array('name' => 'txt_titulo', 'id' => 'txt_titulo',
                    'value' => set_value('txt_titulo'));
                $descricao = array('name' => 'txt_descricao', 'id' => 'txt_descricao',
                    'value' => set_value('txt_descricao'));
                echo form_open('administracao/categorias/adicionar') . br() .
                form_label('Nome da categoria', 'txt_titulo') . br() .
                form_input($titulo) . br() .
                form_label('Descricao', 'txt_descricao') . br() .
                form_input($descricao) . br() .
                form_submit("btn_Adicionar", "Adicionar nova categoria") .
                form_close();
                ?>
            </div>
            <div class="col-lg-6">
                <h2>Alterar categorias existentes</h2>
                <?php
                $this->table->set_heading("Imagem", "Excluir", "Alterar", "Nome da categoria");
                foreach ($categorias as $categoria) {
                    $imagem = img("assets/images/categorias/categoria-sem-foto.png");
                    if (is_file("assets/images/categorias/" . md5($categoria->id) . ".jpg")) {
                        $imagem = img("assets/images/categorias/" . md5($categoria->id) . ".jpg");
                    }
                    $excluir = '<div class="button button_small">'. anchor(base_url("administracao/categorias/excluir/". md5($categoria->id)), "Excluir") . '</div>';
                    $alterar = '<div class="button button_small">' . anchor(base_url("administracao/categorias/alterar/". md5($categoria->id)), "Alterar") . '</div>';
                    $this->table->add_row($imagem, $excluir, $alterar, $categoria->titulo);
                }
                $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                echo $this->table->generate();
                ?>
            </div>
        </div>
    </div>
</div>
