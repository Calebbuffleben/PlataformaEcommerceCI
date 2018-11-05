<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuario <?php echo $usuario[0]->id ?></h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        $login = $usuario[0]->login;
                        $senha = $usuario[0]->senha;
                        echo validation_errors();
                        echo form_open("administracao/usuarios/alterar/" . $usuario[0]->id) .
                        form_label("Login", "login") .
                        form_input(array("id" => "login", "name" => "login", "value" => "$login", "class" => "form-control")) .
                        form_label("Senha", "senha") .
                        form_password(array("id" => "senha", "name" => "senha", "value" => "$senha", "class" => "form-control")) . br() .
                        form_submit(array("type" => "submit", "value" => "Alterar", "class" => "btn")) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
