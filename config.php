<?php
session_start();
ob_start();
date_default_timezone_set('America/Sao_Paulo');

$pastas = array('classes/', '../classes/', '../../classes/', '../../../classes/');

foreach($pastas as $pasta):
    if(is_file($pasta.'mudaURL.php')):
        include_once ($pasta.'mudaURL.php');
        break;
    endif;
endforeach;

/*Configurações de tags, site_name e outros*/
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'home' : $getUrl);
$Url = explode('/', $setUrl);

//var_dump($Url);

/*Pegando meta dados da Página*/
//define('HOME', 'http://localhost/real-credito');
define('HOME', 'https://saddlebrown-lyrebird-772598.hostingersite.com');


if(!empty($Url[0])):

    if($Url[0] == 'home'):
        $pagina_titulo = 'RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'empresa'):
        $pagina_titulo = 'Empresa - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'duvidas'):
        $pagina_titulo = 'Dúvidas Frequentes - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif(isset($Url[1]) && $Url[1] == 'consignado-inss'):
        $pagina_titulo = 'Consignado INSS - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif(isset($Url[1]) &&$Url[1] == 'portabilidade'):
        $pagina_titulo = 'Portabilidade - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif(isset($Url[1]) && $Url[1] == 'cartao-consignado'):
        $pagina_titulo = 'Cartão Consignado - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif(isset($Url[1]) && $Url[1] == 'governo'):
        $pagina_titulo = 'Governo - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif(isset($Url[1]) && $Url[1] == 'forcas-armadas'):
        $pagina_titulo = 'Forças Armadas - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'parceiros'):
        $pagina_titulo = 'Parceiros - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'contato'):
        $pagina_titulo = 'Contato - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'area-cliente'):
        $pagina_titulo = 'Área do Cliente - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    elseif($Url[0] == 'formularios-adesao'):
        $pagina_titulo = 'Formulários de Adesão - RealCred - Assessoria Financeira';
        $pagina_descricao = '';
        $palavras_chave = '';
        $pagina_imagem = HOME.'/imagens/seo/';
        $pagina_url = HOME.'/'.$Url[0];
    endif;

endif;



//MÁSCARA
function mascara($valor, $mascara){
    $maskared = '';
    $k = 0;

    for($i = 0; $i<=strlen($mascara)-1; $i++):

        if($mascara[$i] == '#'):
            if(isset($valor[$k])):
                $maskared .= $valor[$k++];
            endif;
        else:
            if(isset($mascara[$i])):
                $maskared .= $mascara[$i];
            endif;
        endif;

    endfor;

    return $maskared;
}

function Mensagem($mensagem, $redirecionamento){
    echo '<script>';
    echo 'alert("'.$mensagem.'");';
    echo 'location.href="'.$redirecionamento.'"';
    echo '</script>';
}


/*Formulários de Adesão*/
if($Url[0] == 'formularios'):

    if($Url[1] == 'banrisul'):
        $imagem_banco = HOME.'/imagens/parceiros/banrisul.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/banrisul/CCB_UNIFICADA_VERSAO.pdf'),
            array('codigo' => 2, 'formulario' => 'Declaração de Residência', 'download' => HOME.'/downloads/banrisul/Declaracao_de_Residencia_(Res_4292).pdf'),
            array('codigo' => 3, 'formulario' => 'Solicitação de Portabilidade', 'download' => HOME.'/downloads/banrisul/DFormulario_de_Solicitacao_de_Portabilidade_(Res_4292).pdf')
        );
    endif;

    if($Url[1] == 'bmg'):
        $imagem_banco = HOME.'/imagens/parceiros/bmg.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/bmg/2_99_032_-_CCB_.pdf'),
            array('codigo' => 2, 'formulario' => 'Termo de Adesão - Cartão de Crédito Consignado', 'download' => HOME.'/downloads/bmg/termo_25.09.2015.pdf')
        );
    endif;

    if($Url[1] == 'bonsucesso'):
        $imagem_banco = HOME.'/imagens/parceiros/bonsucesso.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Proposta de Empréstimo Consignado', 'download' => HOME.'/downloads/bonsucesso/lOSVPECJZB8yajybg3q4O4B.pdf'),
            array('codigo' => 2, 'formulario' => 'Contrato de Empréstimo Consignado', 'download' => HOME.'/downloads/bonsucesso/EMP006.pdf')
        );
    endif;

    if($Url[1] == 'bradesco'):
        $imagem_banco = HOME.'/imagens/parceiros/bradesco.png';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Autorização de Desconto em Folha de Pagamento', 'download' => HOME.'/downloads/bradesco/FBP737_-__Autorizacao_de_Desconto_em_Folha_de_Pagamento.pdf'),
            array('codigo' => 2, 'formulario' => 'Contrato de Empréstimo Pessoal Consignado em Folha de Pagamento ou em Benefício Previdenciário', 'download' => HOME.'/downloads/bradesco/FBP_700_V10_5049-001.pdf'),
            array('codigo' => 3, 'formulario' => 'SOMENTE EM CASO DE REFIN - Autorização de Desconto em Folha de Pagamento', 'download' => HOME.'/downloads/bradesco/FBP754_2.pdf')
        );
    endif;

    if($Url[1] == 'bv'):
        $imagem_banco = HOME.'/imagens/parceiros/bv.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Ficha de Cadastro Unificado', 'download' => HOME.'/downloads/bv/FICHA DE CADASTRO UNIFICADO.pdf'),
            array('codigo' => 2, 'formulario' => 'Orçamento da Operação de Crédito Bancário', 'download' => HOME.'/downloads/bv/ORCAMENTO DA OPERACAO DE CREDITO BANCARIO.pdf')
        );
    endif;

    if($Url[1] == 'cetelem'):
        $imagem_banco = HOME.'/imagens/parceiros/cetelem.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Termo de Adesão Cartão Consignado', 'download' => HOME.'/downloads/cetelem/Termo_de_Adesao_Cartao_Consignado.pdf'),
            array('codigo' => 2, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/cetelem/20.024.07.pdf')
        );
    endif;

    if($Url[1] == 'daycoval'):
        $imagem_banco = HOME.'/imagens/parceiros/daycoval.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/daycoval/CCB.pdf'),
            array('codigo' => 2, 'formulario' => 'Ficha Cadastral Simplificada Pessoa Física', 'download' => HOME.'/downloads/daycoval/FICHA CASTRAL SIMPLIFICADA FRENTE.pdf'),
            array('codigo' => 3, 'formulario' => 'Solicitação de Portabilidade', 'download' => HOME.'/downloads/daycoval/SOLICITACAO DE PORTABILIDADE.pdf'),
            array('codigo' => 4, 'formulario' => 'Autorização para Desconto em Folha', 'download' => HOME.'/downloads/daycoval/AUTORIZACAO PARA DESCONTO EM FOLHA.pdf'),
            array('codigo' => 5, 'formulario' => 'Autorização para Pagamento de Empréstimo Consignado', 'download' => HOME.'/downloads/daycoval/AUTORIZACAO PARA PAGAMENTO DE EMPRESTIMO CONSIGNADO.pdf'),
        );
    endif;

    if($Url[1] == 'estrela-guia'):
        $imagem_banco = HOME.'/imagens/parceiros/estrela-guia.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Proposta de Empréstimo Consignado', 'download' => HOME.'/downloads/estrela-guia/lOSVPECJZB8yajybg3q4O4B.pdf'),
            array('codigo' => 2, 'formulario' => 'Contrato de Empréstimo Consignado', 'download' => HOME.'/downloads/estrela-guia/EMP006.pdf')
        );
    endif;

    if($Url[1] == 'intermedium'):
        $imagem_banco = HOME.'/imagens/parceiros/intermedium.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Autorização de Consignação de Empréstimo nos Benefícios Previdenciários', 'download' => HOME.'/downloads/intermedium/AUTORIZACAO_DE_CONSIGNACAO_DE_EMPRESTIMO_NOS_BENEFICIOS_PREVIDENCIARIOS_(ANEXO_I)_-_CP005.pdf'),
            //array('codigo' => 2, 'formulario' => 'Cédula de Crédito Bancário', 'download' => HOME.'/downloads/intermedium/CEDULA_DE_CREDITO_-_INSS_(CP002)_03102016.pdf'),
            array('codigo' => 2, 'formulario' => 'Declaração de Recebimento de Cédula de Crédito Bancário', 'download' => HOME.'/downloads/intermedium/CP020-1_-_Declaracao_de_Recebimento_-_CCB_-_BANCO_INTERMEDIUM.pdf'),
            array('codigo' => 3, 'formulario' => 'Proposta de Crédito Pessoa Física', 'download' => HOME.'/downloads/intermedium/PROPOSTA_DE_CREDITO_INTERMEDIUM.pdf'),
            array('codigo' => 4, 'formulario' => 'Termo de Autorização para Liquidar Empréstimo', 'download' => HOME.'/downloads/intermedium/TERMO_DE_AUTORIZACAO_DE_LIQUIDACAO_DE_EMPRESTIMO_REFIN-RETENCAO_-_INSS.pdf'),
        );
    endif;

    if($Url[1] == 'itau'):
        $imagem_banco = HOME.'/imagens/parceiros/itau-bmg.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/itau/CEDULA DE CREDITO BANCARIO.pdf'),
            array('codigo' => 2, 'formulario' => 'Proposta de Abertura de Limite de Crédito com Desconto em Folha de Pagamento', 'download' => HOME.'/downloads/itau/PROPOSTA DE ABERTURA DE LIMITE.pdf')
        );
    endif;

    if($Url[1] == 'mercantil'):
        $imagem_banco = HOME.'/imagens/parceiros/mercantil.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Autorização de Consignação de Empréstimos', 'download' => HOME.'/downloads/mercantil/AUTORIZACAO.pdf'),
            array('codigo' => 2, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/mercantil/CCB.pdf'),
            array('codigo' => 3, 'formulario' => 'Declaração de Crédito Consignado', 'download' => HOME.'/downloads/mercantil/DECLARACAO.pdf')
        );
    endif;

    if($Url[1] == 'pan'):
        $imagem_banco = HOME.'/imagens/parceiros/pan.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/pan/CCB.pdf'),
            array('codigo' => 2, 'formulario' => 'CET - Custo Efetivo Total', 'download' => HOME.'/downloads/pan/CET.pdf'),
            array('codigo' => 3, 'formulario' => 'Ficha Cadastral de Pessoa Física', 'download' => HOME.'/downloads/pan/FICHA CADASTRAL.pdf'),
            array('codigo' => 4, 'formulario' => 'CARTÃO PAN - Autorização para Desconto em Folha de Pagamento', 'download' => HOME.'/downloads/pan/AUTORIZACAO PARA DESCONTO.pdf'),
            array('codigo' => 5, 'formulario' => 'CARTÃO PAN - Solicitação de Saque via Cartão de Crédito', 'download' => HOME.'/downloads/pan/SOLICITACAO DE SAQUE.pdf'),
            array('codigo' => 6, 'formulario' => 'CARTÃO PAN - Termo de Adesão para Utilização do Cartão de Crédito Consigando', 'download' => HOME.'/downloads/pan/TERMO DE ADESAO.pdf'),
        );
    endif;

    if($Url[1] == 'sabemi'):
        $imagem_banco = HOME.'/imagens/parceiros/sabemi.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Ficha de Inscrição do Seguro', 'download' => HOME.'/downloads/sabemi/Ficha_Inscricao_-_Proposta_de_Adesao.pdf'),
            array('codigo' => 2, 'formulario' => 'Proposta de Adesão ao Seguro', 'download' => HOME.'/downloads/sabemi/proposta_adesao.pdf'),
            array('codigo' => 3, 'formulario' => 'Autorização para Desconto em Folha de Pagamento', 'download' => HOME.'/downloads/sabemi/Autorizacao_Desconto_em_Folha.pdf')
        );
    endif;

    if($Url[1] == 'safra'):
        $imagem_banco = HOME.'/imagens/parceiros/safra.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'Autorização para Solicitação de Informações e Requisição de Portabilidade de Operação de Crédito', 'download' => HOME.'/downloads/safra/Dom_7446.pdf'),
            array('codigo' => 2, 'formulario' => 'Proposta Contratual - Empréstimo Pessoal mediante Consignação em Folha de Pagamento', 'download' => HOME.'/downloads/safra/novo_kit_safra0002.pdf')
        );
    endif;

    if($Url[1] == 'sul-financeira'):
        $imagem_banco = HOME.'/imagens/parceiros/sul-financeira.jpeg';
        $tabela_formularios = array(
            array('codigo' => 1, 'formulario' => 'CCB - Cédula de Crédito Bancário', 'download' => HOME.'/downloads/sul-financeira/CCB_BRASIL_FINANCEIRA.pdf'),
            array('codigo' => 2, 'formulario' => 'Autorização de Débito em Conta Corrente', 'download' => HOME.'/downloads/sul-financeira/AUTORIZACAO_DEBITO_CONTA_BRASIL_FINANCEIRA (1).pdf'),
            array('codigo' => 3, 'formulario' => 'Cadastro Simplificado / Proposta da Operação', 'download' => HOME.'/downloads/sul-financeira/CADASTRO_BRASIL_FINANCEIRA (1).pdf.pdf'),
            array('codigo' => 4, 'formulario' => 'Declaração de Aumento de Parcela Portabilidade de Crédito', 'download' => HOME.'/downloads/sul-financeira/AUMENTO_DE_PARCELA_BRASIL_FINANCEIRA.pdf'),
            array('codigo' => 5, 'formulario' => 'Termo de Requisição de Portabilidade', 'download' => HOME.'/downloads/sul-financeira/TERMO_PORTABILIDADE_BRASIL_FINANCEIRA.pdf')
        );
    endif;

endif;
