<div class="container">
    <div class="masthead">
        <div id="cadastro-e-login">
            <?php
            if (null != $this->session->logado) {
                echo 'Seja bem-vindo: ' . $this->session->nome . " " .
                $this->session->sobrenome . 
                anchor(base_url("alterar-cadastro/". md5($this->session->id)), "Alterar cadastro") . 
                anchor(base_url("meus-pedidos"), " Meus pedidos") .
                anchor(base_url("logout"), " Logout");
            } else {
                echo anchor(base_url("cadastro"), "Cadastro") .
                anchor(base_url("login"), " Login");
            }
            echo anchor(base_url("carrinho"),
            " Carrinho [". $this->cart->total_items()."] ");
            ?>
        </div>
        <?php echo heading('Hype Brazil', 3, 'class="muted"'); ?>

        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: silver;">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo (base_url("home")); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo (base_url("Categorias")); ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produtos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            foreach ($categorias as $categoria):
                                ?>
                                <a class="dropdown-item" href="<?php echo (base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo))); ?>"><?php echo $categoria->titulo; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo (base_url("fale-conosco")); ?>">Fale conosco</a>
                </ul>

                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" name="txt_busca" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btn_busca">Buscar</button>
                </form>
            </div>

        </nav>

    </div>
