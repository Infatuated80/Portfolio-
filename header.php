<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Ce site représente mon portfolio. Je relate mon profil et mes projets en informatique. Vous trouverez pour chaque projet une séquence vidéo. J'ai programmé ce site via WordPress en créant mon propre théme. Je suis graphiste, développeur et programmeur.">
    <meta name="keywords" content="portfolio, développeur, programmeur, graphiste, WordPress, OpenClassrooms, informatique, 3d, 2d, infographie, cv, projets, programmation, E-commerce, formations">
    <meta name="author" content="Brisse Frédéric">
    <meta name="title" content="Bienvenue sur mon Portfolio !">
    <title>Portfolio de Brisse frédéric, développeur web</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
    <header>
            <div class="mon-menu">
                <?php wp_nav_menu(['theme_location' => 'header']) ?>
            </div>
    </header>