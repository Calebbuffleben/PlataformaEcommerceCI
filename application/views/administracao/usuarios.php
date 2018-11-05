<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar usuários</h1>
            </div>
            <div class="col-lg-5">
                <?php
                echo validation_errors();
                echo form_open("administracao/usuarios/adicionar") .
                form_label("Login", "login") .
                form_input(array("id" => "login", "name" =>"login", "class" => "form-control")) .
                form_label("Senha", "senha") .
                form_password(array("id" => "senha", "name" => "senha", "class" => "form-control")) . br() .
                form_submit(array("type" => "submit", "value" => "Cadastrar", "class" => "button button_small")) .
                form_close();
                ?>
            </div>
            <div class="col-lg-1">&nbso;</div>
            <div class="col-lg-6">
                <h3>Listar usuários</h3>
                <?php
                $this->table->set_heading("Usuário", "Excluir", "Alterar", "Permissões");
                foreach ($usuarios as $usuario){
                    $excluir = '<div class="button button_small">'. anchor(base_url("administracao/usuarios/excluir/".$usuario->id), "Excluir") . '</div>';
                    $alterar = '<div class="button button_small">'. anchor(base_url("administracao/usuarios/exibir_usuario/".$usuario->id), "Alterar") . '</div>';
                    $permissoes = '<div class="button button_small">'. anchor(base_url("administracao/usuarios/permissoes/".$usuario->id), "Permissões") . '</div>';
                    $this->table->add_row($usuario->login, $excluir, $alterar, $permissoes);
                }
                $this->table->set_template(array('table_open'=>'<table class="table table-striped miniaturas">'));
                echo $this->table->generate();
                ?>
            </div>
        </div>
    </div>
</div>