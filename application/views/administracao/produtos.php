<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h1 class="page-header">Administrar produtos</h1>
            <div class="col-lg-4">
                <h2>Adicionar novo produto</h2>

                <?php
                echo validation_errors();
                $titulo = array('name' => 'txt_titulo', 'id' => 'txt_titulo',
                    'value' => set_value('txt_titulo'));
                $descricao = array('name' => 'txt_descricao', 'id' => 'txt_descricao',
                    'value' => set_value('txt_descricao'));
                $preco = array('name' => 'txt_preco', 'id' => 'txt_preco',
                    'value' => set_value('txt_preco'));
                $largura_caixa_mm = array('name' => 'txt_largura_caixa_mm', 'id' => 'txt_largura_caixa_mm',
                    'value' => set_value('txt_largura_caixa_mm'));
                $altura_caixa_mm = array('name' => 'txt_altura_caixa_mm', 'id' => 'txt_altura_caixa_mm',
                    'value' => set_value('txt_altura_caixa_mm'));
                $comprimento_caixa_mm = array('name' => 'txt_comprimento_caixa_mm', 'id' => 'txt_comprimento_caixa_mm',
                    'value' => set_value('txt_comprimento_caixa_mm'));
                $peso_gramas = array('name' => 'txt_peso_gramas', 'id' => 'txt_peso_gramas',
                    'value' => set_value('txt_peso_gramas'));
                echo form_open('administracao/produtos/adicionar', array('class' => 'cadastros')) . br() .
                form_label("Código", "txt_codigo") . br() .
                form_input(array('name' => 'txt_codigo', 'id' => 'txt_codigo', 'value' => set_value('txt_codigo'))) . br() .
                form_label('Nome do produto', 'txt_titulo') . br() .
                form_input($titulo) . br() .
                form_label('Descricao', 'txt_descricao') . br() .
                form_input($descricao) . br() .
                form_label('Preço', 'txt_preco') . br() .
                form_input($preco) . br() .
                form_label('Largura da caixa', 'txt_largura_caixa_mm') . br() .
                form_input($largura_caixa_mm) . br() .
                form_label('Altura da caixa', 'txt_altura_caixa_mm') . br() .
                form_input($altura_caixa_mm) . br() .
                form_label('Comprimento da caixa', 'txt_comprimento_caixa_mm') . br() .
                form_input($comprimento_caixa_mm) . br() .
                form_label('Peso', 'txt_peso_gramas') . br() .
                form_input($peso_gramas) . br() .
                form_submit("btn_Adicionar", "Adicionar novo produto") .
                form_close();
                ?>

            </div>
            <div class="col-lg-4">
                <h2>Alterar produtos existentes</h2>
                <?php
                $this->table->set_heading("Imagem", "Excluir", "Alterar", "Categoria", "Código", "Título", "Preço", "Status");
                foreach ($produtos as $produto) {
                    $imagem = img("assets/images/produtos/produto-sem-foto.png");
                    if (is_file("assets/images/produtos/" . md5($produto->id) . ".jpg")) {
                        $imagem = img("assets/images/produtos/" . md5($produto->id) . ".jpg");
                    }
                    $excluir = '<div class="button button_small">'. anchor(base_url("administracao/produtos/excluir/" . md5($produto->id)), "Excluir", array('onclick' => "return 
                        confirm('Confirma Exclusão?')")) . '</div>';
                    $alterar = '<div class="button button_small">'. anchor(base_url("administracao/produtos/alterar/" . $produto->id), "Alterar") . '</div>';
                    $codigo = $produto->codigo;
                    $categoria = $produto->categoria;
                    $titulo = $produto->titulo;
                    $preco = reais($produto->preco);
                    $status = ($produto->ativo == 1) ? "Ativo" : "Inativo";
                    $this->table->add_row($imagem, $excluir, $alterar, $categoria, $codigo, $titulo, $preco, $status);
                }
                $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                echo $this->table->generate();
                echo "<div class='paginate_button'>" . $links_paginacao . "</div>";
                ?>
            </div>
        </div>
    </div>
</div>
