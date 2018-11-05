<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel-heading">
                <h3 class="panel-title">Efetuar Login</h3>
            </div>
            <div class="panel-body">
                <?php
                echo form_open(base_url('administracao/usuarios/efetuar_login')) .
                "<fieldset>" .
                "<div class='form-group'>" .
                form_input(array('name' => 'usuario', 'type' => 'text', 'placeholder' => 'Usuario', 'class' => 'form-control')) .
                "</div>" .
                form_input(array('name' => 'senha', 'type' => 'password', 'placeholder' => 'Senha', 'class' => 'form-control')) .
                "</div>" .
                 form_input(array('type' => 'submit', 'value' => 'Login', 'class' => 'btn btn-lg btn-success btn-block', 'class' => 'form-control')) .
                "</fieldset>" .
                form_close();
                ?>
            </div>
        </div>
    </div>
</div>
