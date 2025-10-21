<?php

if(filter_input(INPUT_POST, "enviar")):

    /*Fazendo upload dos arquivos*/
    $anexos = array(
        'arquivo_rg_cpf',
        'arquivo_comprovante_residencia',
        'arquivo_formulario_1',
        'arquivo_formulario_2',
        'arquivo_formulario_3'
    );

    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);

    if(!file_exists('uploads/'.$cpf)):
        mkdir('uploads/'.$cpf, 0777, true);
    endif;

    foreach($anexos as $anexo):
        $arquivo = $_FILES[$anexo]['name'];
        $arquivo_tmp = $_FILES[$anexo]['tmp_name'];
        $destino = 'uploads/'.$cpf.'/'.$arquivo;

        move_uploaded_file($arquivo_tmp, $destino);
    endforeach;

    require('classes/PHPMailer/class.phpmailer.php');

    $mensagem = "";
    $mensagem.= "<b>Mensagem enviada em</b> " . date("d/m/Y H:i:s") . "\n<br />";
    $mensagem.= "<b>Nome do Vendedor:</b> " . filter_input(INPUT_POST, "nome_vendedor", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Operação:</b> " . filter_input(INPUT_POST, "operacao", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Eu Sou:</b> " . filter_input(INPUT_POST, "eu_sou", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Nome:</b> " . filter_input(INPUT_POST, "nome", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Data de Nascimento:</b> " . filter_input(INPUT_POST, "data_nascimento", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>CPF:</b> " . filter_input(INPUT_POST, "cpf", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>RG:</b> " . filter_input(INPUT_POST, "rg", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Data Emissão do RG:</b> " . filter_input(INPUT_POST, "data_emissao_rg", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Matrícula:</b> " . filter_input(INPUT_POST, "matricula", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Naturalidade:</b> " . filter_input(INPUT_POST, "naturalidade", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Filiação Mãe:</b> " . filter_input(INPUT_POST, "filiacao", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Email:</b> " . filter_input(INPUT_POST, "email", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Telefone Residencial:</b> " . filter_input(INPUT_POST, "telefone", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Celular:</b> " . filter_input(INPUT_POST, "celular", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Endereço:</b> " . filter_input(INPUT_POST, "endereco", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Cidade:</b> " . filter_input(INPUT_POST, "cidade", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>CEP:</b> " . filter_input(INPUT_POST, "cep", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Nome do Banco:</b> " . filter_input(INPUT_POST, "nome_banco", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Tipo de Conta:</b> " . filter_input(INPUT_POST, "tipo_conta", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Número da Agência:</b> " . filter_input(INPUT_POST, "numero_agencia", FILTER_DEFAULT) . "\n<br />";
    $mensagem.= "<b>Número da Conta:</b> " . filter_input(INPUT_POST, "numero_conta", FILTER_DEFAULT) . "\n<br />";

    $mail = new PHPMailer();

    $mail->SMTPDebug = 0;
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = 'smtp.realcredito.com.br'; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Autenticação
    $mail->Username = 'contato@realcredito.com.br'; // Usuário do servidor SMTP
    $mail->Password = 'Mudar@123'; // Senha da caixa postal utilizada

    $mail->From = 'contato@email.com.br';
    $mail->FromName = 'Novo Envio de Dados:' . filter_input(INPUT_POST, "nome_vendedor", FILTER_DEFAULT);

    $mail->AddAddress('contato@email.com.br', 'Novo Envio de Dados:' . filter_input(INPUT_POST, "nome_vendedor", FILTER_DEFAULT));

    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

    $mail->Subject  = 'Novo Envio de Dados:' . filter_input(INPUT_POST, "nome_vendedor", FILTER_DEFAULT); // Assunto da mensagem
    $mail->Body = $mensagem;

    foreach($anexos as $anexo):
        $mail->AddAttachment('uploads/'.$cpf.'/'.$_FILES[$anexo]['name'], $_FILES[$anexo]['name']);
    endforeach;

    $enviado = $mail->Send();

    $mail->ClearAllRecipients();
    $mail->ClearAttachments();

    if ($enviado):
        foreach($anexos as $anexo):
            unlink('uploads/'.$cpf.'/'.$_FILES[$anexo]['name']);
        endforeach;
        rmdir('uploads/'.$cpf);

        Mensagem("Mensagem enviada com sucesso!", "contato");
    else:
        Mensagem("Desculpe, houve um erro ao enviar sua mensagem!", "contato");
    endif;

endif;

?>

<section>

    <header class="titulo-pagina">
        <div class="container">
            <h2 class="titulo">Área do Cliente</h2>
        </div>
    </header>

    <article class="container line-height">

        <div class="espaco20"></div>

        <h2 class="subtitulo">Caro Cliente</h2>
        <h2 class="subtitulo">Este canal tem por objetivo acelerar o processo de contratação. A coleta de dados cadastrais e documentais, trará mais brevidade ao processo.</h2>
        <div class="espaco20"></div>

        <form action="" name="formDados" method="post" enctype="multipart/form-data">

            <label>Nome do Vendedor</label>
            <div class="clear"></div>
            <input type="text" name="nome_vendedor" class="campo-100" value=""/>
            <div class="espaco20"></div>

            <div class="coluna-1-4">
            <label>Escolha a Operação:*</label>
            <div class="clear"></div>
                <select name="operacao" required>
                    <option value="">Selecione sua operação</option>
                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                    <option value="Empréstimo Consignado">Empréstimo Consignado</option>
                    <option value="Refin ou Renovação">Refin ou Renovação</option>
                    <option value="Portabilidade">Portabilidade</option>
                    <option value="Empréstimo Pessoal">Empréstimo Pessoal</option>
                </select>
            </div>

            <div class="coluna-1-4">
                <label>Eu sou:*</label>
                <div class="clear"></div>
                <select name="eu_sou" required>
                    <option value="INSS">Aposentado (a) pelo INSS</option>
                    <option value="Servidor Estadual">Servidor Público Estadual</option>
                    <option value="Servidor Federal">Servidor Público Federal</option>
                    <option value="Forças Armadas">Forças Armadas</option>
                </select>
            </div>
            <div class="espaco20"></div>

            <label>Nome:*</label>
            <div class="clear"></div>
            <input type="text" name="nome" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <div class="coluna-1-4">
                <label>Data de Nascimento:*</label>
                <div class="clear"></div>
                <input type="text" name="data_nascimento" value="" required/>
            </div>

            <div class="coluna-1-4">
                <label>CPF:*</label>
                <div class="clear"></div>
                <input type="text" name="cpf" value="" required/>
            </div>

            <div class="coluna-1-4">
                <label>RG:*</label>
                <div class="clear"></div>
                <input type="text" name="rg" value="" required/>
            </div>

            <div class="coluna-1-4">
                <label>Data Emissão do RG:*</label>
                <div class="clear"></div>
                <input type="text" name="data_emissao_rg" value="" required/>
            </div>
            <div class="espaco20"></div>

            <label>Matrícula:*</label>
            <div class="clear"></div>
            <input type="text" name="matricula" value="" required/>
            <div class="espaco20"></div>

            <label>Naturalidade:*</label>
            <div class="clear"></div>
            <input type="text" name="naturalidade" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <label>Filiação Mãe:*</label>
            <div class="clear"></div>
            <input type="text" name="filiacao" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <label>Email:*</label>
            <div class="clear"></div>
            <input type="text" name="email" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <div class="coluna-1-4">
                <label>Telefone Residencial:*</label>
                <div class="clear"></div>
                <input type="text" name="telefone" value="" required/>
            </div>

            <div class="coluna-1-4">
                <label>Celular:</label>
                <div class="clear"></div>
                <input type="text" name="celular" value=""/>
            </div>
            <div class="espaco20"></div>

            <label>Endereço:*</label>
            <div class="clear"></div>
            <input type="text" name="endereco" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <label>Cidade:*</label>
            <div class="clear"></div>
            <input type="text" name="cidade" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <label>CEP:*</label>
            <div class="clear"></div>
            <input type="text" name="cep" value="" required/>
            <div class="espaco20"></div>

            <label>Nome do Banco:*</label>
            <div class="clear"></div>
            <input type="text" name="nome_banco" class="campo-100" value="" required/>
            <div class="espaco20"></div>

            <div class="coluna-1-4">
                <label>Tipo de Conta:*</label>
                <div class="clear"></div>
                <select name="tipo_conta" required>
                    <option value="Conta Corrente">Conta Corrente</option>
                    <option value="Conta Poupança">Conta Poupança</option>
                </select>
            </div>

            <div class="coluna-1-4">
                <label>Número da Agência:*</label>
                <div class="clear"></div>
                <input type="text" name="numero_agencia" value="" required/>
            </div>

            <div class="coluna-1-4">
                <label>Número da Conta:*</label>
                <div class="clear"></div>
                <input type="text" name="numero_conta" value="" required/>
            </div>
            <div class="espaco20"></div>

            <!-- Anexos -->

            <div class="coluna-1-3">
                <label>Arquivo Documento Identidade RG com CPF*</label>
                <div class="clear"></div>
                <input type="file" name="arquivo_rg_cpf" value="" required class="texto"/>
            </div>

            <div class="coluna-1-3">
                <label>Arquivo Comprovante de Residencia*</label>
                <div class="clear"></div>
                <input type="file" name="arquivo_comprovante_residencia" value="" required class="texto"/>
            </div>

            <div class="coluna-1-3">
                <label>Arquivo Formulário*</label>
                <div class="clear"></div>
                <input type="file" name="arquivo_formulario_1" value="" required class="texto"/>
            </div>

            <div class="coluna-1-3">
                <label>Arquivo Formulário 2*</label>
                <div class="clear"></div>
                <input type="file" name="arquivo_formulario_2" value="" required class="texto"/>
            </div>

            <div class="coluna-1-3">
                <label>Arquivo Formulário 3*</label>
                <div class="clear"></div>
                <input type="file" name="arquivo_formulario_3" value="" required class="texto"/>
            </div>
            <div class="espaco20"></div>

            <!-- Anexos -->

            <input type="submit" name="enviar" class="btn-padrao" value="Enviar Dados"/>

        </form>

        <div class="espaco20"></div>

    </article>
    <div class="clear"></div>

</section>