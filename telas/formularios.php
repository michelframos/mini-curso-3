<section>

    <header class="titulo-pagina">
        <div class="container">
            <h2 class="titulo">Formulários de Adesão</h2>
        </div>
    </header>

    <article class="container line-height">

        <div class="espaco20"></div>

        <a class="btn-padrao" href="<?php echo HOME ?>/formularios-adesao"><span class="icon-reply"></span> Voltar</a>
        <div class="espaco20"></div>

        <div class="texto-center thumbnail">
            <img src="<?php echo $imagem_banco ?>"/>
        </div>
        <div class="espaco20"></div>

        <table>
            <tr>
                <th>#</th>
                <th>Formulários</th>
                <th>Download</th>
            </tr>

            <?php
            if(!empty($tabela_formularios)):
                foreach($tabela_formularios as $i => $tabela_formulario):
                    if(!empty($tabela_formulario)):
                        echo '<tr>';
                        echo '<td class="texto-center">'.$tabela_formulario['codigo'].'</td>';
                        echo '<td>'.$tabela_formulario['formulario'].'</td>';
                        echo '<td class="texto-center"><a href="'.$tabela_formulario['download'].'"><span class="icon-download-1 size1-3 verde-agua"></span></a></td>';
                        echo '</tr>';
                    endif;
                endforeach;
            endif;
            ?>

        </table>
        
        <div class="espaco20"></div>

    </article>
    <div class="clear"></div>

</section>