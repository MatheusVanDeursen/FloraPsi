<?php
/**
 * Adiciona as configurações de personalização do tema.
 *
 * @param WP_Customize_Manager $wp_customize Manager do Customizer.
 */
function florapsi_customize_register($wp_customize) {

    // Opções reutilizáveis
    $font_weight_choices = array(
        '100' => 'Fino (100)', '200' => 'Extra Leve (200)', '300' => 'Leve (300)',
        '400' => 'Normal (400)', '500' => 'Médio (500)', '600' => 'Semi-negrito (600)',
        '700' => 'Negrito (700)', '800' => 'Extra Negrito (800)', '900' => 'Preto (900)',
    );
    
    $font_family_choices = array(
        'Sofia Pro'      => 'Sofia Pro',
        'Kepler'         => 'Kepler',
        'Tan Mon Cheri'  => 'Tan Mon Cheri',
        'Segoe UI Light' => 'Segoe UI Light',
        'Arial'          => 'Arial',
        'Helvetica'      => 'Helvetica',
        'Times New Roman'=> 'Times New Roman',
        'Courier New'    => 'Courier New',
        'Verdana'        => 'Verdana',
        'Georgia'        => 'Georgia',
        'Tahoma'         => 'Tahoma',
        'Trebuchet MS'   => 'Trebuchet MS',
        'Impact'         => 'Impact',
    );

    /* -------------------------------------------------------------------------
     * RESPONSIVIDADE
     * ------------------------------------------------------------------------- */
    $wp_customize->add_section('florapsi_responsividade_section', array(
        'title'    => __('Responsividade', 'louize'),
        'priority' => 110,
    ));

    // Ponto de Interrupção: Tablet
    $wp_customize->add_setting('florapsi_tablet_breakpoint', array('default' => '992', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_tablet_breakpoint', array(
        'label'    => __('Largura Máxima: Tablet (px)', 'louize'),
        'section'  => 'florapsi_responsividade_section',
        'type'     => 'number',
    ));

    // Ponto de Interrupção: Mobile
    $wp_customize->add_setting('florapsi_mobile_breakpoint', array('default' => '576', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_mobile_breakpoint', array(
        'label'    => __('Largura Máxima: Mobile (px)', 'louize'),
        'section'  => 'florapsi_responsividade_section',
        'type'     => 'number',
    ));

    /* -------------------------------------------------------------------------
     * CABEÇALHO (HEADER)
     * ------------------------------------------------------------------------- */
    $wp_customize->add_section('florapsi_header_section', array(
        'title'    => __('Cabeçalho', 'louize'),
        'priority' => 21,
    ));

    // Cor de Fundo
    $wp_customize->add_setting('florapsi_navbar_background_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_navbar_background_color_control', array(
        'label'    => __('Cor de Fundo da Barra de Navegação', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_navbar_background_color',
    )));

    // Logo
    $wp_customize->add_setting('florapsi_header_logo', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'florapsi_header_logo_control', array(
        'label'    => __('Logo Principal (no topo)', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_header_logo',
    )));
    
    // Tipografia do Menu
    $wp_customize->add_setting('florapsi_menu_font_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_menu_font_color_control', array(
        'label'    => __('Cor da Fonte do Menu', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_menu_font_color',
    )));

    $wp_customize->add_setting('florapsi_menu_font_family', array('default' => 'Segoe UI Light', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_menu_font_family_control', array(
        'label'    => __('Fonte do Menu', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_menu_font_family',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_menu_font_size', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_menu_font_size_control', array(
        'label'    => __('Tamanho da Fonte do Menu (px)', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_menu_font_size',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_menu_font_weight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_menu_font_weight_control', array(
        'label'    => __('Peso da Fonte do Menu', 'louize'),
        'section'  => 'florapsi_header_section',
        'settings' => 'florapsi_menu_font_weight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    /* -------------------------------------------------------------------------
    * PAINEL: BANNER PRINCIPAL
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_banner_panel', array(
        'title'       => __('Banner Principal', 'louize'),
        'description' => __('Configurações de fundo, frases, botão e responsividade do banner.', 'louize'),
        'priority'    => 101,
    ));

    /* --- SUBSEÇÃO: Fundo --- */
    $wp_customize->add_section('florapsi_banner_fundo_section', array(
        'title'    => __('Banner: Fundo', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_banner_bg_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_bg_color', array(
        'label'    => __('Cor de Fundo da Seção', 'louize'),
        'section'  => 'florapsi_banner_fundo_section',
    )));

    /* --- SUBSEÇÃO: Frases - Cores --- */
    $wp_customize->add_section('florapsi_banner_frases_color_section', array(
        'title'    => __('Frases: Cores', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 20,
    ));

    $wp_customize->add_setting('florapsi_banner_subtitle_color', array('default' => '#E5CDC0', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_subtitle_color', array('label' => __('Cor do Subtítulo', 'louize'), 'section' => 'florapsi_banner_frases_color_section')));

    $wp_customize->add_setting('florapsi_banner_text_color', array('default' => '#E5CDC0', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_text_color', array('label' => __('Cor do Texto Principal', 'louize'), 'section' => 'florapsi_banner_frases_color_section')));

    /* --- SUBSEÇÃO: Frases - Texto e Fonte --- */
    $wp_customize->add_section('florapsi_banner_frases_text_section', array(
        'title'    => __('Frases: Texto e Fonte', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 30,
    ));

    // --- Subtítulo ---
    $wp_customize->add_setting('florapsi_banner_subtitle', array('default' => 'Seja bem-vindo', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_subtitle', array('label' => __('Conteúdo do Subtítulo', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'text'));

    $wp_customize->add_setting('florapsi_banner_subtitle_font_family', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_subtitle_font_family', array('label' => __('Fonte do Subtítulo', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_banner_subtitle_font_size', array('default' => '80', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_font_size', array('label' => __('Tamanho do Subtítulo (px)', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_subtitle_font_weight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_font_weight', array('label' => __('Peso do Subtítulo', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    // --- Texto Principal ---
    $wp_customize->add_setting('florapsi_banner_text', array('default' => 'Sua saúde mental importa', 'sanitize_callback' => 'sanitize_textarea_field'));
    $wp_customize->add_control('florapsi_banner_text', array('label' => __('Conteúdo do Texto Principal', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'textarea'));

    $wp_customize->add_setting('florapsi_banner_text_font_family', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_text_font_family', array('label' => __('Fonte do Texto Principal', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_banner_text_font_size', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_font_size', array('label' => __('Tamanho do Texto Principal (px)', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_text_font_weight', array('default' => '100', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_font_weight', array('label' => __('Peso do Texto Principal', 'louize'), 'section' => 'florapsi_banner_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO: Botão CTA - Cores --- */
    $wp_customize->add_section('florapsi_banner_btn_color_section', array(
        'title'    => __('Botão CTA: Cores e Hover', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('florapsi_banner_button_bg_color', array('default' => 'transparent', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_button_bg_color', array('label' => __('Cor de Fundo', 'louize'), 'section' => 'florapsi_banner_btn_color_section')));

    $wp_customize->add_setting('florapsi_banner_button_text_color', array('default' => '#E5CDC0', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_button_text_color', array('label' => __('Cor do Texto', 'louize'), 'section' => 'florapsi_banner_btn_color_section')));

    $wp_customize->add_setting('florapsi_banner_button_hover_bg_color', array('default' => '#E5CDC0', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_button_hover_bg_color', array('label' => __('Cor de Fundo (Hover)', 'louize'), 'section' => 'florapsi_banner_btn_color_section')));

    $wp_customize->add_setting('florapsi_banner_button_hover_text_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_banner_button_hover_text_color', array('label' => __('Cor do Texto (Hover)', 'louize'), 'section' => 'florapsi_banner_btn_color_section')));

    /* --- SUBSEÇÃO: Botão CTA - Texto e Fonte --- */
    $wp_customize->add_section('florapsi_banner_btn_text_section', array(
        'title'    => __('Botão CTA: Texto e Fonte', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 50,
    ));

    $wp_customize->add_setting('florapsi_banner_button_text', array('default' => 'Agendar Consulta', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_button_text', array('label' => __('Texto do Botão', 'louize'), 'section' => 'florapsi_banner_btn_text_section'));

    $wp_customize->add_setting('florapsi_banner_button_url', array('default' => '#', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('florapsi_banner_button_url', array('label' => __('Link do Botão', 'louize'), 'section' => 'florapsi_banner_btn_text_section', 'type' => 'url'));

    $wp_customize->add_setting('florapsi_banner_btn_font_family', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_btn_font_family', array('label' => __('Fonte do Botão', 'louize'), 'section' => 'florapsi_banner_btn_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_banner_btn_font_size', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_font_size', array('label' => __('Tamanho do Botão (px)', 'louize'), 'section' => 'florapsi_banner_btn_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_btn_font_weight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_font_weight', array('label' => __('Peso do Botão', 'louize'), 'section' => 'florapsi_banner_btn_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO: Banner - Responsividade --- */
    $wp_customize->add_section('florapsi_banner_resp_section', array(
        'title'    => __('Banner: Responsividade', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 60,
    ));

    // --- Tablet (992px por padrão) ---
    $wp_customize->add_setting('florapsi_banner_padding_tablet', array('default' => '160', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_padding_tablet', array('label' => __('Padding Top - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_subtitle_fs_tablet', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_fs_tablet', array('label' => __('Subtítulo - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_text_fs_tablet', array('default' => '24', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_fs_tablet', array('label' => __('Texto - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_btn_fs_tablet', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_fs_tablet', array('label' => __('Botão - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));
    
    // --- Mobile (576px por padrão) ---
    $wp_customize->add_setting('florapsi_banner_padding_mobile', array('default' => '130', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_padding_mobile', array('label' => __('Padding Top - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_subtitle_fs_mobile', array('default' => '35', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_fs_mobile', array('label' => __('Subtítulo - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_text_fs_mobile', array('default' => '25', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_fs_mobile', array('label' => __('Texto - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_btn_fs_mobile', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_fs_mobile', array('label' => __('Botão - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
    * PAINEL: SOBRE MIM
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_sobre_panel', array(
        'title'       => __('Sobre Mim', 'florapsi'),
        'description' => __('Configurações de fundo, textos, imagem e responsividade da seção Sobre Mim.', 'florapsi'),
        'priority'    => 35,
    ));

    /* --- SUBSEÇÃO: Fundo --- */
    $wp_customize->add_section('florapsi_sobre_fundo_section', array(
        'title'    => __('Fundo', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_sobre_background_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_sobre_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'florapsi'),
        'section'  => 'florapsi_sobre_fundo_section',
    )));

    /* --- SUBSEÇÃO: Frases - Texto e Fonte --- */
    $wp_customize->add_section('florapsi_sobre_frases_text_section', array(
        'title'    => __('Frases: Texto e Fonte', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 20,
    ));

    // --- Título ---
    $wp_customize->add_setting('florapsi_sobre_titulo_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_sobre_titulo_fontfamily', array('label' => __('Fonte do Título', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_sobre_titulo_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fontsize', array('label' => __('Tamanho do Título (px)', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_titulo_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fontweight', array('label' => __('Peso do Título', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    // --- Subtítulo ---
    $wp_customize->add_setting('florapsi_sobre_subtitulo_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fontfamily', array('label' => __('Fonte do Subtítulo', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fontsize', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fontsize', array('label' => __('Tamanho do Subtítulo (px)', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fontweight', array('label' => __('Peso do Subtítulo', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    // --- Texto Principal ---
    $wp_customize->add_setting('florapsi_sobre_texto_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_sobre_texto_fontfamily', array('label' => __('Fonte do Texto', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_sobre_texto_fontsize', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_texto_fontsize', array('label' => __('Tamanho do Texto (px)', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_texto_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_texto_fontweight', array('label' => __('Peso do Texto', 'florapsi'), 'section' => 'florapsi_sobre_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO: Frases - Cores --- */
    $wp_customize->add_section('florapsi_sobre_frases_color_section', array(
        'title'    => __('Frases: Cores', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_sobre_titulo_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_sobre_titulo_color', array('label' => __('Cor do Título', 'florapsi'), 'section' => 'florapsi_sobre_frases_color_section')));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_sobre_subtitulo_color', array('label' => __('Cor do Subtítulo', 'florapsi'), 'section' => 'florapsi_sobre_frases_color_section')));

    $wp_customize->add_setting('florapsi_sobre_texto_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_sobre_texto_color', array('label' => __('Cor do Texto', 'florapsi'), 'section' => 'florapsi_sobre_frases_color_section')));

    /* --- SUBSEÇÃO: Responsividade Texto --- */
    $wp_customize->add_section('florapsi_sobre_resp_text_section', array(
        'title'    => __('Responsividade: Texto', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 40,
    ));

    // Tablet
    $wp_customize->add_setting('florapsi_sobre_titulo_fs_tablet', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fs_tablet', array('label' => __('Título - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fs_tablet', array('default' => '26', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fs_tablet', array('label' => __('Subtítulo - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_text_fs_tablet', array('default' => '19', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_text_fs_tablet', array('label' => __('Texto - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_sobre_titulo_fs_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fs_mobile', array('label' => __('Título - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fs_mobile', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fs_mobile', array('label' => __('Subtítulo - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_text_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_text_fs_mobile', array('label' => __('Texto - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_text_section', 'type' => 'number'));

    /* --- SUBSEÇÃO: Responsividade Imagem-Layout --- */
    $wp_customize->add_section('florapsi_sobre_resp_layout_section', array(
        'title'    => __('Responsividade: Imagem-Layout', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 50,
    ));

    // Tablet
    $wp_customize->add_setting('florapsi_sobre_img_max_width_tablet', array('default' => '500', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_width_tablet', array('label' => __('Largura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_img_max_height_tablet', array('default' => '500', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_height_tablet', array('label' => __('Altura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_pad_vert_tablet', array('default' => '60', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_vert_tablet', array('label' => __('Padding Vertical - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_sobre_img_max_width_mobile', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_width_mobile', array('label' => __('Largura Max Imagem - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_img_max_height_mobile', array('default' => '100', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_height_mobile', array('label' => __('Altura Max Imagem - Mobile (%)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_pad_vert_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_vert_mobile', array('label' => __('Padding Vertical - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_pad_horiz_mobile', array('default' => '10', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_horiz_mobile', array('label' => __('Padding Horizontal - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_layout_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
    * PAINEL: SERVIÇOS
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_servicos_panel', array(
        'title'       => __('Serviços', 'louize'),
        'description' => __('Configurações de layout, tipografia e cores da seção de Serviços.', 'louize'),
        'priority'    => 103,
    ));

    /* --- SUBSEÇÃO 1: Fundo e Título --- */
    $wp_customize->add_section('florapsi_serv_bg_tit_section', array(
        'title'    => __('Fundo e Título', 'louize'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 10,
    ));

    // --- Fundo ---
    $wp_customize->add_setting('florapsi_servicos_background_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'louize'),
        'section'  => 'florapsi_serv_bg_tit_section',
    )));

    // --- Título Principal ---
    $wp_customize->add_setting('florapsi_servicos_main_title_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_main_title_color', array(
        'label'    => __('Cor do Título', 'louize'),
        'section'  => 'florapsi_serv_bg_tit_section',
    )));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontfamily', array(
        'label'    => __('Fonte do Título', 'louize'),
        'section'  => 'florapsi_serv_bg_tit_section',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontsize', array(
        'label'    => __('Tamanho do Título (px)', 'louize'),
        'section'  => 'florapsi_serv_bg_tit_section',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontweight', array(
        'label'    => __('Peso da Fonte', 'louize'),
        'section'  => 'florapsi_serv_bg_tit_section',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    /* --- SUBSEÇÃO 2: Cards - Textos e Ícone --- */
    $wp_customize->add_section('florapsi_serv_cards_texts_section', array(
        'title'    => __('Cards: Textos e Ícone', 'louize'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 20,
    ));

    // --- Título do Card ---
    $wp_customize->add_setting('florapsi_serv_card_tit_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_serv_card_tit_ff', array(
        'label'    => __('Fonte do Título do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_serv_card_tit_fs', array('default' => '26', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fs', array(
        'label'    => __('Tamanho do Título do Card (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_serv_card_tit_fw', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fw', array(
        'label'    => __('Peso do Título do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    // --- Texto do Card ---
    $wp_customize->add_setting('florapsi_serv_card_txt_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_serv_card_txt_ff', array(
        'label'    => __('Fonte do Texto do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_serv_card_txt_fs', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fs', array(
        'label'    => __('Tamanho do Texto do Card (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_serv_card_txt_fw', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fw', array(
        'label'    => __('Peso do Texto do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    // --- Ícone ---
    $wp_customize->add_setting('florapsi_serv_icon_size', array('default' => '45', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_icon_size', array(
        'label'    => __('Tamanho do Ícone (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_texts_section',
        'type'     => 'number',
    ));

    /* --- SUBSEÇÃO 3: Cards - Cores --- */
    $wp_customize->add_section('florapsi_serv_cards_colors_section', array(
        'title'    => __('Cards: Cores', 'louize'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_serv_card_tit_clr', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_tit_clr', array(
        'label'    => __('Cor do Título do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_colors_section',
    )));

    $wp_customize->add_setting('florapsi_serv_card_txt_clr', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_txt_clr', array(
        'label'    => __('Cor do Texto do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_colors_section',
    )));

    $wp_customize->add_setting('florapsi_servicos_icon_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_icon_color', array(
        'label'    => __('Cor do Ícone', 'louize'),
        'section'  => 'florapsi_serv_cards_colors_section',
    )));

    $wp_customize->add_setting('florapsi_serv_card_bg_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_bg_color', array(
        'label'    => __('Cor de Fundo do Card', 'louize'),
        'section'  => 'florapsi_serv_cards_colors_section',
    )));

    /* --- SUBSEÇÃO 4: Cards - Responsividade --- */
    $wp_customize->add_section('florapsi_serv_cards_resp_section', array(
        'title'    => __('Cards: Responsividade', 'louize'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 40,
    ));

    // --- Largura Desktop ---
    $wp_customize->add_setting('florapsi_serv_card_max_width_desktop', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_max_width_desktop', array(
        'label'    => __('Largura Máxima do Card - Desktop (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    // --- Tamanho Título Seção Mobile ---
    $wp_customize->add_setting('florapsi_servicos_main_title_fontsize_mobile', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontsize_mobile', array(
        'label'    => __('Tam. Título Seção - Mobile (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    // --- Tamanho Título Card Mobile ---
    $wp_customize->add_setting('florapsi_serv_card_tit_fs_mobile', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fs_mobile', array(
        'label'    => __('Tam. Título do Card - Mobile (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    // --- Tamanho Texto Card Mobile ---
    $wp_customize->add_setting('florapsi_serv_card_txt_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fs_mobile', array(
        'label'    => __('Tam. Texto do Card - Mobile (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    // --- Largura Card Mobile ---
    $wp_customize->add_setting('florapsi_serv_card_max_width_mobile', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_max_width_mobile', array(
        'label'    => __('Largura Máxima do Card - Mobile (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    // --- Tamanho Ícone Mobile ---
    $wp_customize->add_setting('florapsi_serv_icon_size_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_icon_size_mobile', array(
        'label'    => __('Tamanho do Ícone - Mobile (px)', 'louize'),
        'section'  => 'florapsi_serv_cards_resp_section',
        'type'     => 'number',
    ));

    /* -------------------------------------------------------------------------
    * PAINEL: MEU PERCURSO
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_percurso_panel', array(
        'title'       => __('Meu Percurso', 'louize'),
        'description' => __('Configurações de layout, tipografia e cores da seção Meu Percurso.', 'louize'),
        'priority'    => 104,
    ));

    /* --- SUBSEÇÃO 1: Layout e Fundo --- */
    $wp_customize->add_section('florapsi_percurso_layout_section', array(
        'title'    => __('Layout e Fundo', 'louize'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 10,
    ));

    // Cor de Fundo
    $wp_customize->add_setting('florapsi_percurso_background_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_bg_color_ctrl', array(
        'label'    => __('Cor de Fundo da Seção', 'louize'),
        'section'  => 'florapsi_percurso_layout_section',
        'settings' => 'florapsi_percurso_background_color',
    )));

    // Padding Mobile
    $wp_customize->add_setting('florapsi_percurso_padding_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_pad_mobile_ctrl', array(
        'label'    => __('Padding Vertical - Mobile (px)', 'louize'),
        'section'  => 'florapsi_percurso_layout_section',
        'settings' => 'florapsi_percurso_padding_mobile',
        'type'     => 'number',
    ));

    /* --- SUBSEÇÃO 2: Conteúdo e Tipografia --- */
    $wp_customize->add_section('florapsi_percurso_typography_section', array(
        'title'    => __('Conteúdo e Tipografia', 'louize'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 20,
    ));

    // --- Título ---
    $wp_customize->add_setting('florapsi_percurso_titulo_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_percurso_tit_ff_ctrl', array(
        'label'    => __('Fonte do Título', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_titulo_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_percurso_titulo_fontsize', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_tit_fs_ctrl', array(
        'label'    => __('Tamanho do Título (px)', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_titulo_fontsize',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_percurso_titulo_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_tit_fw_ctrl', array(
        'label'    => __('Peso do Título', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_titulo_fontweight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    // --- Texto Principal ---
    $wp_customize->add_setting('florapsi_percurso_texto_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_percurso_txt_ff_ctrl', array(
        'label'    => __('Fonte do Texto', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_texto_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_percurso_texto_fontsize', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_txt_fs_ctrl', array(
        'label'    => __('Tamanho do Texto (px)', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_texto_fontsize',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_percurso_texto_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_txt_fw_ctrl', array(
        'label'    => __('Peso do Texto', 'louize'),
        'section'  => 'florapsi_percurso_typography_section',
        'settings' => 'florapsi_percurso_texto_fontweight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    /* --- SUBSEÇÃO 3: Cores e Estilo --- */
    $wp_customize->add_section('florapsi_percurso_style_section', array(
        'title'    => __('Cores e Estilo', 'louize'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_percurso_titulo_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_tit_clr_ctrl', array(
        'label'    => __('Cor do Título', 'louize'),
        'section'  => 'florapsi_percurso_style_section',
        'settings' => 'florapsi_percurso_titulo_color',
    )));

    $wp_customize->add_setting('florapsi_percurso_texto_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_txt_clr_ctrl', array(
        'label'    => __('Cor do Texto', 'louize'),
        'section'  => 'florapsi_percurso_style_section',
        'settings' => 'florapsi_percurso_texto_color',
    )));

    /* --- SUBSEÇÃO 4: Responsividade (Mobile) --- */
    $wp_customize->add_section('florapsi_percurso_mobile_section', array(
        'title'    => __('Responsividade (Mobile)', 'louize'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('florapsi_percurso_titulo_fontsize_mobile', array('default' => '32', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_tit_fs_mob_ctrl', array(
        'label'    => __('Tam. Título - Mobile (px)', 'louize'),
        'section'  => 'florapsi_percurso_mobile_section',
        'settings' => 'florapsi_percurso_titulo_fontsize_mobile',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_percurso_texto_fontsize_mobile', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_txt_fs_mob_ctrl', array(
        'label'    => __('Tam. Texto - Mobile (px)', 'louize'),
        'section'  => 'florapsi_percurso_mobile_section',
        'settings' => 'florapsi_percurso_texto_fontsize_mobile',
        'type'     => 'number',
    ));

    /* -------------------------------------------------------------------------
    * PAINEL: DEPOIMENTOS (FEEDBACK)
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_feedback_panel', array(
        'title'       => __('Depoimentos', 'louize'),
        'description' => __('Configurações de layout, tipografia e estilos da seção de feedbacks.', 'louize'),
        'priority'    => 105,
    ));

    /* --- SUBSEÇÃO 1: Layout e Fundo --- */
    $wp_customize->add_section('florapsi_feedback_layout_section', array(
        'title'    => __('Layout e Fundo', 'louize'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 10,
    ));

    // Cor de Fundo da Seção
    $wp_customize->add_setting('florapsi_feedback_background_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_bg_clr_ctrl', array(
        'label'    => __('Cor de Fundo da Seção', 'louize'),
        'section'  => 'florapsi_feedback_layout_section',
        'settings' => 'florapsi_feedback_background_color',
    )));

    // Estilo do Card
    $wp_customize->add_setting('florapsi_feedback_card_bg_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_card_bg_ctrl', array(
        'label'    => __('Cor de Fundo do Card', 'louize'),
        'section'  => 'florapsi_feedback_layout_section',
        'settings' => 'florapsi_feedback_card_bg_color',
    )));

    // Ícone de Aspas
    $wp_customize->add_setting('florapsi_feedback_quote_icon_color', array('default' => '#A3B899', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_quote_clr_ctrl', array(
        'label'    => __('Cor do Ícone de Aspas', 'louize'),
        'section'  => 'florapsi_feedback_layout_section',
        'settings' => 'florapsi_feedback_quote_icon_color',
    )));

    $wp_customize->add_setting('florapsi_feedback_quote_icon_size', array('default' => '140', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_fb_quote_size_ctrl', array(
        'label'    => __('Tamanho do Ícone de Aspas (px)', 'louize'),
        'section'  => 'florapsi_feedback_layout_section',
        'settings' => 'florapsi_feedback_quote_icon_size',
        'type'     => 'number',
    ));

    // Padding Mobile
    $wp_customize->add_setting('florapsi_feedback_padding_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_fb_pad_mob_ctrl', array(
        'label'    => __('Padding Vertical - Mobile (px)', 'louize'),
        'section'  => 'florapsi_feedback_layout_section',
        'settings' => 'florapsi_feedback_padding_mobile',
        'type'     => 'number',
    ));

    /* --- SUBSEÇÃO 2: Conteúdo e Tipografia --- */
    $wp_customize->add_section('florapsi_feedback_typography_section', array(
        'title'    => __('Conteúdo e Tipografia', 'louize'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 20,
    ));

    // Texto do Título
    $wp_customize->add_setting('florapsi_feedback_main_title', array('default' => 'O que dizem sobre meu Trabalho', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_fb_main_tit_txt_ctrl', array(
        'label'    => __('Título da Seção', 'louize'),
        'section'  => 'florapsi_feedback_typography_section',
        'settings' => 'florapsi_feedback_main_title',
    ));

    // --- Tipografia: Título ---
    $wp_customize->add_setting('florapsi_feedback_title_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_fb_tit_ff_ctrl', array(
        'label'    => __('Fonte do Título', 'louize'),
        'section'  => 'florapsi_feedback_typography_section',
        'settings' => 'florapsi_feedback_title_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_feedback_title_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_fb_tit_fs_ctrl', array(
        'label'    => __('Tamanho do Título (px)', 'louize'),
        'section'  => 'florapsi_feedback_typography_section',
        'settings' => 'florapsi_feedback_title_fontsize',
        'type'     => 'number',
    ));

    // --- Tipografia: Autor ---
    $wp_customize->add_setting('florapsi_feedback_author_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_fb_auth_ff_ctrl', array(
        'label'    => __('Fonte do Autor', 'louize'),
        'section'  => 'florapsi_feedback_typography_section',
        'settings' => 'florapsi_feedback_author_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    // --- Tipografia: Texto do Depoimento ---
    $wp_customize->add_setting('florapsi_feedback_text_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_fb_txt_ff_ctrl', array(
        'label'    => __('Fonte do Depoimento', 'louize'),
        'section'  => 'florapsi_feedback_typography_section',
        'settings' => 'florapsi_feedback_text_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    /* --- SUBSEÇÃO 3: Cores e Estilo --- */
    $wp_customize->add_section('florapsi_feedback_style_section', array(
        'title'    => __('Cores e Estilo', 'louize'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_feedback_title_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_tit_clr_ctrl', array(
        'label'    => __('Cor do Título', 'louize'),
        'section'  => 'florapsi_feedback_style_section',
        'settings' => 'florapsi_feedback_title_color',
    )));

    $wp_customize->add_setting('florapsi_feedback_author_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_auth_clr_ctrl', array(
        'label'    => __('Cor do Autor', 'louize'),
        'section'  => 'florapsi_feedback_style_section',
        'settings' => 'florapsi_feedback_author_color',
    )));

    $wp_customize->add_setting('florapsi_feedback_text_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_txt_clr_ctrl', array(
        'label'    => __('Cor do Depoimento', 'louize'),
        'section'  => 'florapsi_feedback_style_section',
        'settings' => 'florapsi_feedback_text_color',
    )));

    $wp_customize->add_setting('florapsi_feedback_readmore_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_fb_rdmr_clr_ctrl', array(
        'label'    => __('Cor do "Ler Mais"', 'louize'),
        'section'  => 'florapsi_feedback_style_section',
        'settings' => 'florapsi_feedback_readmore_color',
    )));

    /* --- SUBSEÇÃO 4: Responsividade (Mobile) --- */
    $wp_customize->add_section('florapsi_feedback_mobile_section', array(
        'title'    => __('Responsividade (Mobile)', 'louize'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('florapsi_feedback_title_fontsize_mobile', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_fb_tit_fs_mob_ctrl', array(
        'label'    => __('Tam. Título - Mobile (px)', 'louize'),
        'section'  => 'florapsi_feedback_mobile_section',
        'settings' => 'florapsi_feedback_title_fontsize_mobile',
        'type'     => 'number',
    ));

    /* -------------------------------------------------------------------------
    * PAINEL: DÚVIDAS FREQUENTES
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_duvidas_panel', array(
        'title'       => __('Dúvidas Frequentes', 'louize'),
        'description' => __('Configurações de layout, tipografia e cores da seção de Dúvidas Frequentes (FAQ).', 'louize'),
        'priority'    => 106,
    ));

    /* --- SUBSEÇÃO 1: Layout e Fundo --- */
    $wp_customize->add_section('florapsi_duvidas_layout_section', array(
        'title'    => __('Layout e Fundo', 'louize'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 10,
    ));

    // Cor de Fundo da Seção
    $wp_customize->add_setting('florapsi_duvidas_background_color', array('default' => '#E8B1B1', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duv_bg_clr_ctrl', array(
        'label'    => __('Cor de Fundo da Seção', 'louize'),
        'section'  => 'florapsi_duvidas_layout_section',
        'settings' => 'florapsi_duvidas_background_color',
    )));

    // Padding Mobile
    $wp_customize->add_setting('florapsi_duvidas_padding_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_pad_mob_ctrl', array(
        'label'    => __('Padding Vertical - Mobile (px)', 'louize'),
        'section'  => 'florapsi_duvidas_layout_section',
        'settings' => 'florapsi_duvidas_padding_mobile',
        'type'     => 'number',
    ));

    /* --- SUBSEÇÃO 2: Conteúdo e Tipografia --- */
    $wp_customize->add_section('florapsi_duvidas_typography_section', array(
        'title'    => __('Conteúdo e Tipografia', 'louize'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 20,
    ));

    // --- Tipografia: Título ---
    $wp_customize->add_setting('florapsi_duvidas_titulo_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_tit_fs_ctrl', array(
        'label'    => __('Tamanho do Título (px)', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_titulo_fontsize',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_tit_fw_ctrl', array(
        'label'    => __('Peso do Título', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_titulo_fontweight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    // --- Tipografia: Pergunta ---
    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_duv_perg_ff_ctrl', array(
        'label'    => __('Fonte da Pergunta', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_pergunta_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontsize', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_perg_fs_ctrl', array(
        'label'    => __('Tamanho da Pergunta (px)', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_pergunta_fontsize',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontweight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_perg_fw_ctrl', array(
        'label'    => __('Peso da Pergunta', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_pergunta_fontweight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    // --- Tipografia: Resposta ---
    $wp_customize->add_setting('florapsi_duvidas_resposta_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_duv_resp_ff_ctrl', array(
        'label'    => __('Fonte da Resposta', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_resposta_fontfamily',
        'type'     => 'select',
        'choices'  => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontsize', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_resp_fs_ctrl', array(
        'label'    => __('Tamanho da Resposta (px)', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_resposta_fontsize',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_resp_fw_ctrl', array(
        'label'    => __('Peso da Resposta', 'louize'),
        'section'  => 'florapsi_duvidas_typography_section',
        'settings' => 'florapsi_duvidas_pergunta_fontweight',
        'type'     => 'select',
        'choices'  => $font_weight_choices,
    ));

    /* --- SUBSEÇÃO 3: Cores e Estilo --- */
    $wp_customize->add_section('florapsi_duvidas_style_section', array(
        'title'    => __('Cores e Estilo', 'louize'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_duvidas_titulo_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duv_tit_clr_ctrl', array(
        'label'    => __('Cor do Título Principal', 'louize'),
        'section'  => 'florapsi_duvidas_style_section',
        'settings' => 'florapsi_duvidas_titulo_color',
    )));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duv_perg_clr_ctrl', array(
        'label'    => __('Cor da Pergunta', 'louize'),
        'section'  => 'florapsi_duvidas_style_section',
        'settings' => 'florapsi_duvidas_pergunta_color',
    )));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_hover_color', array('default' => '#E8B1B1', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duv_perg_hvr_clr_ctrl', array(
        'label'    => __('Cor do Hover da Pergunta', 'louize'),
        'section'  => 'florapsi_duvidas_style_section',
        'settings' => 'florapsi_duvidas_pergunta_hover_color',
    )));

    $wp_customize->add_setting('florapsi_duvidas_resposta_color', array('default' => '#333333', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duv_resp_clr_ctrl', array(
        'label'    => __('Cor da Resposta', 'louize'),
        'section'  => 'florapsi_duvidas_style_section',
        'settings' => 'florapsi_duvidas_resposta_color',
    )));

    /* --- SUBSEÇÃO 4: Responsividade (Mobile) --- */
    $wp_customize->add_section('florapsi_duvidas_mobile_section', array(
        'title'    => __('Responsividade (Mobile)', 'louize'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fontsize_mobile', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_tit_fs_mob_ctrl', array(
        'label'    => __('Tam. Título - Mobile (px)', 'louize'),
        'section'  => 'florapsi_duvidas_mobile_section',
        'settings' => 'florapsi_duvidas_titulo_fontsize_mobile',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontsize_mobile', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_perg_fs_mob_ctrl', array(
        'label'    => __('Tam. Pergunta - Mobile (px)', 'louize'),
        'section'  => 'florapsi_duvidas_mobile_section',
        'settings' => 'florapsi_duvidas_pergunta_fontsize_mobile',
        'type'     => 'number',
    ));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontsize_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duv_resp_fs_mob_ctrl', array(
        'label'    => __('Tam. Resposta - Mobile (px)', 'louize'),
        'section'  => 'florapsi_duvidas_mobile_section',
        'settings' => 'florapsi_duvidas_resposta_fontsize_mobile',
        'type'     => 'number',
    ));
    /* -------------------------------------------------------------------------
     * SEÇÃO: CONTATO
     * ------------------------------------------------------------------------- */
    $wp_customize->add_section('florapsi_contato_section', array(
        'title'    => __('Contato', 'louize'),
        'priority' => 107,
    ));

    // Títulos
    $wp_customize->add_setting('florapsi_contato_insta_title', array('default' => 'Acompanhe nas redes', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contato_insta_title_control', array(
        'label' => __('Título: Coluna Instagram', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_contato_insta_title',
    ));

    $wp_customize->add_setting('florapsi_contato_cta_title', array('default' => 'Vamos conversar?', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contato_cta_title_control', array(
        'label' => __('Título: Coluna Convite', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_contato_cta_title',
    ));

    // Conteúdo Instagram
    $wp_customize->add_setting('florapsi_instagram_text', array('default' => 'Conheça mais sobre meu trabalho.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_instagram_text_control', array(
        'label' => __('Texto da Coluna Instagram', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_instagram_text', 'type' => 'textarea',
    ));

    $wp_customize->add_setting('florapsi_instagram_handle', array('default' => '@perfil', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_instagram_handle_control', array(
        'label' => __('Nome de Usuário (@)', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_instagram_handle',
    ));

    $wp_customize->add_setting('florapsi_instagram_url', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('florapsi_instagram_url_control', array(
        'label' => __('Link do Instagram (URL)', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_instagram_url', 'type' => 'url',
    ));

    // --- Estilos da Seção de Contato ---
    $wp_customize->add_setting('florapsi_contato_background_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contato_background_color_control', array(
        'label' => __('Cor de Fundo da Seção', 'louize'), 'section' => 'florapsi_contato_section', 'settings' => 'florapsi_contato_background_color',
    )));

    // =========================================================================
    // Adicionando Títulos Editáveis às Secções Existentes
    // =========================================================================
    
    // Título da Secção de Depoimentos
    $wp_customize->add_setting('florapsi_feedback_main_title', array('default' => 'O que dizem sobre meu Trabalho', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_feedback_main_title_control', array(
        'label' => __('Título da Secção de Depoimentos', 'louize'),
        'section' => 'florapsi_feedback_section',
    ));

    // Título da Coluna Instagram
    $wp_customize->add_setting('florapsi_contato_insta_title', array('default' => 'Acompanhe nas redes', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contato_insta_title_control', array(
        'label' => __('Título da Coluna Instagram', 'louize'),
        'section' => 'florapsi_contato_section',
    ));

    // Título da Coluna "Vamos Conversar"
    $wp_customize->add_setting('florapsi_contato_cta_title', array('default' => 'Vamos conversar?', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contato_cta_title_control', array(
        'label' => __('Título do Convite de Contacto', 'louize'),
        'section' => 'florapsi_contato_section',
    ));

    // =========================================================================
    // PAINEL DO RODAPÉ (Agrupa todas as subseções de rodapé e legal)
    // =========================================================================
    $wp_customize->add_panel('florapsi_footer_panel', array(
        'title'       => __('Rodapé e Legal', 'louize'),
        'description' => __('Configurações de conteúdo, estilo do rodapé e avisos de privacidade.', 'louize'),
        'priority'    => 108,
    ));

    // =========================================================================
    // SUBSEÇÃO 1: Conteúdo e Estilo do Rodapé
    // =========================================================================
    $wp_customize->add_section('florapsi_footer_content_section', array(
        'title'    => __('Conteúdo e Estilo Geral', 'louize'),
        'panel'    => 'florapsi_footer_panel',
        'priority' => 10,
    ));

    // --- Identificação e Copyright ---
    $wp_customize->add_setting('florapsi_footer_identification_text', array('default' => 'Nome do Profissional | Cargo - Registro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_footer_id_text_ctrl', array(
        'label'    => __('Texto de Identificação', 'louize'),
        'section'  => 'florapsi_footer_content_section',
        'settings' => 'florapsi_footer_identification_text',
    ));

    $wp_customize->add_setting('florapsi_footer_copyright_text', array('default' => 'Todos os direitos reservados.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_footer_copy_text_ctrl', array(
        'label'    => __('Texto de Copyright', 'louize'),
        'section'  => 'florapsi_footer_content_section',
        'settings' => 'florapsi_footer_copyright_text',
    ));

    $wp_customize->add_setting('florapsi_footer_background_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_footer_bg_color_ctrl', array(
        'label' => __('Cor de Fundo', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_background_color',
    )));

    $wp_customize->add_setting('florapsi_footer_text_color', array('default' => '#E5CDC0', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_footer_text_color_ctrl', array(
        'label' => __('Cor do Texto', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_text_color',
    )));

    $wp_customize->add_setting('florapsi_footer_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_footer_ff_ctrl', array(
        'label' => __('Família da Fonte', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_fontfamily', 'type' => 'select', 'choices' => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_footer_fontsize', array('default' => '15', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_footer_fs_ctrl', array(
        'label' => __('Tamanho da Fonte (px)', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_fontsize', 'type' => 'number',
    ));

    $wp_customize->add_setting('florapsi_footer_identification_fontweight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_footer_fw_ctrl', array(
        'label' => __('Peso da Fonte (Identificação)', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_identification_fontweight', 'type' => 'select', 'choices' => $font_weight_choices,
    ));

    $wp_customize->add_setting('florapsi_footer_padding', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_footer_pad_ctrl', array(
        'label' => __('Padding Vertical (px)', 'louize'), 'section' => 'florapsi_footer_content_section', 'settings' => 'florapsi_footer_padding', 'type' => 'number',
    ));


    // Subseção: Modal Legal
    $wp_customize->add_section('florapsi_footer_modal_section', array(
        'title'    => __('Modal Legal e Privacidade', 'louize'),
        'panel'    => 'florapsi_footer_panel',
        'priority' => 20,
    ));

    $wp_customize->add_setting('florapsi_footer_legal_link_text', array('default' => 'Informações Legais e Privacidade', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_footer_legal_link_ctrl', array(
        'label'    => __('Texto do Link no Rodapé', 'louize'),
        'section'  => 'florapsi_footer_modal_section',
        'settings' => 'florapsi_footer_legal_link_text',
    ));

    $wp_customize->add_setting('florapsi_footer_legal_notice', array('default' => '', 'sanitize_callback' => 'sanitize_textarea_field'));
    $wp_customize->add_control('florapsi_footer_legal_notice_ctrl', array(
        'label'    => __('Conteúdo das Informações Legais', 'louize'),
        'section'  => 'florapsi_footer_modal_section',
        'settings' => 'florapsi_footer_legal_notice',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('florapsi_modal_bg_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_modal_bg_ctrl', array(
        'label' => __('Cor de Fundo da Janela', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_bg_color',
    )));

    $wp_customize->add_setting('florapsi_modal_line_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_modal_line_ctrl', array(
        'label' => __('Cor da Linha Divisória', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_line_color',
    )));

    $wp_customize->add_setting('florapsi_modal_close_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_modal_close_ctrl', array(
        'label' => __('Cor do Botão Fechar (X)', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_close_color',
    )));

    $wp_customize->add_setting('florapsi_modal_title_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_modal_title_color_ctrl', array(
        'label' => __('Cor do Título', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_title_color',
    )));

    $wp_customize->add_setting('florapsi_modal_title_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_modal_title_ff_ctrl', array(
        'label'   => __('Fonte do Título', 'louize'),
        'section' => 'florapsi_footer_modal_section',
        'settings'=> 'florapsi_modal_title_fontfamily',
        'type'    => 'select',
        'choices' => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_modal_title_fontsize', array('default' => '28', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_modal_title_fs_ctrl', array(
        'label' => __('Tamanho do Título (px)', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_title_fontsize', 'type' => 'number',
    ));

    $wp_customize->add_setting('florapsi_modal_body_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_modal_body_color_ctrl', array(
        'label' => __('Cor do Texto', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_body_color',
    )));

    $wp_customize->add_setting('florapsi_modal_body_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_modal_body_ff_ctrl', array(
        'label'   => __('Fonte do Texto', 'louize'),
        'section' => 'florapsi_footer_modal_section',
        'settings'=> 'florapsi_modal_body_fontfamily',
        'type'    => 'select',
        'choices' => $font_family_choices,
    ));

    $wp_customize->add_setting('florapsi_modal_body_fontsize', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_modal_body_fs_ctrl', array(
        'label' => __('Tamanho do Texto (px)', 'louize'), 'section' => 'florapsi_footer_modal_section', 'settings' => 'florapsi_modal_body_fontsize', 'type' => 'number',
    ));

    $wp_customize->add_setting('florapsi_modal_body_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_modal_body_fw_ctrl', array(
        'label'   => __('Peso da Fonte', 'louize'),
        'section' => 'florapsi_footer_modal_section',
        'settings'=> 'florapsi_modal_body_fontweight',
        'type'    => 'select',
        'choices' => $font_weight_choices,
    ));

    /* -------------------------------------------------------------------------
     * BOTÃO FLUTUANTE (WHATSAPP)
     * ------------------------------------------------------------------------- */
    $wp_customize->add_section('florapsi_whatsapp_section', array(
        'title'    => __('Botão Flutuante (WhatsApp)', 'louize'),
        'priority' => 109,
    ));

    $wp_customize->add_setting('florapsi_whatsapp_link', array(
        'default'   => 'https://wa.me/seu-numer',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('florapsi_whatsapp_link_control', array(
        'label'      => __('Link de Redirecionamento', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_link',
        'type'       => 'url',
    ));

    $wp_customize->add_setting('florapsi_whatsapp_bg_color', array(
        'default'   => '#A3B899',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_whatsapp_bg_color_control', array(
        'label'      => __('Cor de Fundo do Botão', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_bg_color',
    )));
    
    $wp_customize->add_setting('florapsi_whatsapp_icon_color', array(
        'default'   => '#E5CDC0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_whatsapp_icon_color_control', array(
        'label'      => __('Cor do Ícone', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_icon_color',
    )));
    
    $wp_customize->add_setting('florapsi_whatsapp_size', array(
        'default'   => '60',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('florapsi_whatsapp_size_control', array(
        'label'      => __('Tamanho do Botão (px)', 'louize'),
        'description' => __('Define a largura e altura do botão.', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_size',
        'type'       => 'number',
    ));

    $wp_customize->add_setting('florapsi_whatsapp_position_bottom', array(
        'default'   => '50',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('florapsi_whatsapp_position_bottom_control', array(
        'label'      => __('Distância do Fundo (px)', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_position_bottom',
        'type'       => 'number',
    ));

    $wp_customize->add_setting('florapsi_whatsapp_position_right', array(
        'default'   => '50',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('florapsi_whatsapp_position_right_control', array(
        'label'      => __('Distância da Direita (px)', 'louize'),
        'section'    => 'florapsi_whatsapp_section',
        'settings'   => 'florapsi_whatsapp_position_right',
        'type'       => 'number',
    ));

}
add_action('customize_register', 'florapsi_customize_register');

/**
 * Adiciona o CSS dinâmico do Personalizador ao <head>.
 */
function florapsi_dynamic_css() {
    $tablet_bp = get_theme_mod('florapsi_tablet_breakpoint', '1176');
    $mobile_bp = get_theme_mod('florapsi_mobile_breakpoint', '576');
    ?>
    <style type="text/css">
        <?php
        /* -------------------------------------------------------------------------
         * ESTILOS GERAIS E DESKTOP
         * ------------------------------------------------------------------------- */
        
        // Navbar
        $navbar_bg_color = get_theme_mod('florapsi_navbar_background_color', '#9B545A');
        if ($navbar_bg_color !== '#9B545A') {
            echo ".navbar { background-color: " . esc_attr($navbar_bg_color) . "; }";
        }

        $menu_color = get_theme_mod('florapsi_menu_font_color', '#FFFFFF');
        if ($menu_color !== '#FFFFFF') {
            echo ".navbar-menu-list a { color: " . esc_attr($menu_color) . "; }";
        }
        $menu_ff = get_theme_mod('florapsi_menu_font_family', 'Segoe UI Light');
        if ($menu_ff !== 'Segoe UI Light') {
            echo ".navbar-menu-list a { font-family: '" . esc_attr($menu_ff) . "', sans-serif; }";
        }
        $menu_fs = get_theme_mod('florapsi_menu_font_size', '20');
        if ($menu_fs !== '20') {
            echo ".navbar-menu-list a { font-size: " . esc_attr($menu_fs) . "px; }";
        }
        $menu_fw = get_theme_mod('florapsi_menu_font_weight', '300');
        if ($menu_fw !== '300') {
            echo ".navbar-menu-list a { font-weight: " . esc_attr($menu_fw) . "; }";
        }

       // Banner (Desktop)
        $banner_bg_color = get_theme_mod('florapsi_banner_bg_color', '#5A6E59');
        echo ".banner { background-color: " . esc_attr($banner_bg_color) . "; }";

        echo ".banner .banner-subtitle {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_color', '#E5CDC0')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_banner_subtitle_font_family', 'Tan Mon Cheri')) . "', serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_font_size', '80')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_font_weight', '400')) . ";";
        echo "}";

        echo ".banner .banner-text {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_banner_text_color', '#E5CDC0')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_banner_text_font_family', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_banner_text_font_size', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_banner_text_font_weight', '100')) . ";";
        echo "}";

        $btn_bg = get_theme_mod('florapsi_banner_button_bg_color', 'transparent');
        $btn_txt = get_theme_mod('florapsi_banner_button_text_color', '#E5CDC0');
        $btn_hvr_bg = get_theme_mod('florapsi_banner_button_hover_bg_color', '#E5CDC0');
        $btn_hvr_txt = get_theme_mod('florapsi_banner_button_hover_text_color', '#5A6E59');

        echo ".banner-button {";
        echo " background-color: " . esc_attr($btn_bg) . ";";
        echo " color: " . esc_attr($btn_txt) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_banner_btn_font_family', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_banner_btn_font_size', '30')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_banner_btn_font_weight', '600')) . ";";
        echo "}";

        echo ".banner-button span[class^=border-] { background-color: " . esc_attr($btn_txt) . "; }";

        echo ".banner-button:hover {";
        echo " background-color: " . esc_attr($btn_hvr_bg) . " !important;";
        echo " color: " . esc_attr($btn_hvr_txt) . " !important;";
        echo "}";

        // Sobre Mim (Desktop)
        $sobre_bg = get_theme_mod('florapsi_sobre_background_color', '#F8F0E3');
        echo ".sobre-mim { background-color: " . esc_attr($sobre_bg) . "; }";
        
        echo ".sobre-mim .sobre-mim-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_sobre_titulo_fontfamily', 'Tan Mon Cheri')) . "', serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fontsize', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fontweight', '400')) . ";";
        echo "}";

        echo ".sobre-mim .sobre-mim-subtitle {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fontfamily', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fontsize', '30')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fontweight', '300')) . ";";
        echo "}";

        echo ".sobre-mim .sobre-mim-text, .sobre-mim .sobre-mim-text p {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_sobre_texto_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_sobre_texto_fontfamily', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_sobre_texto_fontsize', '20')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_sobre_texto_fontweight', '300')) . ";";
        echo "}";

        // Meu Percurso
        $percurso_bg_color = get_theme_mod('florapsi_percurso_background_color', '#FFFFFF');
        if ($percurso_bg_color !== '#FFFFFF') { echo ".percurso { background-color: " . esc_attr($percurso_bg_color) . "; }"; }
        
        $percurso_titulo_ff = get_theme_mod('florapsi_percurso_titulo_fontfamily', 'Tan Mon Cheri');
        if ($percurso_titulo_ff !== 'Tan Mon Cheri') { echo ".percurso .percurso-title { font-family: '" . esc_attr($percurso_titulo_ff) . "', sans-serif; }"; }
        $percurso_titulo_fs = get_theme_mod('florapsi_percurso_titulo_fontsize', '40');
        if ($percurso_titulo_fs !== '40') { echo ".percurso .percurso-title { font-size: " . esc_attr($percurso_titulo_fs) . "px; }"; }
        $percurso_titulo_fw = get_theme_mod('florapsi_percurso_titulo_fontweight', '400');
        if ($percurso_titulo_fw !== '400') { echo ".percurso .percurso-title { font-weight: " . esc_attr($percurso_titulo_fw) . "; }"; }
        $percurso_titulo_color = get_theme_mod('florapsi_percurso_titulo_color', '#5A6E59');
        if ($percurso_titulo_color !== '#5A6E59') { echo ".percurso .percurso-title { color: " . esc_attr($percurso_titulo_color) . "; }"; }
        
        $percurso_texto_ff = get_theme_mod('florapsi_percurso_texto_fontfamily', 'Sofia Pro');
        if ($percurso_texto_ff !== 'Sofia Pro') { echo ".percurso .percurso-text, .percurso .percurso-text p { font-family: '" . esc_attr($percurso_texto_ff) . "', sans-serif; }"; }
        $percurso_texto_fs = get_theme_mod('florapsi_percurso_texto_fontsize', '22');
        if ($percurso_texto_fs !== '22') { echo ".percurso .percurso-text, .percurso .percurso-text p { font-size: " . esc_attr($percurso_texto_fs) . "px; }"; }
        $percurso_texto_fw = get_theme_mod('florapsi_percurso_texto_fontweight', '300');
        if ($percurso_texto_fw !== '300') { echo ".percurso .percurso-text, .percurso .percurso-text p { font-weight: " . esc_attr($percurso_texto_fw) . "; }"; }
        $percurso_texto_color = get_theme_mod('florapsi_percurso_texto_color', '#5A6E59');
        if ($percurso_texto_color !== '#5A6E59') { echo ".percurso .percurso-text, .percurso .percurso-text p { color: " . esc_attr($percurso_texto_color) . "; }"; }

        // Serviços (Desktop)
        $servicos_bg_color = get_theme_mod('florapsi_servicos_background_color', '#5A6E59');
        echo ".servico { background-color: " . esc_attr($servicos_bg_color) . "; }";
        
        echo ".servico .servico-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_color', '#F8F0E3')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontfamily', 'Tan Mon Cheri')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontsize', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontweight', '400')) . ";";
        echo "}";

        echo ".servico-card {";
        echo " background-color: " . esc_attr(get_theme_mod('florapsi_serv_card_bg_color', '#FFFFFF')) . ";";
        echo " max-width: " . esc_attr(get_theme_mod('florapsi_serv_card_max_width_desktop', '400')) . "px;";
        echo "}";

        echo ".servico .servico-icon i {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_servicos_icon_color', '#9B545A')) . ";";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_serv_icon_size', '45')) . "px;";
        echo "}";

        echo ".servico .servico-card-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_clr', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_serv_card_tit_ff', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_fs', '26')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_fw', '600')) . ";";
        echo "}";

        echo ".servico .servico-card-text {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_clr', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_serv_card_txt_ff', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_fs', '18')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_fw', '300')) . ";";
        echo "}";

        // Depoimentos
        $feedback_bg_color = get_theme_mod('florapsi_feedback_background_color', '#F8F0E3');
        if ($feedback_bg_color !== '#F8F0E3') { echo ".feedback { background-color: " . esc_attr($feedback_bg_color) . "; }"; }
        
        $feedback_title_ff = get_theme_mod('florapsi_feedback_title_fontfamily', 'Tan Mon Cheri');
        if ($feedback_title_ff !== 'Tan Mon Cheri') { echo ".feedback .feedback-title { font-family: '" . esc_attr($feedback_title_ff) . "', sans-serif; }"; }
        $feedback_title_fs = get_theme_mod('florapsi_feedback_title_fontsize', '50');
        if ($feedback_title_fs !== '50') { echo ".feedback .feedback-title { font-size: " . esc_attr($feedback_title_fs) . "px; }"; }
        $feedback_title_fw = get_theme_mod('florapsi_feedback_title_fontweight', '400');
        if ($feedback_title_fw !== '400') { echo ".feedback .feedback-title { font-weight: " . esc_attr($feedback_title_fw) . "; }"; }
        $feedback_title_color = get_theme_mod('florapsi_feedback_title_color', '#5A6E59');
        if ($feedback_title_color !== '#5A6E59') { echo ".feedback .feedback-title { color: " . esc_attr($feedback_title_color) . "; }"; }
        
        $feedback_card_bg_color = get_theme_mod('florapsi_feedback_card_bg_color', '#FFFFFF');
        if ($feedback_card_bg_color !== '#FFFFFF') { echo "#meus-depoimentos-customizados .ti-review-item > .ti-inner { background-color: " . esc_attr($feedback_card_bg_color) . " !important; }"; }
        $feedback_quote_color = get_theme_mod('florapsi_feedback_quote_icon_color', '#A3B899');
        if ($feedback_quote_color !== '#A3B899') { echo "#meus-depoimentos-customizados .ti-review-item > .ti-inner::before { color: " . esc_attr($feedback_quote_color) . " !important; }"; }
        $feedback_quote_size = get_theme_mod('florapsi_feedback_quote_icon_size', '140');
        if ($feedback_quote_size !== '140') { echo "#meus-depoimentos-customizados .ti-review-item > .ti-inner::before { font-size: " . esc_attr($feedback_quote_size) . "px !important; }"; }
        
        $feedback_author_ff = get_theme_mod('florapsi_feedback_author_fontfamily', 'Sofia Pro');
        if ($feedback_author_ff !== 'Sofia Pro') { echo "#meus-depoimentos-customizados .ti-name { font-family: '" . esc_attr($feedback_author_ff) . "', sans-serif !important; }"; }
        $feedback_author_fs = get_theme_mod('florapsi_feedback_author_fontsize', '16');
        if ($feedback_author_fs !== '16') { echo "#meus-depoimentos-customizados .ti-name { font-size: " . esc_attr($feedback_author_fs) . "px !important; }"; }
        $feedback_author_fw = get_theme_mod('florapsi_feedback_author_fontweight', '600');
        if ($feedback_author_fw !== '600') { echo "#meus-depoimentos-customizados .ti-name { font-weight: " . esc_attr($feedback_author_fw) . " !important; }"; }
        $feedback_author_color = get_theme_mod('florapsi_feedback_author_color', '#5A6E59');
        if ($feedback_author_color !== '#5A6E59') { echo "#meus-depoimentos-customizados .ti-name { color: " . esc_attr($feedback_author_color) . " !important; }"; }
        
        $feedback_text_ff = get_theme_mod('florapsi_feedback_text_fontfamily', 'Sofia Pro');
        if ($feedback_text_ff !== 'Sofia Pro') { echo "#meus-depoimentos-customizados .ti-review-content { font-family: '" . esc_attr($feedback_text_ff) . "', sans-serif !important; }"; }
        $feedback_text_fs = get_theme_mod('florapsi_feedback_text_fontsize', '18');
        if ($feedback_text_fs !== '18') { echo "#meus-depoimentos-customizados .ti-review-content { font-size: " . esc_attr($feedback_text_fs) . "px !important; }"; }
        $feedback_text_fw = get_theme_mod('florapsi_feedback_text_fontweight', '300');
        if ($feedback_text_fw !== '300') { echo "#meus-depoimentos-customizados .ti-review-content { font-weight: " . esc_attr($feedback_text_fw) . " !important; }"; }
        $feedback_text_color = get_theme_mod('florapsi_feedback_text_color', '#5A6E59');
        if ($feedback_text_color !== '#5A6E59') { echo "#meus-depoimentos-customizados .ti-review-content { color: " . esc_attr($feedback_text_color) . " !important; }"; }
        
        $feedback_readmore_ff = get_theme_mod('florapsi_feedback_readmore_fontfamily', 'Sofia Pro');
        if ($feedback_readmore_ff !== 'Sofia Pro') { echo "#meus-depoimentos-customizados .ti-read-more span { font-family: '" . esc_attr($feedback_readmore_ff) . "', sans-serif !important; }"; }
        $feedback_readmore_fs = get_theme_mod('florapsi_feedback_readmore_fontsize', '14');
        if ($feedback_readmore_fs !== '14') { echo "#meus-depoimentos-customizados .ti-read-more span { font-size: " . esc_attr($feedback_readmore_fs) . "px !important; }"; }
        $feedback_readmore_fw = get_theme_mod('florapsi_feedback_readmore_fontweight', '600');
        if ($feedback_readmore_fw !== '600') { echo "#meus-depoimentos-customizados .ti-read-more span { font-weight: " . esc_attr($feedback_readmore_fw) . " !important; }"; }
        $feedback_readmore_color = get_theme_mod('florapsi_feedback_readmore_color', '#5A6E59');
        if ($feedback_readmore_color !== '#5A6E59') { echo "#meus-depoimentos-customizados .ti-read-more span { color: " . esc_attr($feedback_readmore_color) . " !important; }"; }


        /* --- Estilos Desktop para a Seção "Dúvidas Frequentes" --- */
        $duvidas_bg_color = get_theme_mod('florapsi_duvidas_background_color', '#E8B1B1');
        if ($duvidas_bg_color !== '#E8B1B1') { echo ".duvidas { background-color: " . esc_attr($duvidas_bg_color) . "; }"; }
        // Título
        $duvidas_titulo_fs = get_theme_mod('florapsi_duvidas_titulo_fontsize', '50');
        if ($duvidas_titulo_fs !== '50') { echo ".duvidas .duvidas-title { font-size: " . esc_attr($duvidas_titulo_fs) . "px; }"; }
        $duvidas_titulo_fw = get_theme_mod('florapsi_duvidas_titulo_fontweight', '400');
        if ($duvidas_titulo_fw !== '400') { echo ".duvidas .duvidas-title { font-weight: " . esc_attr($duvidas_titulo_fw) . "; }"; }
        $duvidas_titulo_color = get_theme_mod('florapsi_duvidas_titulo_color', '#FFFFFF');
        if ($duvidas_titulo_color !== '#FFFFFF') { echo ".duvidas .duvidas-title { color: " . esc_attr($duvidas_titulo_color) . "; }"; }
        // Pergunta
        $duvidas_pergunta_ff = get_theme_mod('florapsi_duvidas_pergunta_fontfamily', 'Sofia Pro');
        if ($duvidas_pergunta_ff !== 'Sofia Pro') { echo ".duvidas .duvidas-question, .duvidas .duvidas-question span { font-family: '" . esc_attr($duvidas_pergunta_ff) . "', sans-serif; }"; }
        $duvidas_pergunta_fs = get_theme_mod('florapsi_duvidas_pergunta_fontsize', '20');
        if ($duvidas_pergunta_fs !== '20') { echo ".duvidas .duvidas-question { font-size: " . esc_attr($duvidas_pergunta_fs) . "px; }"; }
        $duvidas_pergunta_fw = get_theme_mod('florapsi_duvidas_pergunta_fontweight', '600');
        if ($duvidas_pergunta_fw !== '600') { echo ".duvidas .duvidas-question { font-weight: " . esc_attr($duvidas_pergunta_fw) . "; }"; }
        $duvidas_pergunta_color = get_theme_mod('florapsi_duvidas_pergunta_color', '#9B545A');
        if ($duvidas_pergunta_color !== '#9B545A') { echo ".duvidas .duvidas-question { color: " . esc_attr($duvidas_pergunta_color) . "; }"; }
        $duvidas_pergunta_hover_color = get_theme_mod('florapsi_duvidas_pergunta_hover_color', '#E8B1B1');
        if ($duvidas_pergunta_hover_color !== '#E8B1B1') { echo ".duvidas .duvidas-question:hover span { color: " . esc_attr($duvidas_pergunta_hover_color) . "; }"; }
        
        $duvidas_resposta_ff = get_theme_mod('florapsi_duvidas_resposta_fontfamily', 'Sofia Pro');
        if ($duvidas_resposta_ff !== 'Sofia Pro') { echo ".duvidas .duvidas-answer { font-family: '" . esc_attr($duvidas_resposta_ff) . "', sans-serif; }"; }
        $duvidas_resposta_fs = get_theme_mod('florapsi_duvidas_resposta_fontsize', '18');
        if ($duvidas_resposta_fs !== '18') { echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { font-size: " . esc_attr($duvidas_resposta_fs) . "px; }"; }
        $duvidas_resposta_fw = get_theme_mod('florapsi_duvidas_resposta_fontweight', '300');
        if ($duvidas_resposta_fw !== '300') { echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { font-weight: " . esc_attr($duvidas_resposta_fw) . "; }"; }
        $duvidas_resposta_color = get_theme_mod('florapsi_duvidas_resposta_color', '#333333');
        if ($duvidas_resposta_color !== '#333333') { echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { color: " . esc_attr($duvidas_resposta_color) . "; }"; }

        // Contato
        $contato_bg_color = get_theme_mod('florapsi_contato_background_color', '#FFFFFF');
        if ($contato_bg_color !== '#FFFFFF') { echo ".contato { background-color: " . esc_attr($contato_bg_color) . "; }"; }
        
        $contato_title_ff = get_theme_mod('florapsi_contato_title_fontfamily', 'Tan Mon Cheri');
        if ($contato_title_ff !== 'Tan Mon Cheri') { echo ".contato .contato-title { font-family: '" . esc_attr($contato_title_ff) . "', sans-serif; }"; }
        $contato_title_fs = get_theme_mod('florapsi_contato_title_fontsize', '45');
        if ($contato_title_fs !== '45') { echo ".contato .contato-title { font-size: " . esc_attr($contato_title_fs) . "px; }"; }
        $contato_title_fw = get_theme_mod('florapsi_contato_title_fontweight', '400');
        if ($contato_title_fw !== '400') { echo ".contato .contato-title { font-weight: " . esc_attr($contato_title_fw) . "; }"; }
        $contato_title_color = get_theme_mod('florapsi_contato_title_color', '#5A6E59');
        if ($contato_title_color !== '#5A6E59') { echo ".contato .contato-title { color: " . esc_attr($contato_title_color) . "; }"; }
        
        $contato_text_fs = get_theme_mod('florapsi_contato_text_fontsize', '22');
        if ($contato_text_fs !== '22') { echo ".contato .contato-text { font-size: " . esc_attr($contato_text_fs) . "px; }"; }
        $contato_text_color = get_theme_mod('florapsi_contato_text_color', '#5A6E59');
        if ($contato_text_color !== '#5A6E59') { echo ".contato .contato-text { color: " . esc_attr($contato_text_color) . "; }"; }
        
        $whatsapp_bg = get_theme_mod('florapsi_whatsapp_button_bg_color', '#A3B899');
        if ($whatsapp_bg !== '#A3B899') { echo ".contato .whatsapp-button { background-color: " . esc_attr($whatsapp_bg) . "; }"; }
        $whatsapp_text = get_theme_mod('florapsi_whatsapp_button_text_color', '#FFFFFF');
        if ($whatsapp_text !== '#FFFFFF') { echo ".contato .whatsapp-button { color: " . esc_attr($whatsapp_text) . "; }"; }

        // Rodapé
        $footer_bg_color = get_theme_mod('florapsi_footer_background_color', '#5A6E59');
        if ($footer_bg_color !== '#5A6E59') { echo ".footer { background-color: " . esc_attr($footer_bg_color) . "; }"; }
        $footer_text_color = get_theme_mod('florapsi_footer_text_color', '#E5CDC0');
        if ($footer_text_color !== '#E5CDC0') { echo ".footer { color: " . esc_attr($footer_text_color) . "; }"; }
        $footer_ff = get_theme_mod('florapsi_footer_fontfamily', 'Sofia Pro');
        if ($footer_ff !== 'Sofia Pro') { echo ".footer { font-family: '" . esc_attr($footer_ff) . "', sans-serif; }"; }
        $footer_fs = get_theme_mod('florapsi_footer_fontsize', '15');
        if ($footer_fs !== '15') { echo ".footer p { font-size: " . esc_attr($footer_fs) . "px; }"; }
        $footer_id_fw = get_theme_mod('florapsi_footer_identification_fontweight', '600');
        if ($footer_id_fw !== '600') { echo ".footer p:first-child { font-weight: " . esc_attr($footer_id_fw) . "; }"; }
        $footer_padding = get_theme_mod('florapsi_footer_padding', '40');
        if ($footer_padding !== '40') { echo ".footer { padding-top: " . esc_attr($footer_padding) . "px; padding-bottom: " . esc_attr($footer_padding) . "px; }"; }

        // Botão Flutuante
        $whatsapp_bg = get_theme_mod('florapsi_whatsapp_bg_color', '#A3B899');
        if ($whatsapp_bg !== '#A3B899') { echo ".whatsapp-float { background-color: " . esc_attr($whatsapp_bg) . "; }"; }
        $whatsapp_icon_color = get_theme_mod('florapsi_whatsapp_icon_color', '#E5CDC0');
        if ($whatsapp_icon_color !== '#E5CDC0') { echo ".whatsapp-float { color: " . esc_attr($whatsapp_icon_color) . "; }"; }
        $whatsapp_size = get_theme_mod('florapsi_whatsapp_size', '60');
        if ($whatsapp_size !== '60') { echo ".whatsapp-float { width: " . esc_attr($whatsapp_size) . "px; height: " . esc_attr($whatsapp_size) . "px; font-size: " . esc_attr(floor($whatsapp_size * 0.6)) . "px; }"; }
        $whatsapp_bottom = get_theme_mod('florapsi_whatsapp_position_bottom', '50');
        if ($whatsapp_bottom !== '50') { echo ".whatsapp-float { bottom: " . esc_attr($whatsapp_bottom) . "px; }"; }
        $whatsapp_right = get_theme_mod('florapsi_whatsapp_position_right', '50');
        if ($whatsapp_right !== '50') { echo ".whatsapp-float { right: " . esc_attr($whatsapp_right) . "px; }"; }

        ?>

        /* -------------------------------------------------------------------------
         * ESTILOS RESPONSIVOS (TABLET)
         * ------------------------------------------------------------------------- */
        @media (max-width: <?php echo esc_attr($tablet_bp); ?>px) {
            <?php
            // Banner Tablet
            echo ".banner { padding-top: " . esc_attr(get_theme_mod('florapsi_banner_padding_tablet', '160')) . "px; }";
            echo ".banner .banner-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_fs_tablet', '56')) . "px; }";
            echo ".banner .banner-text { font-size: " . esc_attr(get_theme_mod('florapsi_banner_text_fs_tablet', '36')) . "px; }";
            echo ".banner-button { font-size: " . esc_attr(get_theme_mod('florapsi_banner_btn_fs_tablet', '26')) . "px; }";

            // Sobre Mim Tablet
            echo ".sobre-mim { padding-top: " . esc_attr(get_theme_mod('florapsi_sobre_pad_vert_tablet', '60')) . "px !important; padding-bottom: " . esc_attr(get_theme_mod('florapsi_sobre_pad_vert_tablet', '60')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-width: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_width_tablet', '500')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-height: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_height_tablet', '500')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-title { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fs_tablet', '36')) . "px; }";
            echo ".sobre-mim .sobre-mim-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fs_tablet', '26')) . "px; }";
            echo ".sobre-mim .sobre-mim-text, .sobre-mim .sobre-mim-text p { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_text_fs_tablet', '19')) . "px; }";
            ?>
        }
        
        /* -------------------------------------------------------------------------
         * ESTILOS RESPONSIVOS (MOBILE)
         * ------------------------------------------------------------------------- */
        @media (max-width: <?php echo esc_attr($mobile_bp); ?>px) {
            <?php
            // Banner Mobile
            echo ".banner { padding-top: " . esc_attr(get_theme_mod('florapsi_banner_padding_mobile', '130')) . "px; }";
            echo ".banner .banner-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_fs_mobile', '38')) . "px; }";
            echo ".banner .banner-text { font-size: " . esc_attr(get_theme_mod('florapsi_banner_text_fs_mobile', '24')) . "px; }";
            echo ".banner-button { font-size: " . esc_attr(get_theme_mod('florapsi_banner_btn_fs_mobile', '20')) . "px; }";

            // Sobre Mim Mobile
            $pad_v = get_theme_mod('florapsi_sobre_pad_vert_mobile', '40');
            $pad_h = get_theme_mod('florapsi_sobre_pad_horiz_mobile', '10');
            echo ".sobre-mim { padding: " . esc_attr($pad_v) . "px " . esc_attr($pad_h) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-width: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_width_mobile', '100')) . "% !important; }";
            echo ".sobre-mim .sobre-mim-img { max-height: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_height_mobile', '400')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-title { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fs_mobile', '30')) . "px; }";
            echo ".sobre-mim .sobre-mim-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fs_mobile', '10')) . "px; }";
            echo ".sobre-mim .sobre-mim-text, .sobre-mim .sobre-mim-text p { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_text_fs_mobile', '16')) . "px; }";
            
            // Meu Percurso
            $percurso_padding_mobile = get_theme_mod('florapsi_percurso_padding_mobile', '40');
            if ($percurso_padding_mobile !== '40') {
                echo ".percurso { padding-top: " . esc_attr($percurso_padding_mobile) . "px; padding-bottom: " . esc_attr($percurso_padding_mobile) . "px; }";
            }
            $percurso_titulo_fs_mobile = get_theme_mod('florapsi_percurso_titulo_fontsize_mobile', '32');
            if ($percurso_titulo_fs_mobile !== '32') {
                echo ".percurso .percurso-title { font-size: " . esc_attr($percurso_titulo_fs_mobile) . "px; }";
            }
            $percurso_texto_fs_mobile = get_theme_mod('florapsi_percurso_texto_fontsize_mobile', '18');
            if ($percurso_texto_fs_mobile !== '18') {
                echo ".percurso .percurso-text, .percurso .percurso-text p { font-size: " . esc_attr($percurso_texto_fs_mobile) . "px; }";
            }

            // Serviços Mobile
            echo ".servico .servico-title { font-size: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontsize_mobile', '36')) . "px; }";
            echo ".servico-card { max-width: " . esc_attr(get_theme_mod('florapsi_serv_card_max_width_mobile', '300')) . "px; }";
            echo ".servico .servico-icon i { font-size: " . esc_attr(get_theme_mod('florapsi_serv_icon_size_mobile', '30')) . "px; }";
            echo ".servico .servico-card-title { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_fs_mobile', '22')) . "px; }";
            echo ".servico .servico-card-text { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_fs_mobile', '16')) . "px; }";

            // Depoimentos
            $feedback_padding_mobile = get_theme_mod('florapsi_feedback_padding_mobile', '40');
            if ($feedback_padding_mobile !== '40') {
                echo ".feedback { padding-top: " . esc_attr($feedback_padding_mobile) . "px; padding-bottom: " . esc_attr($feedback_padding_mobile) . "px; }";
            }
            $feedback_title_fs_mobile = get_theme_mod('florapsi_feedback_title_fontsize_mobile', '36');
            if ($feedback_title_fs_mobile !== '36') {
                echo ".feedback .feedback-title { font-size: " . esc_attr($feedback_title_fs_mobile) . "px; }";
            }

            // Dúvidas Frequentes
            $duvidas_padding_mobile = get_theme_mod('florapsi_duvidas_padding_mobile', '40');
            if ($duvidas_padding_mobile !== '40') {
                echo ".duvidas { padding-top: " . esc_attr($duvidas_padding_mobile) . "px; padding-bottom: " . esc_attr($duvidas_padding_mobile) . "px; }";
            }
            $duvidas_titulo_fs_mobile = get_theme_mod('florapsi_duvidas_titulo_fontsize_mobile', '36');
            if ($duvidas_titulo_fs_mobile !== '36') {
                echo ".duvidas .duvidas-title { font-size: " . esc_attr($duvidas_titulo_fs_mobile) . "px; }";
            }
            $duvidas_pergunta_fs_mobile = get_theme_mod('florapsi_duvidas_pergunta_fontsize_mobile', '18');
            if ($duvidas_pergunta_fs_mobile !== '18') {
                echo ".duvidas .duvidas-question { font-size: " . esc_attr($duvidas_pergunta_fs_mobile) . "px; }";
            }
            $duvidas_resposta_fs_mobile = get_theme_mod('florapsi_duvidas_resposta_fontsize_mobile', '16');
            if ($duvidas_resposta_fs_mobile !== '16') {
                echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { font-size: " . esc_attr($duvidas_resposta_fs_mobile) . "px; }";
            }

            // Contato
            $contato_padding_mobile = get_theme_mod('florapsi_contato_padding_mobile', '40');
            if ($contato_padding_mobile !== '40') {
                echo ".contato { padding-top: " . esc_attr($contato_padding_mobile) . "px; padding-bottom: " . esc_attr($contato_padding_mobile) . "px; }";
            }
            $contato_title_fs_mobile = get_theme_mod('florapsi_contato_title_fontsize_mobile', '36');
            if ($contato_title_fs_mobile !== '36') {
                echo ".contato .contato-title { font-size: " . esc_attr($contato_title_fs_mobile) . "px; }";
            }
            $contato_text_fs_mobile = get_theme_mod('florapsi_contato_text_fontsize_mobile', '18');
            if ($contato_text_fs_mobile !== '18') {
                echo ".contato .contato-text { font-size: " . esc_attr($contato_text_fs_mobile) . "px; }";
            }

            ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'florapsi_dynamic_css');