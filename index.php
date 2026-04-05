<?php get_header(); ?>

    <main class="main">
        <?php 
        // Esta é a função que injeta os blocos do Gutenberg na página
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile; endif; 
        ?>
    </main>

    <a href="<?php echo esc_url( get_theme_mod( 'florapsi_whatsapp_link', '#' ) ); ?>" target="_blank" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

<?php get_footer(); ?>