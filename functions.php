<?php

/* ==========================================================================
   CONFIGURAÇÃO DO TEMA
   ========================================================================== */
function florapsi_theme_setup() {
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary_menu' => __('Menu Principal', 'louize'),
    ));
}
add_action('after_setup_theme', 'florapsi_theme_setup');


/* ==========================================================================
   SCRIPTS E ESTILOS
   ========================================================================== */
function florapsi_css() {
    $theme_uri   = get_template_directory_uri();
    $css_version = filemtime(get_template_directory() . '/css/styles.css');
    $js_version  = filemtime(get_template_directory() . '/scripts/script.js');

    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], '6.5.1');
    wp_enqueue_style('louize-style', $theme_uri . '/css/styles.css', ['font-awesome'], $css_version);
    wp_enqueue_script('louize-script', $theme_uri . '/scripts/script.js', [], $js_version, true);
}
add_action('wp_enqueue_scripts', 'florapsi_css');


/* ==========================================================================
   INCLUDES
   ========================================================================== */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cmb2-fields.php';


/* ==========================================================================
   FUNCIONALIDADES EXTRAS (JS INLINE)
   ========================================================================== */
function florapsi_add_delayed_trigger_animation_script() {
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const delayedTargets = document.querySelectorAll('.slide-animation-delayed-trigger');
        const observerOptions = { root: null, threshold: 0.3 };

        const observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        delayedTargets.forEach(target => { observer.observe(target); });
    });
    </script>
    <?php
}
add_action('wp_footer', 'florapsi_add_delayed_trigger_animation_script');


/* ==========================================================================
   INTEGRAÇÃO YOAST SEO
   ========================================================================== */
function florapsi_integra_campos_seo( $content, $post ) {
    $page_inicio = get_page_by_title('Início');
    
    // Executa apenas na página inicial
    if ( ! $page_inicio || $post->ID !== $page_inicio->ID ) {
        return $content;
    }

    $extra_content = '';

    // Customizer
    $extra_content .= get_theme_mod('florapsi_banner_subtitle', '') . ' ';
    $extra_content .= get_theme_mod('florapsi_banner_text', '') . ' ';

    // Campos Simples CMB2
    $campos_simples = [
        'sobre_titulo', 'sobre_subtitulo', 'sobre_texto',
        'percurso_titulo', 'percurso_texto',
        'servicos_titulo_principal', 'duvidas_titulo', 'feedback_titulo'
    ];
    foreach ( $campos_simples as $campo ) {
        $valor = get_post_meta( $post->ID, $campo, true );
        if ( ! empty( $valor ) && ! is_array( $valor ) ) {
            $extra_content .= $valor . ' ';
        }
    }

    // Grupos Repetíveis CMB2
    $servicos = get_post_meta( $post->ID, 'servicos_cards_group', true );
    if ( is_array( $servicos ) ) {
        foreach ( $servicos as $s ) {
            $extra_content .= ( $s['servico_card_titulo'] ?? '' ) . ' ' . ( $s['servico_card_texto'] ?? '' ) . ' ';
        }
    }

    $duvidas = get_post_meta( $post->ID, 'duvidas_accordion', true );
    if ( is_array( $duvidas ) ) {
        foreach ( $duvidas as $d ) {
            $extra_content .= ( $d['pergunta'] ?? '' ) . ' ' . ( $d['resposta'] ?? '' ) . ' ';
        }
    }

    $feedbacks = get_post_meta( $post->ID, 'feedback_manual_group', true );
    if ( is_array( $feedbacks ) ) {
        foreach ( $feedbacks as $f ) {
            $extra_content .= ( $f['nome'] ?? '' ) . ' ' . ( $f['texto'] ?? '' ) . ' ';
        }
    }

    return $content . ' ' . $extra_content;
}
add_filter( 'wpseo_pre_analysis_post_content', 'florapsi_integra_campos_seo', 10, 2 );