<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Recuperar Login</h3>
        <p>Informe o email e o CPF cadastrados para recuperar os dados de login.<br/>
            Obs. Somente � poss�vel receber dados de login de clientes j� cadastrados.</p>
    </div>
    <div class="row-fluid">
        <?php
        echo validation_errors();
        echo form_open(base_url('cadastro/recuperar_login'), array('id' => 'form_recuperar_login')).
             form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'))).
             form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF')).
             form_submit("btnLogin", "Recuperar login").
             form_close().
             anchor(base_url('login'), "Efetuar Login");
        ?>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('#cpf').mask('000.000.000-00', {reverse: true}); 
});
</script>