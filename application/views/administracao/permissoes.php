<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar usuários</h1>
            </div>
            <div class="col-lg-12">
                <h3>Permissões do usuário</h3>
                <?php
                echo form_open(base_url("administracao/usuarios/alterar_permissoes"));
                echo form_hidden('usuarios', $usuarios);
                echo "<div class='panel panel-default'>";
                $class = NULL;
                $contador = 0;
                foreach ($permissoes as $permissao){
                    if($permissao->classe != $class){
                        echo($contador>0)?"</div>":null;
                        echo "<div class='panel-heading'>" . ucfirst($permissao->classe) . "</div>";
                        echo "<div class='panel-body'>";
                        $classe = $permissao->classe;
                        $contador++;
                    }
                    $dados = array('name' => 'metodo[]', 'id' => 'metodo[]', 'value' => $permissao->id, 'cheked' => ($permissao->usuario != "")?"chaked":null, 'style' => 'margin:5px');
                    echo form_checkbox($dados);
                    echo ucfirst(str_replace("_", " ", $permissao->metodo));
                }
                echo br(2) . form_submit(array("id" => "alterar", "name" => "alterar", "value" => "Alterar permissões", "class" => "btn btn-default"));
                echo "</div>";
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>