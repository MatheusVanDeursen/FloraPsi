<?php

/* ==========================================================================
   CONFIGURAÇÃO DO TEMA
   ========================================================================== */
function florapsi_theme_setup() {
    add_theme_support('title-tag');

    // Suporte para o editor puxar os estilos
    add_theme_support('editor-styles');
    add_editor_style('css/styles.css');

    // Carrega o Font Awesome 6.5.1 dentro do editor para os ícones aparecerem
    //add_editor_style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');

    // Manda o WordPress procurar e carregar a pasta /patterns nativamente
    add_theme_support('core-block-patterns');

    // Habilita as Ferramentas de Aparência no Gutenberg (Cores, Margens, etc.)
    add_theme_support('appearance-tools');
    
    // Suportes explícitos (Garante que temas clássicos mostrem os painéis)
    add_theme_support('custom-spacing'); // Libera Padding e Margin
    add_theme_support('custom-line-height'); // Libera altura de linha
    add_theme_support('custom-units', 'rem', 'em', 'vh', 'vw'); // Libera unidades flexíveis

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
//require get_template_directory() . '/inc/cmb2-fields.php';


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
   SUPORTE A SVG
   ========================================================================== */
// Autoriza o upload de ficheiros SVG na Biblioteca de Média
function florapsi_add_svg_support($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'florapsi_add_svg_support');

// Corrige a visualização do SVG na Biblioteca de Média
function florapsi_fix_svg_display() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img[src$=".svg"] { width: 100% !important; height: auto !important; }
    </style>';
}
add_action('admin_head', 'florapsi_fix_svg_display');