<?php get_header(); ?>

<main>
    <?php get_template_part( 'template-parts/banniere' ); ?>
    <?php 
		$taxo = get_the_terms('', 'categorie');
		$categorie = $taxo[0]->name;
		
		$id_post = get_the_ID();
	?>
    <div class="ma-single-page">
        <h1><?php the_title(); ?></h1>

        <h3>Réalisé le : <?php echo the_time('d/m/Y'); ?></h3>

        <hr class="titre">

        <div class="ma-single-video">
            <iframe frameborder="0" src="<?php echo get_field('clip'); ?>" allowfullscreen></iframe>
        </div>

        <hr />
        <h2>Présentation du projet :</h2>
        <hr />
       
        <p class="description-longue"><?php echo get_field('description_longue'); ?></p>

        <hr />
        <h2>Solutions techniques :</h2>
        <hr />

        <div class="solution-technique">
            <div class="technique-langage">

                <h3>Langages utilisés :</h3>
                <p><?php echo get_field('langages_utilises'); ?></p>

            </div>

            <div class="technique-competences">

                <h3>Points abordés :</h3>
                <?php get_template_part( 'template-parts/competences' ); ?>

            </div>
        </div>
        
        <a href="<?php echo get_field('lien');?>" target="_blank"><div class="bouton-projet">Code / Site</div></a>

    </div>
</main>

<?php get_footer(); ?>