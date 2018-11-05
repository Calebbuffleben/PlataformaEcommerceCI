<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detalhes</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel-heading">
                    <h2> Detalhes do cliente <strong> <?php echo $cliente[0]->nome . ' ' . $cliente[0]->sobrenome; ?> </strong> </h2>
                </div>
                <div class="panel-body">
                    <?php
                    echo 'Nome: ' . $cliente[0]->nome . ' ' . $cliente[0]->sobrenome . '</br>' .
                    'RG: ' . $cliente[0]->rg . '</br>' .
                    'CPF:' . $cliente[0]->cpf . '</br>' .
                    'Data de nascimento: ' . $cliente[0]->data_nascimento . '</br>' .
                    'Sexo: ' . $cliente[0]->sexo . '</br>' .
                    'Rua: ' . $cliente[0]->rua . '</br>' .
                    'Número: ' . $cliente[0]->numero . '</br>' .
                    'Bairro: ' . $cliente[0]->bairro . '</br>' .
                    'Cidade: ' . $cliente[0]->cidade . '</br>' .
                    'Estado: ' . $cliente[0]->estado . '</br>' .
                    'CEP: ' . $cliente[0]->cep . '</br>' .
                    'Telefone: ' . $cliente[0]->telefone . '</br>' .
                    'Celular: ' . $cliente[0]->celular . '</br>' .
                    'Email: ' . $cliente[0]->email . '</br>' .
                    'Senha: ' . $cliente[0]->senha . '</br>' .
                    'Status: ' . $cliente[0]->status . '</br>' .
                    'Data do cadastro: ' . $cliente[0]->cadastrado_em;
                    ?>
                    </br></br><a href="JavaScript: window.history.back();">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
