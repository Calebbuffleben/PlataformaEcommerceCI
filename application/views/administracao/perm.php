<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar usuários</h1>
            </div>
            <div class="col-lg-12">
                <h3>Permissões do usuário</h3>
                <div class="tabarea">
                    <div class="tabitem activetab">Grupos de permissões</div>
                    <div class="tabitem">Permissões</div>
                </div>
                <div class="tabcontent">
                    <div class="tabbody" style="display:block;">
                        <div class="button"><a href="<?php base_url('permissions/add_group'); ?>">Adicionar Grupo de Permissões</a></div>

                        <table border="0" width="100%">
                            <tr>
                                <th>Nome do Grupo de Permissões</th>
                                <th>Ações</th>
                            </tr>
                            <tr>
                                <td>Nome</td>
                                <td width="160">
                                    <div class="button button_small"><a href="">Editar</a></div>

                                    <div class="button button_small"><a href="" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tabbody">

                        <div class="button"><a href="<?php echo base_url('/permissions/add'); ?>">Adicionar Permissão</a></div>

                        <table border="0" width="100%">
                            <tr>
                                <th>Nome da Permissõo</th>
                                <th>Ações</th>
                            </tr>
                            <tr>
                                <td>Nome</td>
                                <td width="50"><div class="button button_small"><a href="" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


