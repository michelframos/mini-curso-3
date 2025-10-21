<?php

class mudaURL {
    
    public function mudarUrl($url) {
        
    if (isset($url)):
        if (is_file($url . ".php")):
            include_once ($url . ".php");
        else:
            throw new Exception("Voce tentou acessar uma pagina que não existe !");
        endif;
    endif;
    
    }
}

