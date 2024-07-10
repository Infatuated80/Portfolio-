<?php 
function theme_fbdev_support()
{
    {
        register_nav_menu('header', 'En tête du menu');
    }
}

add_action('after_setup_theme', 'theme_fbdev_support');

function fbdev_chargement_assets() 
{
    // Déclaration du Javascript
	wp_enqueue_script('fbdev_js', get_template_directory_uri() . '/js/fbdev-base.js', array( 'jquery' ), '1.0', true);
    
    // Déclarer du fichier style.css à la racine du thème fb-dev
    wp_enqueue_style('fbdev_css',get_stylesheet_uri(), array(), '1.0'); 	
}

// Permet la gestion des menus
add_theme_support('menus');

// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

// On charge notre fonction 'mota_chargement_assets' en utilisant le hook add_action
add_action('wp_enqueue_scripts', 'fbdev_chargement_assets');

/* Début Script pour Ajax */
    function ajax_customisation()
    {
        //On définit le script custom-ajax, sa localisation et on le rend compatible avec jquery / Ajax
        wp_register_script('custom-ajax', get_stylesheet_directory_uri() . '/js/ajax.js', array('jquery'), false, true);

        //On localise le script avec de nouvelles données et on sécurise la transaction
        $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce( 'charger_plus_projet' ),
        );

        $script_data_run = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce( 'init_accueil' ),
        );
    
        wp_localize_script('custom-ajax', 'demarrage', $script_data_run); //On sécurise la transaction
        wp_localize_script('custom-ajax', 'blog', $script_data_array); //On sécurise la transaction
        

        wp_localize_script('custom-ajax', 'varcat',[ //On sécurise la transaction
        'ajax_url' => admin_url('admin-ajax.php'),
        ]);

        //Script avec les données localisées dans la file d'attente
        wp_enqueue_script( 'custom-ajax' );
    }  

    add_action('wp_enqueue_scripts', 'ajax_customisation' );


    function charger_demarrage_appel()
    {       
        //Critères de selection
        $args = array(
        'post_type' => 'projet', 
        'post_status' => 'publish',
        'orderby' => $_POST['trier'],
        'order' => 'DESC', // Par défaut, on affiche les plus récentes.(DESC = plus récente | ASC = plus ancienne)
        'posts_per_page' => $_POST['nbre'], // -1 Pour tout afficher sur une page sinon mettre valeur > 0. 
        'paged' => $_POST['page'], //On affiche la première page uniquement lors du lancement.
        );

        //Récupération des arguments de selection pour notre requête.
        $requete = new WP_Query( $args );

        //Si un ou plusieurs post correspond, on lance la boucle
        if ($requete->have_posts()) 
        {   
            while ( $requete->have_posts() ) 
            {
                include ('template-parts/loop_display.php'); 
            }
            // Restore original post data.
            wp_reset_postdata(); 
            wp_reset_query();
            wp_die();
        } 
    }

    function charger_plus_ajax_appel()
        {
            check_ajax_referer('charger_plus_projet', 'security'); // nonce de $script_data_array, le jeton de sécurité

            $args = array(
            'post_type' => 'projet', 
            'post_status' => 'publish',
            'orderby' => $_POST['trier'],
            'order' => $_POST['ordre'],
            'posts_per_page' => $_POST['nbre'], 
            'paged' => $_POST['page'], 
            );

                $cat = $_POST['cat'];       

                if(!empty($cat))
                {
                    $args['tax_query'][] = [
                    'taxonomy'=> 'categorie',
                    'field' => 'slug',
                    'terms' => $cat,
                ];
                }

            //Récupération des arguments de selection pour notre requête.
            $requete = new WP_Query( $args );

            //Si un ou plusieurs post correspond, on lance la boucle
            if ($requete -> have_posts())
            {    
                while ( $requete->have_posts() ) 
                {
                    include ('template-parts/loop_display.php'); 
                }
                // Restore original post data.
                wp_reset_postdata(); 
                wp_reset_query();
                wp_die();
            } 
        }
    
    function filter_projet_appel()
    {
        $ordre = $_REQUEST['ordre']; // on récupère les valeurs data du fichier ajax.js
        $page = $_REQUEST['page'];
        $nbre = $_REQUEST['nbre'];
        $trier = $_REQUEST['trier'];

        if(empty($page))
        {
            $page = 1;
        }

        $args = array(
        'post_type' => 'projet', 
        'post_status' => 'publish',
        'orderby' => $trier,
        'order' => $ordre,
        'posts_per_page' => $nbre, 
        'paged' => $page, 
        );

        $cat = $_REQUEST['cat'];

        if(!empty($cat))
        {
            $args['tax_query'][] = [
                'taxonomy'=> 'categorie',
                'field' => 'slug',
                'terms' => $cat,
            ];
        }

        $requete = new wp_query($args);
        if($requete -> have_posts())
        {
            while($requete->have_posts())
            {
                include ('template-parts/loop_display.php'); 
            }
            // Restore original post data.
            wp_reset_postdata(); 
            wp_reset_query();
            wp_die();
        }

        else
        {
            echo "<script>alert('Aucun projet ne correspond à cette requête !')</script>";
        }
        wp_reset_postdata(); 
        wp_reset_query();
        wp_die();
    }

    //Action qui lance la fonction charger_demarrage_appel qui initialisera les projets de la page d'accueil.
    add_action('wp_ajax_charger_demarrage', 'charger_demarrage_appel'); // Pour utilisateurs connectés
    add_action('wp_ajax_nopriv_charger_demarrage', 'charger_demarrage_appel'); // Pour utilisateurs non connectés       
    
    //Action qui lance la fonction charger_plus_ajax_appel    
    add_action('wp_ajax_charger_plus_ajax', 'charger_plus_ajax_appel'); // Pour utilisateurs connectés
    add_action('wp_ajax_nopriv_charger_plus_ajax', 'charger_plus_ajax_appel'); // Pour utilisateurs non connectés

    
    //Action qui lance la fonction filter_projet_appel
    add_action('wp_ajax_filter_projet', 'filter_projet_appel');// Pour utilisateurs connectés
    add_action('wp_ajax_nopriv_filter_projet', 'filter_projet_appel');// Pour utilisateurs non connectés

/* Fin script pour Ajax */