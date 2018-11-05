<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Alteração de cadastro.</h3>
        <p>Use o formulário abaixo para alterar seu cadastro.</p>

    </div>
    <div class="row-fluid">

        <?php
        echo validation_errors();
        echo form_open(base_url('cadastro/salvar_alteracao_cadastro'), array('id' => 'form_cadastro'), array('id' => 'form_cadastro'));
        ?>
        <div class="span4">
            <?php form_hidden('id', md5($cliente[0]->id)) ?>
            <?php echo form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Nome', 'value' => $cliente[0]->nome)) ?>
            <?php echo form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Sobrenome', 'value' => $cliente[0]->sobrenome)) ?>
            <?php echo form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'RG', 'value' => $cliente[0]->rg)) ?>
            <?php echo form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF', 'value' => $cliente[0]->cpf)) ?>
            <?php echo form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Data de Nascimento', 'value' => $cliente[0]->data_nascimento)) ?>
            <?php echo form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'M/F', 'value' => $cliente[0]->sexo)) ?>
        </div>
        <div class="span4">
            <?php echo form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'Cep', 'value' => $cliente[0]->cep)) ?>
            <?php echo form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => $cliente[0]->rua)) ?>
            <?php echo form_input(array('id' => 'bairro', 'name' => 'bairro', 'Placeholder' => 'Bairro', 'value' => $cliente[0]->bairro)) ?>
            <?php echo form_input(array('id' => 'cidade', 'name' => 'cidade', 'Placeholder' => 'Cidade', 'value' => $cliente[0]->cidade)) ?>
            <?php echo form_input(array('id' => 'estado', 'name' => 'estado', 'Placeholder' => 'Estado', 'value' => $cliente[0]->estado)) ?>
            <?php echo form_input(array('id' => 'numero', 'name' => 'numero', 'Placeholder' => 'Número', 'value' => $cliente[0]->numero)) ?>
        </div>
        <div class="span4">
            <?php echo form_input(array('id' => 'telefone', 'name' => 'telefone', 'Placeholder' => 'Telefone', 'value' => $cliente[0]->telefone)) ?>
            <?php echo form_input(array('id' => 'celular', 'name' => 'celular', 'Placeholder' => 'Celular', 'value' => $cliente[0]->celular)) ?>
            <?php echo form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'Email', 'value' => $cliente[0]->email)) ?>
            <?php echo form_input(array('id' => 'senha', 'name' => 'senha', 'Placeholder' => 'Senha', 'value' => $cliente[0]->senha)) ?>
            <?php echo form_submit('btn_cadastrar', 'Alterar cadastro') ?>
        </div>
        <?php form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#cep').mask('0000-000', {reverse: true});
        $('#telefone').mask('(00)0000.00000', {reverse: false});
        $('#celular').mask('(00)0000.00000', {reverse: false});
        $('#data_nascimento').mask('00/00/0000', {reverse: true});
        $('#sexo').mask('A', {reverse: true});
        $('#cep').blur(function () {
            $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json",
                    function (dados) {
                        if (!("erro" in dados)) {
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#estado").val(dados.uf);
                            $("#numero").focus();
                        } else {
                            alert("CEP não encontrado.");
                        }
                    });
        });
    });
</script>