<!-- on appelle le template-part contact.php -->
<?php get_template_part( 'template-parts/contact' ); ?>
<?php $url_racine_theme = get_stylesheet_directory_uri(); ?>

<?php wp_footer(); ?>

<footer>

    <div class="deux-colonnes">

        <div class="colonne-a">

            <p>Brisse Frédéric</p>
            <br/>
            <p>1 bis rue Camille Desmoulins</p>
            <p>59282 Douchy-les-mines</p>
            <hr/>
            <p>brisse.frederic.book@free.fr</p>
            <p>06 - 79 - 32 - 80 - 96</p>
            <p>03 - 27 - 31 - 67 - 59</p>
            <hr/>
            <p class="rgpd"><a href="/rgpd/">Politique de confidentialité</a></p>
            <p><a href="/mentions/">Mentions légales</a></p>
            <br/>
            <hr/>

        </div>

        <div class="colonne-b">

            <div class="reseaux-sociaux">

                <a href="https://github.com/Infatuated80?tab=repositories" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/github.png' ?>"></a>

                <a href="http://brisse.frederic.book.free.fr/" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/book.png' ?>"></a>

                <a href="https://www.linkedin.com/in/fr%C3%A9d%C3%A9ric-brisse-725073318/" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/linkedin.png' ?>"></a>

                <a href="https://fred80fr.gumroad.com/" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/gumroad.png' ?>"></a>
            
                <a href="https://www.youtube.com/channel/UCz59KGd_2nS2G3AniosP3Gw" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/youtube.png' ?>"></a>
            
                <a href="<?php echo $url_racine_theme . '/assets/doc/cv_brisse_frederic_2024.pdf' ?>" target="_blank"><img src="<?php echo $url_racine_theme . '/assets/img/cv.png' ?>"></a>

            </div>

            <p>Dernière mise à jour : 07 juillet 2024</p>
            <p class="copyright">@Propriété intellectuelle, tous droits réservés</p>
        </div>

    </div>
      
</footer>
</body>
</html>