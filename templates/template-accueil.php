<?php 
/* Template Name: template-fbdev-accueil */
?>

<?php get_header(); ?>

<?php 
    //On transmet l'url de la racine du thème à fbdev_js 
    $url_racine_theme = get_stylesheet_directory_uri();
    wp_localize_script( 'fbdev_js', 'url_racine_theme', $url_racine_theme );
?>

<main>
    <?php get_template_part( 'template-parts/banniere' ); ?>
    <?php 
        /* On récupère la taxonomies pour l'injecter dans le filtre. */
        $taxo_cat = get_terms( array(
        'taxonomy' => 'categorie',
        ) );
    ?>
    
        <h1 id="bienvenue">Bienvenue sur mon portfolio !</h1>
    <div class="bienvenue"> 

        <p>
            Si vous êtes intéressé par mon profil, vous pouvez me contacter directement. 
        </p>  
        
        <p>
            Je suis intéressé par tout ce qui touche aux technologies numériques. Que cela soit du domaine de la programmation, du développement ou du graphisme.
        </p>

        <p>
            En bas de page, vous trouverez mes coordonnées.
        </p>

        <p>
            Merci.
        </p>

    </div>

    <div class="mon-profil" id="profil">

        <hr />
        <h2>Mon profil</h2>
        <hr />
        <div class="profil-ligne">

            <div class="caractere">
                <h3>Soft Skills :</h3>
            </div>

            <div class="competence-dev">
                
            </div>

            <div class="competence-graph">
                
            </div>

        </div>

    </div>

    <div class="mes-projets" id="projets">
        <hr />
        <h2>Mes projets</h2>
        <hr />
        <div class="mes-filtres"> 
            <div> 

                <select name="categorie" id="select-categorie">
                    <option id="cat" value="" selected>Catégorie</option> 
                    <option value=""></option>
                    <?php
                        foreach( $taxo_cat as $categorie ): 
                            echo "<option value='" . $categorie->slug . "'>". $categorie->name . "</option>"; 
                        endforeach;
                    ?>  
                </select>

                <select name="trie-alpha" id="select-alpha">
                <option id="trie-alpha" value="" selected>Trier par titre</option><!-- désactive le filtre -->
                <option value=""></option><!-- Désactive le filtre -->
                <option value="ASC">A - Z</option> <!-- ASC(croissant) titre de A - Z -->
                <option value="DESC">Z - A</option> <!-- DESC(croissant) titre de Z - A -->
                </select>

                <select name="trie-date" id="select-trie">
                <option id="trie-date" value="" selected>Trier par date</option><!-- désactive le filtre -->
                <option value=""></option><!-- désactive le filtre -->
                <option value="DESC">Plus récentes</option> <!-- DESC pour une date, donnera les plus récents -->
                <option value="ASC">Plus anciennes</option> <!-- ASC pour une date, donnera les plus anciens -->
                </select>

            </div>
        </div>

        <div class="afficher-requete">
                        
        </div>

        <div class="contenaire-charger-plus" id="bas-de-page">
            <button id="charger-plus">Charger plus</button>
        </div>
    </div>

</main>

<?php get_footer(); ?>