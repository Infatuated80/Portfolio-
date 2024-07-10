<?php
/* Ce template nous permet d'afficher les projets en fonction d'une requête */
$requete->the_post();
$taxo = get_the_terms('', 'categorie');
$categorie = $taxo[0]->name;
?>
 
<div class="cartouche">
    <a href="<?php the_permalink();?>">
        <h3><?php echo the_title(); ?></h3>
        <h4>Réalisé le : <?php echo the_date(); ?></h4>
        <?php the_post_thumbnail( 'full' ); ?>
        <p><?php echo get_field('description_courte'); ?></p>
        <br/><br/>
        <p class="competence-titre">Compétences visées :</p>

        <?php get_template_part( 'template-parts/competences' ); ?>
    </a>
</div>
