<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="<?php echo HOME ?>/css/slides/swiper.css">

<!-- Demo styles -->
<style>
    .swiper-container {
        position: relative;
        width: 100%;

        margin: auto;
    }
    .swiper-slide a {
        display: block;
        position: absolute;
        width: 100%;

    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        height: auto;
        /*line-height: 300px;*/
    }
</style>

<!-- Swiper -->
<article id="box-slides">
<div class="swiper-container">
    <div class="swiper-wrapper texto">
        <div class="swiper-slide">
            <img src="<?php echo HOME ?>/imagens/slides/banner-aviso-2.png"/>
        </div>

        <div class="swiper-slide">
            <img src="<?php echo HOME ?>/imagens/slides/banner-consignado.jpg"/>
        </div>

        <div class="swiper-slide">
            <img src="<?php echo HOME ?>/imagens/slides/banner-portabilidade.jpg"/>
        </div>

        <div class="swiper-slide">
            <img src="<?php echo HOME ?>/imagens/slides/banner-cartao-inss.jpg"/>
        </div>

        <div class="swiper-slide">
            <img src="<?php echo HOME ?>/imagens/slides/slide1.jpg"/>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
</div>
</article>

<!-- Swiper JS -->
<script src="<?php echo HOME ?>/js/slides/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationType: 'progress',
        spaceBetween: 1000,
        centeredSlides: true,
        autoplay: 8000,
        autoplayDisableOnInteraction: false,
        lazyLoading: true
    });
</script>