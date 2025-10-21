<?php
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo HOME ?>/imagens/favicon.ico" />
    <meta name="viewport" content="width=device-width">

    <!-- SEO -->
    <title><?php echo $pagina_titulo; ?></title>
    <meta name="robots" content="index, follow"/>
    <link rel="canonical" href="<?php echo $pagina_url; ?>"/>
    <link rel="base" href="<?php echo HOME; ?>"/>

    <meta itemprop="name" content="<?php echo $pagina_titulo; ?>"/>
    <meta itemprop="description" content="<?php echo $pagina_descricao; ?>"/>
    <meta itemprop="image" content="<?php echo $pagina_imagem; ?>"/>
    <meta itemprop="url" content="<?php echo $pagina_url; ?>"/>
    <!-- FIM SEO -->

    <!-- Open Graph Facebook -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $pagina_titulo; ?>" />
    <meta property="og:description" content="<?php echo $pagina_descricao; ?>" />
    <meta property="og:image" content="<?php echo $pagina_imagem; ?>" />
    <meta property="og:url" content="<?php echo $pagina_url; ?>" />
    <meta property="og:site_name" content="<?php echo $site_nome; ?>" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:app_id" content="<?php echo $redes_sociais->facebook_app_id; ?>" />
    <meta property="article:author" content="https://www.facebook.com/<?php echo $redes_sociais->facebook_autor; ?>" />
    <meta property="article:publisher" content="https://www.facebook.com/<?php echo $redes_sociais->facebook_page; ?>" />
    <!-- Fim Open Graph Facebook -->

    <!-- Open Graph Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="<?php echo $redes_sociais->twitter; ?>" />
    <meta property="twitter:domain" content="<?php echo HOME; ?>" />
    <meta property="twitter:title" content="<?php echo $pagina_titulo; ?>" />
    <meta property="twitter:description" content="<?php echo $pagina_descricao; ?>" />
    <meta property="twitter:image:src" content="<?php echo $pagina_imagem; ?>" />
    <meta property="twitter:url" content="<?php echo $pagina_url; ?>" />
    <!-- Fim Open Graph Twitter -->

    <link rel="stylesheet" href="<?php echo HOME ?>/css/fontes/fontes.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/css/fontello.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/css/boot.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/css/site.css"/>

    <script src="<?php echo HOME ?>/js/jquery.js"></script>
    <script src="<?php echo HOME ?>/js/funcoes.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo HOME ?>/css/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo HOME ?>/js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="<?php echo HOME ?>/css/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo HOME ?>/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="<?php echo HOME ?>/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="<?php echo HOME ?>/css/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo HOME ?>/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

</head>
<body>

    <?php
    /*Painel do Site*/
    if($Url[0] == 'restrito'):

        $Url[1] = (empty($Url[1]) ? null : $Url[1]);

        if(file_exists('painel/' . $Url[1] . '.php')):
            include_once('painel/' . $Url[1] . '.php');

        elseif (file_exists('painel/' . $Url[1] . '/' . $Url[2] . '.php')):
            include_once('painel/' . $Url[1] . '/' . $Url[2] . '.php');

        elseif (file_exists('painel/' . $Url[1] . '/' . $Url[2] . '/'. $Url[3] . '.php')):
            include_once('painel/' . $Url[1] . '/' . $Url[2] . '/' . $Url[3]. '.php');

        elseif (file_exists('painel/' . $Url[1] . '/' . $Url[2] . '/'. $Url[3] . '/'. $Url[4] . '.php')):
            include_once('painel/' . $Url[1] . '/' . $Url[2] . '/' . $Url[3] . '/' . $Url[4] . '.php');

        else:
            include_once('telas/404.php');

        endif;

    else:

        /*Páginas do Site*/
        include_once('topo.php');

        $Url[1] = (empty($Url[1]) ? null : $Url[1]);

        if(file_exists('telas/' . $Url[0] . '.php')):
            include_once('telas/' . $Url[0] . '.php');

        elseif (file_exists('telas/' . $Url[0] . '/' . $Url[1] . '.php')):
            include_once('telas/' . $Url[0] . '/' . $Url[1] . '.php');

        elseif (file_exists('telas/' . $Url[0] . '/' . $Url[1] . '/'. $Url[2] . '.php')):
            include_once('telas/' . $Url[0] . '/' . $Url[1] . '/' . $Url[2]. '.php');

        elseif (file_exists('telas/' . $Url[0] . '/' . $Url[1] . '/'. $Url[2] . '/'. $Url[3] . '.php')):
            include_once('telas/' . $Url[0] . '/' . $Url[1] . '/' . $Url[2] . '/' . $Url[3] . '.php');

        else:
            include_once('telas/404.php');

        endif;

        include_once('rodape.php');

    endif;
    ?>

</body>
</html>

<script type="text/javascript">
    $(function (){
        $(".fancybox").fancybox({
            prevEffect		: 'none',
            nextEffect		: 'none',
            closeBtn		: false,
            helpers		: {
                title	: { type : 'inside' },
                buttons	: {}
            }
        });
    })
</script>