<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Administrar</h1></div>
            <div class="col-lg-7">
                <?php
                echo heading("Alterar produto: " . $produto[0]->titulo, 3);                
                echo validation_errors();
                $tit = array('name' => 'txt_titulo', 'id' => 'txt_titulo', 'value' => $produto[0]->titulo);
                $des = array('name' => 'txt_descricao', 'id' => 'txt_descricao', 'value' => $produto[0]->descricao);
                $cod = array('name' => 'txt_codigo', 'id' => 'txt_codigo', 'value' => $produto[0]->codigo);
                $prc = array('name' => 'txt_preco', 'id' => 'txt_preco', 'value' => $produto[0]->preco);
                $larg = array('name' => 'txt_largura_caixa_mm', 'id' => 'txt_largura_caixa_mm ', 'value' => $produto[0]->largura_caixa_mm );
                $alt = array('name' => 'txt_altura_caixa_mm', 'id' => 'txt_altura_caixa_mm ', 'value' => $produto[0]->altura_caixa_mm );
                $comp = array('name' => 'txt_comprimento_caixa_mm', 'id' => 'txt_comprimento_caixa_mm ', 'value' => $produto[0]->comprimento_caixa_mm );
                $peso = array('name' => 'txt_peso_gramas', 'id' => 'txt_peso_gramas', 'value' => $produto[0]->peso_gramas);
                
                echo form_open('administracao/produtos/salvar_alteracoes') . br() .
                form_hidden('id', md5($produto[0]->id)) .
                form_label('Nome do produto', 'txt_titulo') . br() .
                form_input($tit) . br() .
                form_label('Código', 'txt_codigo') . br() .
                form_input($cod) . br() .
                form_label('Descricao', 'txt_descricao') . br() .
                form_input($des) . br() .
                form_label('Preço', 'txt_preco') . br() .
                form_input($prc) . br() .
                form_label('Largura da caixa', 'txt_largura_caixa_mm') . br() .
                form_input($larg) . br() .
                form_label('Altura da caixa', 'txt_altura_caixa_mm') . br() .
                form_input($alt) . br() .
                form_label('Comprimento da caixa', 'txt_comprimento_caixa_mm') . br() .
                form_input($comp) . br() .
                form_label('Peso', 'txt_peso_gramas') . br() .
                form_input($peso) . br() .
                form_submit("btn_adicionar", "Alterar produto") .
                form_close() .
                "</div>" .
                "<div class='col-lg-5 imagem'>" .
                heading("Imagem", 3);
                if (is_file("assets/images/produtos/" . md5($produto[0]->id) . ".jpg")) {
                    echo img("assets/images/produtos" . md5($produto[0]->id) . ".jpg?i=" . date('dmYhis'));
                }
                echo form_open_multipart(base_url("administracao/produtos/nova_foto")) .
                form_hidden('id', md5($produto[0]->id)) .
                form_upload("userfile") .
                form_submit("btn_adicionar", "Adicionar imagem") .
                form_close();
                ?>
            </div>
        </div>
    </div>
</div>