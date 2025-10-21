<?php

    if(filter_input(INPUT_POST, "enviar")):

        require('classes/PHPMailer/class.phpmailer.php');

        $mensagem = "";
        $mensagem.= "<b>Mensagem enviada em</b> " . date("d/m/Y H:i:s") . "\n<br />";
        $mensagem.= "<b>Nome:</b> " . filter_input(INPUT_POST, "nome", FILTER_DEFAULT) . "\n<br />";
        $mensagem.= "<b>E-mail:</b> " . filter_input(INPUT_POST, "email", FILTER_DEFAULT) . "\n<br />";
        $mensagem.= "<b>Telefone:</b> " . filter_input(INPUT_POST, "telefone", FILTER_DEFAULT) . "\n<br />";
        $mensagem.= "<b>Assunto:</b> " . filter_input(INPUT_POST, "assunto", FILTER_DEFAULT) . "\n<br />";
        $mensagem.= '<br/>';
        $mensagem.= filter_input(INPUT_POST, "mensagem");

        $mail = new PHPMailer();

        $mail->SMTPDebug = 0;
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = 'smtp.realcredito.com.br'; // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Autenticação
        $mail->Username = 'contato@realcredito.com.br'; // Usuário do servidor SMTP
        $mail->Password = 'Mudar@123'; // Senha da caixa postal utilizada

        $mail->From = 'contato@realcredito.com.br';
        $mail->FromName = 'Novo Formulário de Contato';

        $mail->AddAddress('contato@realcredito.com.br', 'Novo Formulário de Contato');

        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

        $mail->Subject  = "Novo Formulário de Contato"; // Assunto da mensagem
        $mail->Body = $mensagem;

        $enviado = $mail->Send();

        $mail->ClearAllRecipients();
        $mail->ClearAttachments();


        if ($enviado):
            Mensagem("Mensagem enviada com sucesso!", "contato");
        else:
            Mensagem("Desculpe, houve um erro ao enviar sua mensagem!", "contato");
        endif;

    endif;

?>

<section>

    <header class="titulo-pagina">
        <div class="container">
            <h2 class="titulo">CONTATO</h2>
        </div>
    </header>

    <!--
    <div id="localizacao">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.632491652156!2d-51.84586148472676!3d-21.871707007253924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x949164cfda0f798b%3A0x280029214fc3fbf!2sR.+Djalma+Dutra%2C+222+-+Jardim+Arantes%2C+Pres.+Venceslau+-+SP%2C+19400-000!5e0!3m2!1spt-BR!2sbr!4v1523809305437" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    -->

    <article class="container line-height box-flex">

        <div class="espaco20"></div></div>

            <article class="coluna-70 padding-10">

                <div class="espaco20"></div>
                <h2 class="subtitulo">Fale Conosco</h2>
                <p>Fale conosco e tire suas dúvidas e/ou fique a par de nossos serviços</p>
                <div class="espaco20"></div>

                <form action="" name="formContato" method="post">

                    <label>Nome</label>
                    <div class="clear"></div>
                    <input type="text" name="nome" id="nome" value="" class="campo-100"/>
                    <div class="espaco20"></div>

                    <label>Assunto</label>
                    <div class="clear"></div>
                    <input type="text" name="assunto" id="assunto" value="" class="campo-100"/>
                    <div class="espaco20"></div>

                    <label>E-mail</label>
                    <div class="clear"></div>
                    <input type="text" name="email" id="email" value="" class="campo-100"/>
                    <div class="espaco20"></div>

                    <label>Telefone</label>
                    <div class="clear"></div>
                    <input type="text" name="telefone" id="telefone" value="" class="campo-100"/>
                    <div class="espaco20"></div>

                    <label>Mensagem</label>
                    <div class="clear"></div>
                    <textarea name="mensagem" id="mensagem" class="campo-100" rows="5"></textarea>
                    <div class="espaco20"></div>

                    <input type="submit" name="enviar" id="enviar" class="btn-padrao"/>

                </form>

            </article>

            <!-- Divisão de Colunas -->

            <article class="coluna-30 padding-10 bg-cinza">

                <div class="espaco20"></div>
                <h2 class="subtitulo verde-agua"><span class="icon-chat-alt"></span> ENCONTRE-NOS ATRAVÉS DOS CANAIS ABAIXO</h2>
                <div class="clear"></div>

                <ul class="listas">
                    <!--
                    <li><span class="icon-phone-1"></span> (11) 98699-7578</li>
                    <li><span class="fa fa-whatsapp" style="padding: 5px 9px;"></span> (11) 98699-7578</li>
                    -->
                    <li><span class="fa fa-whatsapp" style="padding: 6px 9px;"></span> (11) 98699-7578</li>
                    <li><span class="fa fa-whatsapp" style="padding: 6px 9px;"></span> (11) 97062-7133</li>
                    <li><span class="icon-mail-1"></span> contato@realcredito.com.br</li>
                </ul>
                <div class="espaco20"></div>

                <!--
                <h2 class="subtitulo verde-agua"><span class="icon-location-1"></span> FAÇA NOS UMA VISITA</h2>
                <div class="clear"></div>

                <ul class="listas">
                    <li>RealCred</li>
                    <li>Rua Djalma Dultra, 222 - Sala 3</li>
                    <li>Centro</li>
                    <li>Presidente Venceslau - SP</li>
                    <!--
                    <li>Telefone: (11) 98699-7578</li>
                    <li>Email: contato@realcredito.com.br</li>
                    -->
                <!--
                </ul>
                -->

            </article>

        <div class="espaco20"></div>

    </article>
    <div class="clear"></div>

</section>