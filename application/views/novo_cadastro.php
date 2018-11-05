<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja Bem-vindo a nossa loja.</h3>
        <p>Use o formulário abaixo para se cadastrar.</p>

    </div>
    <div class="row-fluid">

        <?php
        echo validation_errors();
        echo form_open(base_url('cadastro/adicionar'), array('id' => 'form_cadastro'));
        ?>
        <div class="span4">
            <?php echo form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Nome', 'value' => set_value('sobrenome'))) ?>
            <?php echo form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Sobrenome', 'value' => set_value('sobrenome'))) ?>
            <?php echo form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'RG', 'value' => set_value('rg'))) ?>
            <?php echo form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF', 'value' => set_value('cpf'))) ?>
            <?php echo form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Data de Nascimento', 'value' => set_value('data_nascimento'))) ?>
            <?php echo form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'M/F', 'value' => set_value('sexo'))) ?>
        </div>
        <div class="span4">
            <?php echo form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'Cep', 'value' => set_value('cep'))) ?>
            <?php echo form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => set_value('rua'))) ?>
            <?php echo form_input(array('id' => 'bairro', 'name' => 'bairro', 'Placeholder' => 'Bairro', 'value' => set_value('bairro'))) ?>
            <?php echo form_input(array('id' => 'cidade', 'name' => 'cidade', 'Placeholder' => 'Cidade', 'value' => set_value('cidade'))) ?>
            <?php echo form_input(array('id' => 'estado', 'name' => 'estado', 'Placeholder' => 'Estado', 'value' => set_value('estado'))) ?>
            <?php echo form_input(array('id' => 'numero', 'name' => 'numero', 'Placeholder' => 'Número', 'value' => set_value('numero'))) ?>
        </div>
        <div class="span4">
            <?php echo form_input(array('id' => 'telefone', 'name' => 'telefone', 'Placeholder' => 'Telefone', 'value' => set_value('telefone'))) ?>
            <?php echo form_input(array('id' => 'celular', 'name' => 'celular', 'Placeholder' => 'Celular', 'value' => set_value('celular'))) ?>
            <?php echo form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'Email', 'value' => set_value('email'))) ?>
            <?php echo form_input(array('id' => 'senha', 'name' => 'senha', 'Placeholder' => 'Senha', 'value' => set_value('senha'))) ?>
            <?php echo form_submit('btn_cadastrar', 'Cadastrar') ?>
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