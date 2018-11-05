<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Você buscou por:<?php echo $termo ?></h3>
        <p>Os seguintes resultados foram encontrados.</p>
    </div>
    <div class="row-fluid">
        <?php
        $contador = 0;
        foreach ($destaques as $destaque){
            $contador ++;
            echo '<div class="span4 caixacategoria"';
            echo heading($destaque->titulo, 3);
            if (is_file('assets/images/produtos/'.  md5($destaque->id) . '.jpg')){
                echo img('assets/images/produtos/' .md5($destaque->id).'.jpg');
            }
            echo '<p>'. word_limiter($destaque->descricao, 20). '</p>';
            echo anchor(base_url('produto/'.$destaque->id. "/". limpar($destaque->titulo), "Ver Produto", array('class'=>'btn')));
            echo '</div>';
            if($contador%3 == 0){
                echo '</div><div class="row-fluid">';
            }
        }
        ?>
    </div>
</div>
