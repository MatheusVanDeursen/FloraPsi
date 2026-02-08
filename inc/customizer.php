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
        'title'    => __('Fundo', 'louize'),
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
        'title'    => __('Botão CTA: Cores', 'louize'),
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
    
    /* --- SUBSEÇÃO: Banner - Decorações de Flora --- */
    $wp_customize->add_section('florapsi_banner_flora_section', array(
        'title'    => __('Banner: Decorações de Flora', 'florapsi'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 35,
    ));

    $wp_customize->add_setting('florapsi_banner_flora_left', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'florapsi_banner_flora_left', array('label' => __('Folha Esquerda', 'florapsi'), 'section' => 'florapsi_banner_flora_section')));

    $wp_customize->add_setting('florapsi_banner_flora_right', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'florapsi_banner_flora_right', array('label' => __('Folha Direita', 'florapsi'), 'section' => 'florapsi_banner_flora_section')));

    $wp_customize->add_setting('florapsi_banner_flora_width', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_flora_width', array('label' => __('Largura das Folhas (px)', 'florapsi'), 'section' => 'florapsi_banner_flora_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_flora_opacity', array('default' => '0.4', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_banner_flora_opacity', array('label' => __('Opacidade da Flora (0.1 a 1.0)', 'florapsi'), 'section' => 'florapsi_banner_flora_section', 'type' => 'text', 'description' => __('Valores menores deixam o contorno mais suave e mesclado ao fundo.', 'florapsi')));

    /* --- SUBSEÇÃO: Banner - Responsividade --- */
    $wp_customize->add_section('florapsi_banner_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 60,
    ));

    $wp_customize->add_section('florapsi_banner_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'louize'),
        'panel'    => 'florapsi_banner_panel',
        'priority' => 61,
    ));

    // --- Tablet (992px por padrão) ---
    $wp_customize->add_setting('florapsi_banner_padding_tablet', array('default' => '200', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_padding_tablet', array('label' => __('Padding Top - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_subtitle_fs_tablet', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_fs_tablet', array('label' => __('Subtítulo - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_text_fs_tablet', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_fs_tablet', array('label' => __('Texto - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_btn_fs_tablet', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_fs_tablet', array('label' => __('Botão - Tablet (px)', 'louize'), 'section' => 'florapsi_banner_resp_tablet_section', 'type' => 'number'));
    
    // --- Mobile (576px por padrão) ---
    $wp_customize->add_setting('florapsi_banner_padding_mobile', array('default' => '130', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_padding_mobile', array('label' => __('Padding Top - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_subtitle_fs_mobile', array('default' => '35', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_subtitle_fs_mobile', array('label' => __('Subtítulo - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_text_fs_mobile', array('default' => '25', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_text_fs_mobile', array('label' => __('Texto - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_banner_btn_fs_mobile', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_banner_btn_fs_mobile', array('label' => __('Botão - Mobile (px)', 'louize'), 'section' => 'florapsi_banner_resp_mobile_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
     * PAINEL: SOBRE MIM
     * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_sobre_panel', array(
        'title'       => __('Sobre Mim', 'florapsi'),
        'description' => __('Configurações de fundo, textos, imagem e responsividade da seção Sobre Mim.', 'florapsi'),
        'priority'    => 102,
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

    /* --- SUBSEÇÃO: Frases - w --- */
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

    /* --- SUBSEÇÃO: Responsividade --- */
    $wp_customize->add_section('florapsi_sobre_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 40,
    ));

    $wp_customize->add_section('florapsi_sobre_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_sobre_panel',
        'priority' => 50,
    ));

    // Tablet
    $wp_customize->add_setting('florapsi_sobre_titulo_fs_tablet', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fs_tablet', array('label' => __('Título - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fs_tablet', array('default' => '26', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fs_tablet', array('label' => __('Subtítulo - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_text_fs_tablet', array('default' => '19', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_text_fs_tablet', array('label' => __('Texto - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_sobre_titulo_fs_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_titulo_fs_mobile', array('label' => __('Título - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_subtitulo_fs_mobile', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_subtitulo_fs_mobile', array('label' => __('Subtítulo - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_text_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_text_fs_mobile', array('label' => __('Texto - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    // Tablet
    $wp_customize->add_setting('florapsi_sobre_img_max_width_tablet', array('default' => '350', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_width_tablet', array('label' => __('Largura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_img_max_height_tablet', array('default' => '500', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_height_tablet', array('label' => __('Altura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_pad_vert_tablet', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_vert_tablet', array('label' => __('Padding Vertical - Tablet (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_tablet_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_sobre_img_max_height_mobile', array('default' => '100', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_height_mobile', array('label' => __('Largura Max Imagem - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_img_max_width_mobile', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_img_max_width_mobile', array('label' => __('Altura Max Imagem - Mobile (%)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

   
    $wp_customize->add_setting('florapsi_sobre_pad_vert_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_vert_mobile', array('label' => __('Padding Vertical - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_sobre_pad_horiz_mobile', array('default' => '5', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_sobre_pad_horiz_mobile', array('label' => __('Padding Horizontal - Mobile (px)', 'florapsi'), 'section' => 'florapsi_sobre_resp_mobile_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
     * PAINEL: SERVIÇOS (Refatorado com Tablet)
     * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_servicos_panel', array(
        'title'       => __('Serviços', 'florapsi'),
        'description' => __('Configurações de layout, tipografia e cores da seção de Serviços.', 'florapsi'),
        'priority'    => 103,
    ));

    /* --- SUBSEÇÃO 1: Fundo e Título --- */
    $wp_customize->add_section('florapsi_serv_bg_tit_section', array(
        'title'    => __('Fundo e Título', 'florapsi'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_servicos_background_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'florapsi'),
        'section'  => 'florapsi_serv_bg_tit_section',
    )));

    $wp_customize->add_setting('florapsi_servicos_main_title_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_main_title_color', array(
        'label'    => __('Cor do Título', 'florapsi'),
        'section'  => 'florapsi_serv_bg_tit_section',
    )));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontfamily', array('label' => __('Fonte do Título', 'florapsi'), 'section' => 'florapsi_serv_bg_tit_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontsize', array('label' => __('Tamanho do Título (px)', 'florapsi'), 'section' => 'florapsi_serv_bg_tit_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_servicos_main_title_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontweight', array('label' => __('Peso da Fonte', 'florapsi'), 'section' => 'florapsi_serv_bg_tit_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO 2: Cards - Textos e Fonte --- */
    $wp_customize->add_section('florapsi_serv_cards_texts_section', array(
        'title'    => __('Cards: Textos e Fonte', 'florapsi'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 20,
    ));

    $wp_customize->add_setting('florapsi_serv_card_tit_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_serv_card_tit_ff', array('label' => __('Fonte do Título do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_serv_card_tit_fs', array('default' => '26', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fs', array('label' => __('Tamanho do Título do Card (px)', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_tit_fw', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fw', array('label' => __('Peso do Título do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'select', 'choices' => $font_weight_choices));

    $wp_customize->add_setting('florapsi_serv_card_txt_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_serv_card_txt_ff', array('label' => __('Fonte do Texto do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_serv_card_txt_fs', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fs', array('label' => __('Tamanho do Texto do Card (px)', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_txt_fw', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fw', array('label' => __('Peso do Texto do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'select', 'choices' => $font_weight_choices));

    $wp_customize->add_setting('florapsi_serv_icon_size', array('default' => '45', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_icon_size', array('label' => __('Tamanho do Ícone (px)', 'florapsi'), 'section' => 'florapsi_serv_cards_texts_section', 'type' => 'number'));

    /* --- SUBSEÇÃO 3: Cards - Cores --- */
    $wp_customize->add_section('florapsi_serv_cards_colors_section', array(
        'title'    => __('Cards: Cores', 'florapsi'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_serv_card_tit_clr', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_tit_clr', array('label' => __('Cor do Título do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_colors_section')));

    $wp_customize->add_setting('florapsi_serv_card_txt_clr', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_txt_clr', array('label' => __('Cor do Texto do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_colors_section')));

    $wp_customize->add_setting('florapsi_servicos_icon_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_servicos_icon_color', array('label' => __('Cor do Ícone', 'florapsi'), 'section' => 'florapsi_serv_cards_colors_section')));

    $wp_customize->add_setting('florapsi_serv_card_bg_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_serv_card_bg_color', array('label' => __('Cor de Fundo do Card', 'florapsi'), 'section' => 'florapsi_serv_cards_colors_section')));

    /* --- SUBSEÇÃO 4: Responsividade --- */
    $wp_customize->add_section('florapsi_serv_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 40,
    ));

    $wp_customize->add_section('florapsi_serv_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_servicos_panel',
        'priority' => 41,
    ));

    // --- Tablet ---
    $wp_customize->add_setting('florapsi_servicos_main_title_fontsize_tablet', array('default' => '42', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontsize_tablet', array('label' => __('Tam. Título Seção - Tablet (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_tit_fs_tablet', array('default' => '24', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fs_tablet', array('label' => __('Tam. Título Card - Tablet (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_txt_fs_tablet', array('default' => '17', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fs_tablet', array('label' => __('Tam. Texto Card - Tablet (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_max_width_tablet', array('default' => '350', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_max_width_tablet', array('label' => __('Largura Máx Card - Tablet (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_icon_size_tablet', array('default' => '38', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_icon_size_tablet', array('label' => __('Tam. Ícone - Tablet (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_tablet_section', 'type' => 'number'));

    // --- Mobile ---
    $wp_customize->add_setting('florapsi_servicos_main_title_fontsize_mobile', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_servicos_main_title_fontsize_mobile', array('label' => __('Tam. Título Seção - Mobile (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_tit_fs_mobile', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_tit_fs_mobile', array('label' => __('Tam. Título Card - Mobile (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_txt_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_txt_fs_mobile', array('label' => __('Tam. Texto Card - Mobile (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_card_max_width_mobile', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_card_max_width_mobile', array('label' => __('Largura Máx Card - Mobile (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_serv_icon_size_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_serv_icon_size_mobile', array('label' => __('Tam. Ícone - Mobile (px)', 'florapsi'), 'section' => 'florapsi_serv_resp_mobile_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
     * PAINEL: MEU PERCURSO
     * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_percurso_panel', array(
        'title'       => __('Meu Percurso', 'florapsi'),
        'description' => __('Configurações de fundo, textos, imagem e responsividade da seção Meu Percurso.', 'florapsi'),
        'priority'    => 104,
    ));

    /* --- SUBSEÇÃO: Fundo --- */
    $wp_customize->add_section('florapsi_percurso_fundo_section', array(
        'title'    => __('Percurso: Fundo', 'florapsi'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_percurso_background_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'florapsi'),
        'section'  => 'florapsi_percurso_fundo_section',
    )));

    /* --- SUBSEÇÃO: Frases - Texto e Fonte --- */
    $wp_customize->add_section('florapsi_percurso_frases_text_section', array(
        'title'    => __('Frases: Texto e Fonte', 'florapsi'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 20,
    ));

    // --- Título ---
    $wp_customize->add_setting('florapsi_percurso_titulo_fontfamily', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_percurso_titulo_fontfamily', array('label' => __('Fonte do Título', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_percurso_titulo_fontsize', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_titulo_fontsize', array('label' => __('Tamanho do Título (px)', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_titulo_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_titulo_fontweight', array('label' => __('Peso do Título', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    // --- Texto Principal ---
    $wp_customize->add_setting('florapsi_percurso_texto_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_percurso_texto_fontfamily', array('label' => __('Fonte do Texto', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_percurso_texto_fontsize', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_texto_fontsize', array('label' => __('Tamanho do Texto (px)', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_texto_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_texto_fontweight', array('label' => __('Peso do Texto', 'florapsi'), 'section' => 'florapsi_percurso_frases_text_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO: Frases - Cores --- */
    $wp_customize->add_section('florapsi_percurso_frases_color_section', array(
        'title'    => __('Frases: Cores', 'florapsi'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_percurso_titulo_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_titulo_color', array('label' => __('Cor do Título', 'florapsi'), 'section' => 'florapsi_percurso_frases_color_section')));

    $wp_customize->add_setting('florapsi_percurso_texto_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_percurso_texto_color', array('label' => __('Cor do Texto', 'florapsi'), 'section' => 'florapsi_percurso_frases_color_section')));

    /* --- SUBSEÇÃO: Responsividade --- */
    $wp_customize->add_section('florapsi_percurso_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 40,
    ));

    $wp_customize->add_section('florapsi_percurso_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_percurso_panel',
        'priority' => 50,
    ));

    // Tablet
    $wp_customize->add_setting('florapsi_percurso_titulo_fs_tablet', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_titulo_fs_tablet', array('label' => __('Título - Tablet (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_text_fs_tablet', array('default' => '19', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_text_fs_tablet', array('label' => __('Texto - Tablet (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_tablet_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_percurso_titulo_fs_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_titulo_fs_mobile', array('label' => __('Título - Mobile (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_text_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_text_fs_mobile', array('label' => __('Texto - Mobile (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));

    // Tablet
    $wp_customize->add_setting('florapsi_percurso_img_max_width_tablet', array('default' => '200', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_img_max_width_tablet', array('label' => __('Largura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_img_max_height_tablet', array('default' => '500', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_img_max_height_tablet', array('label' => __('Altura Max Imagem - Tablet (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_pad_vert_tablet', array('default' => '60', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_pad_vert_tablet', array('label' => __('Padding Vertical - Tablet (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_tablet_section', 'type' => 'number'));

    // Mobile
    $wp_customize->add_setting('florapsi_percurso_img_max_height_mobile', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_img_max_height_mobile', array('label' => __('Altura Max Imagem - Mobile (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_img_max_width_mobile', array('default' => '80', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_img_max_width_mobile', array('label' => __('Largura Max Imagem - Mobile (%)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_pad_vert_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_pad_vert_mobile', array('label' => __('Padding Vertical - Mobile (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_percurso_pad_horiz_mobile', array('default' => '5', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_percurso_pad_horiz_mobile', array('label' => __('Padding Horizontal - Mobile (px)', 'florapsi'), 'section' => 'florapsi_percurso_resp_mobile_section', 'type' => 'number'));


    /* -------------------------------------------------------------------------
     * PAINEL: DEPOIMENTOS
     * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_feedback_panel', array(
        'title'       => __('Depoimentos', 'florapsi'),
        'description' => __('Configurações de layout, tipografia e cores da seção de depoimentos.', 'florapsi'),
        'priority'    => 105,
    ));

    /* --- SUBSEÇÃO 1: Fundo e Título --- */
    $wp_customize->add_section('florapsi_fb_bg_tit_section', array(
        'title'    => __('Fundo e Título', 'florapsi'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_feedback_background_color', array('default' => '#F8F0E3', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'florapsi'),
        'section'  => 'florapsi_fb_bg_tit_section',
    )));

    $wp_customize->add_setting('florapsi_feedback_title_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_title_color', array('label' => __('Cor do Título', 'florapsi'), 'section' => 'florapsi_fb_bg_tit_section')));

    $wp_customize->add_setting('florapsi_feedback_title_ff', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_feedback_title_ff', array('label' => __('Fonte do Título', 'florapsi'), 'section' => 'florapsi_fb_bg_tit_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_feedback_title_fs', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_title_fs', array('label' => __('Tamanho do Título (px)', 'florapsi'), 'section' => 'florapsi_fb_bg_tit_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_feedback_title_fw', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_title_fw', array('label' => __('Peso do Título', 'florapsi'), 'section' => 'florapsi_fb_bg_tit_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO 2: Cards - Textos e Fonte --- */
    $wp_customize->add_section('florapsi_fb_cards_texts_section', array(
        'title'    => __('Cards: Textos e Fonte', 'florapsi'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 20,
    ));

    // Texto do Depoimento
    $wp_customize->add_setting('florapsi_feedback_text_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_feedback_text_ff', array('label' => __('Fonte do Depoimento', 'florapsi'), 'section' => 'florapsi_fb_cards_texts_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_feedback_text_fs', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_text_fs', array('label' => __('Tamanho do Texto (px)', 'florapsi'), 'section' => 'florapsi_fb_cards_texts_section', 'type' => 'number'));

    // Autor
    $wp_customize->add_setting('florapsi_feedback_author_ff', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_feedback_author_ff', array('label' => __('Fonte do Autor', 'florapsi'), 'section' => 'florapsi_fb_cards_texts_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_feedback_author_fs', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_author_fs', array('label' => __('Tamanho do Autor (px)', 'florapsi'), 'section' => 'florapsi_fb_cards_texts_section', 'type' => 'number'));

    // Ícone de Aspas
    $wp_customize->add_setting('florapsi_feedback_quote_icon_size', array('default' => '140', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_quote_icon_size', array('label' => __('Tamanho das Aspas (px)', 'florapsi'), 'section' => 'florapsi_fb_cards_texts_section', 'type' => 'number'));

    /* --- SUBSEÇÃO 3: Cards - Cores --- */
    $wp_customize->add_section('florapsi_fb_cards_colors_section', array(
        'title'    => __('Cards: Cores', 'florapsi'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_feedback_card_bg_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_card_bg_color', array('label' => __('Cor de Fundo do Card', 'florapsi'), 'section' => 'florapsi_fb_cards_colors_section')));

    $wp_customize->add_setting('florapsi_feedback_text_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_text_color', array('label' => __('Cor do Texto', 'florapsi'), 'section' => 'florapsi_fb_cards_colors_section')));

    $wp_customize->add_setting('florapsi_feedback_author_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_author_color', array('label' => __('Cor do Autor', 'florapsi'), 'section' => 'florapsi_fb_cards_colors_section')));

    $wp_customize->add_setting('florapsi_feedback_quote_icon_color', array('default' => '#A3B899', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_quote_icon_color', array('label' => __('Cor das Aspas', 'florapsi'), 'section' => 'florapsi_fb_cards_colors_section')));

    $wp_customize->add_setting('florapsi_feedback_readmore_color', array('default' => '#5A6E59', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_feedback_readmore_color', array('label' => __('Cor do "Ler Mais"', 'florapsi'), 'section' => 'florapsi_fb_cards_colors_section')));

    /* --- SUBSEÇÃO 4: Responsividade --- */
    $wp_customize->add_section('florapsi_fb_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 40,
    ));

    $wp_customize->add_section('florapsi_fb_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_feedback_panel',
        'priority' => 41,
    ));

    $wp_customize->add_setting('florapsi_feedback_padding_mobile', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_padding_mobile', array('label' => __('Padding Vertical - Mobile (px)', 'florapsi'), 'section' => 'florapsi_fb_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_feedback_title_fs_mobile', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_title_fs_mobile', array('label' => __('Tam. Título - Mobile (px)', 'florapsi'), 'section' => 'florapsi_fb_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_feedback_text_fs_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_feedback_text_fs_mobile', array('label' => __('Tam. Texto - Mobile (px)', 'florapsi'), 'section' => 'florapsi_fb_resp_mobile_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
    * PAINEL: DÚVIDAS FREQUENTES
    * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_duvidas_panel', array(
        'title'       => __('Dúvidas Frequentes', 'florapsi'),
        'description' => __('Configurações de layout, tipografia e cores da seção de FAQ.', 'florapsi'),
        'priority'    => 106,
    ));

    /* --- SUBSEÇÃO 1: Fundo e Título --- */
    $wp_customize->add_section('florapsi_duv_bg_tit_section', array(
        'title'    => __('Fundo e Título', 'florapsi'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 10,
    ));

    $wp_customize->add_setting('florapsi_duvidas_background_color', array('default' => '#E8B1B1', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_background_color', array(
        'label'    => __('Cor de Fundo da Seção', 'florapsi'),
        'section'  => 'florapsi_duv_bg_tit_section',
    )));

    $wp_customize->add_setting('florapsi_duvidas_titulo_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_titulo_color', array('label' => __('Cor do Título', 'florapsi'), 'section' => 'florapsi_duv_bg_tit_section')));

    $wp_customize->add_setting('florapsi_duvidas_titulo_ff', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_duvidas_titulo_ff', array('label' => __('Fonte do Título', 'florapsi'), 'section' => 'florapsi_duv_bg_tit_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fontsize', array('default' => '50', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_titulo_fontsize', array('label' => __('Tamanho do Título (px)', 'florapsi'), 'section' => 'florapsi_duv_bg_tit_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fontweight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_titulo_fontweight', array('label' => __('Peso do Título', 'florapsi'), 'section' => 'florapsi_duv_bg_tit_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO 2: Caixa de Dúvidas: Texto e Fonte --- */
    $wp_customize->add_section('florapsi_duv_text_font_section', array(
        'title'    => __('Caixa de Dúvidas: Texto e Fonte', 'florapsi'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 20,
    ));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_duvidas_pergunta_fontfamily', array('label' => __('Fonte da Pergunta', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontsize', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_pergunta_fontsize', array('label' => __('Tamanho da Pergunta (px)', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontweight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_pergunta_fontweight', array('label' => __('Peso da Pergunta', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'select', 'choices' => $font_weight_choices));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontfamily', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_duvidas_resposta_fontfamily', array('label' => __('Fonte da Resposta', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'select', 'choices' => $font_family_choices));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontsize', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_resposta_fontsize', array('label' => __('Tamanho da Resposta (px)', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontweight', array('default' => '300', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_resposta_fontweight', array('label' => __('Peso da Resposta', 'florapsi'), 'section' => 'florapsi_duv_text_font_section', 'type' => 'select', 'choices' => $font_weight_choices));

    /* --- SUBSEÇÃO 3: Caixa de Dúvidas: Cores --- */
    $wp_customize->add_section('florapsi_duv_colors_section', array(
        'title'    => __('Caixa de Dúvidas: Cores', 'florapsi'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_pergunta_color', array('label' => __('Cor da Pergunta', 'florapsi'), 'section' => 'florapsi_duv_colors_section')));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_hover_color', array('default' => '#E8B1B1', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_pergunta_hover_color', array('label' => __('Cor da Pergunta (Hover)', 'florapsi'), 'section' => 'florapsi_duv_colors_section')));

    $wp_customize->add_setting('florapsi_duvidas_resposta_color', array('default' => '#333333', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_resposta_color', array('label' => __('Cor da Resposta', 'florapsi'), 'section' => 'florapsi_duv_colors_section')));

    $wp_customize->add_setting('florapsi_duvidas_icon_color', array('default' => '#9B545A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_duvidas_icon_color', array('label' => __('Cor do Ícone (+)', 'florapsi'), 'section' => 'florapsi_duv_colors_section')));

    /* --- SUBSEÇÃO 4: Responsividade --- */
    $wp_customize->add_section('florapsi_duv_resp_tablet_section', array(
        'title'    => __('Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 40,
    ));

    $wp_customize->add_section('florapsi_duv_resp_mobile_section', array(
        'title'    => __('Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_duvidas_panel',
        'priority' => 41,
    ));

    // --- Tablet ---
    $wp_customize->add_setting('florapsi_duvidas_padding_tablet', array('default' => '60', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_padding_tablet', array('label' => __('Padding Vertical - Tablet (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fs_tablet', array('default' => '36', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_titulo_fs_tablet', array('label' => __('Tam. Título - Tablet (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fs_tablet', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_pergunta_fs_tablet', array('label' => __('Tam. Pergunta - Tablet (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_tablet_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fs_tablet', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_resposta_fs_tablet', array('label' => __('Tam. Resposta - Tablet (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_tablet_section', 'type' => 'number'));

    // --- Mobile ---
    $wp_customize->add_setting('florapsi_duvidas_padding_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_padding_mobile', array('label' => __('Padding Vertical - Mobile (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_titulo_fontsize_mobile', array('default' => '30', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_titulo_fontsize_mobile', array('label' => __('Tam. Título - Mobile (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_pergunta_fontsize_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_pergunta_fontsize_mobile', array('label' => __('Tam. Pergunta - Mobile (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_mobile_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_duvidas_resposta_fontsize_mobile', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_duvidas_resposta_fontsize_mobile', array('label' => __('Tam. Resposta - Mobile (px)', 'florapsi'), 'section' => 'florapsi_duv_resp_mobile_section', 'type' => 'number'));

    /* -------------------------------------------------------------------------
     * SEÇÃO: CONTATO
     * ------------------------------------------------------------------------- */
    $wp_customize->add_panel('florapsi_contact_panel', array(
        'title'       => __('Contato & Redes', 'florapsi'),
        'description' => __('Gestão total dividida por áreas (Geral, Box e Instagram).', 'florapsi'),
        'priority'    => 107,
    ));

    /* --- 1. LAYOUT E FUNDOS --- */
    $wp_customize->add_section('florapsi_contact_bg_section', array(
        'title'    => __('1. Layout e Fundos', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 10,
    ));

    // Cor Mestra
    $wp_customize->add_setting('florapsi_contact_main_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_main_color', array(
        'label'       => __('Cor Mestra (Padrão)', 'florapsi'),
        'description' => __('Define a cor base. Pode ser sobrescrita nos controles individuais de cor.', 'florapsi'),
        'section'     => 'florapsi_contact_bg_section',
    )));

    $wp_customize->add_setting('florapsi_contact_bg_color', array('default' => '#F9F7F2', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_bg_color', array('label' => __('Fundo da Seção', 'florapsi'), 'section' => 'florapsi_contact_bg_section')));

    $wp_customize->add_setting('florapsi_contact_card_bg', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_card_bg', array('label' => __('Fundo dos Cartões', 'florapsi'), 'section' => 'florapsi_contact_bg_section')));


    /* --- 2. ÁREA ESQUERDA (GERAL) --- */
    
    // A. Tipografia
    $wp_customize->add_section('florapsi_contact_typo_general', array(
        'title'    => __('2A. Tipografia: Geral (Esq.)', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 20,
    ));

    // Título
    $wp_customize->add_setting('florapsi_contact_title_font', array('default' => 'Tan Mon Cheri', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contact_title_font', array('label' => __('Fonte Título', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_contact_title_weight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_title_weight', array('label' => __('Peso Título', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_contact_title_size', array('default' => '40', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_title_size', array('label' => __('Tam. Título (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'number'));

    // Descrição
    $wp_customize->add_setting('florapsi_contact_desc_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contact_desc_font', array('label' => __('Fonte Descrição', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_contact_desc_weight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_desc_weight', array('label' => __('Peso Descrição', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_contact_desc_size', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_desc_size', array('label' => __('Tam. Descrição (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_general', 'type' => 'number'));

    // B. Cores
    $wp_customize->add_section('florapsi_contact_colors_general', array(
        'title'    => __('2B. Cores: Geral (Esq.)', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 25,
    ));

    $wp_customize->add_setting('florapsi_contact_title_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_title_color', array('label' => __('Cor do Título', 'florapsi'), 'section' => 'florapsi_contact_colors_general')));

    $wp_customize->add_setting('florapsi_contact_desc_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_desc_color', array('label' => __('Cor da Descrição', 'florapsi'), 'section' => 'florapsi_contact_colors_general')));


    /* --- 3. ÁREA ESQUERDA (BOX DESTAQUE & BOTÃO) --- */

    // A. Tipografia
    $wp_customize->add_section('florapsi_contact_typo_box', array(
        'title'    => __('3A. Tipografia: Box e Botão', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 30,
    ));

    // Box Título
    $wp_customize->add_setting('florapsi_contact_box_title_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contact_box_title_font', array('label' => __('Fonte Título Box', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_contact_box_title_weight', array('default' => '700', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_box_title_weight', array('label' => __('Peso Título Box', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_contact_box_title_size', array('default' => '19', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_box_title_size', array('label' => __('Tam. Título Box (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'number'));

    // Box Texto
    $wp_customize->add_setting('florapsi_contact_box_text_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contact_box_text_font', array('label' => __('Fonte Texto Box', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_contact_box_text_weight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_box_text_weight', array('label' => __('Peso Texto Box', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_contact_box_text_size', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_box_text_size', array('label' => __('Tam. Texto Box (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'number'));

    // Botão WPP
    $wp_customize->add_setting('florapsi_contact_btn_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_contact_btn_font', array('label' => __('Fonte Botão WPP', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_contact_btn_weight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_btn_weight', array('label' => __('Peso Botão WPP', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_contact_btn_size', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_btn_size', array('label' => __('Tam. Botão WPP (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_box', 'type' => 'number'));

    // B. Cores
    $wp_customize->add_section('florapsi_contact_colors_box', array(
        'title'    => __('3B. Cores: Box e Botão', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 35,
    ));

    $wp_customize->add_setting('florapsi_contact_box_title_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_box_title_color', array('label' => __('Cor Título Box', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));

    $wp_customize->add_setting('florapsi_contact_box_text_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_box_text_color', array('label' => __('Cor Texto Box', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));

    // Botão WPP (Normal)
    $wp_customize->add_setting('florapsi_contact_btn_bg', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_btn_bg', array('label' => __('Fundo Botão WPP', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));

    $wp_customize->add_setting('florapsi_contact_btn_text_color', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_btn_text_color', array('label' => __('Texto Botão WPP', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));

    // Botão WPP (Hover)
    $wp_customize->add_setting('florapsi_contact_btn_bg_hover', array('default' => '#1F363D', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_btn_bg_hover', array('label' => __('Hover: Fundo WPP', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));

    $wp_customize->add_setting('florapsi_contact_btn_text_hover', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_contact_btn_text_hover', array('label' => __('Hover: Texto WPP', 'florapsi'), 'section' => 'florapsi_contact_colors_box')));


    /* --- 4. ÁREA DIREITA (INSTAGRAM) --- */

    // A. Tipografia
    $wp_customize->add_section('florapsi_contact_typo_insta', array(
        'title'    => __('4A. Tipografia: Instagram', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 40,
    ));

    // Handle
    $wp_customize->add_setting('florapsi_insta_handle_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_insta_handle_font', array('label' => __('Fonte @Usuario', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_insta_handle_weight', array('default' => '700', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_handle_weight', array('label' => __('Peso @Usuario', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_insta_handle_size', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_handle_size', array('label' => __('Tam. @Usuario (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'number'));

    // Label
    $wp_customize->add_setting('florapsi_insta_label_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_insta_label_font', array('label' => __('Fonte Subtítulo', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_insta_label_weight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_label_weight', array('label' => __('Peso Subtítulo', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_insta_label_size', array('default' => '14', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_label_size', array('label' => __('Tam. Subtítulo (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'number'));

    // Bio
    $wp_customize->add_setting('florapsi_insta_bio_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_insta_bio_font', array('label' => __('Fonte Bio', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_insta_bio_weight', array('default' => '400', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_bio_weight', array('label' => __('Peso Bio', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_insta_bio_size', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_bio_size', array('label' => __('Tam. Bio (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'number'));

    // Tags
    $wp_customize->add_setting('florapsi_insta_tag_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_insta_tag_font', array('label' => __('Fonte Tags', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_insta_tag_weight', array('default' => '600', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_tag_weight', array('label' => __('Peso Tags', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_insta_tag_size', array('default' => '14', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_tag_size', array('label' => __('Tam. Tags (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'number'));

    // Botão Seguir
    $wp_customize->add_setting('florapsi_insta_btn_font', array('default' => 'Sofia Pro', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('florapsi_insta_btn_font', array('label' => __('Fonte Btn Seguir', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_family_choices));
    $wp_customize->add_setting('florapsi_insta_btn_weight', array('default' => '700', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_btn_weight', array('label' => __('Peso Btn Seguir', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'select', 'choices' => $font_weight_choices));
    $wp_customize->add_setting('florapsi_insta_btn_size', array('default' => '18', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_insta_btn_size', array('label' => __('Tam. Btn Seguir (px)', 'florapsi'), 'section' => 'florapsi_contact_typo_insta', 'type' => 'number'));

    // B. Cores
    $wp_customize->add_section('florapsi_contact_colors_insta', array(
        'title'    => __('4B. Cores: Instagram', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 45,
    ));

    $wp_customize->add_setting('florapsi_insta_handle_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_handle_color', array('label' => __('Cor @Usuario', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    $wp_customize->add_setting('florapsi_insta_label_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_label_color', array('label' => __('Cor Subtítulo', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    $wp_customize->add_setting('florapsi_insta_bio_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_bio_color', array('label' => __('Cor Bio', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    $wp_customize->add_setting('florapsi_insta_tag_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_tag_color', array('label' => __('Cor Texto Tags', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    // Botão Seguir (Normal)
    $wp_customize->add_setting('florapsi_insta_btn_color', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_btn_color', array('label' => __('Btn Seguir (Texto/Borda)', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    // Botão Seguir (Hover)
    $wp_customize->add_setting('florapsi_insta_btn_bg_hover', array('default' => '#2C4A52', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_btn_bg_hover', array('label' => __('Hover: Fundo Seguir', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));

    $wp_customize->add_setting('florapsi_insta_btn_text_hover', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'florapsi_insta_btn_text_hover', array('label' => __('Hover: Texto Seguir', 'florapsi'), 'section' => 'florapsi_contact_colors_insta')));


    /* --- 5. ELEMENTOS VISUAIS --- */
    $wp_customize->add_section('florapsi_contact_elements_section', array(
        'title'    => __('5. Elementos Visuais', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 50,
    ));

    $wp_customize->add_setting('florapsi_contact_avatar_size', array('default' => '102', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_avatar_size', array('label' => __('Tam. Avatar Instagram (px)', 'florapsi'), 'section' => 'florapsi_contact_elements_section', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_contact_icon_size', array('default' => '22', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_icon_size', array('label' => __('Tam. Ícone Box (px)', 'florapsi'), 'section' => 'florapsi_contact_elements_section', 'type' => 'number'));


    /* --- 6. RESPONSIVIDADE TABLET --- */
    $wp_customize->add_section('florapsi_contact_resp_tablet', array(
        'title'    => __('6. Responsividade: Tablet', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 60,
    ));

    $wp_customize->add_setting('florapsi_contact_padding_v_tablet', array('default' => '80', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_padding_v_tablet', array('label' => __('Padding Vertical', 'florapsi'), 'section' => 'florapsi_contact_resp_tablet', 'type' => 'number'));

    // Tamanhos de Fonte Tablet
    $fields_tablet = array(
        'florapsi_contact_title_tablet' => 'Título Principal',
        'florapsi_contact_desc_tablet'  => 'Descrição',
        'florapsi_contact_box_title_tablet' => 'Título Box',
        'florapsi_contact_box_text_tablet'  => 'Texto Box',
        'florapsi_contact_btn_tablet'   => 'Botão WPP',
        'florapsi_insta_handle_tablet'  => '@Usuario',
        'florapsi_insta_label_tablet'   => 'Subtítulo',
        'florapsi_insta_bio_tablet'     => 'Bio',
        'florapsi_insta_tag_tablet'     => 'Tags',
        'florapsi_insta_btn_tablet'     => 'Btn Seguir',
    );

    foreach ($fields_tablet as $id => $label) {
        $wp_customize->add_setting($id, array('default' => '18', 'sanitize_callback' => 'absint'));
        $wp_customize->add_control($id, array('label' => __($label, 'florapsi'), 'section' => 'florapsi_contact_resp_tablet', 'type' => 'number'));
    }
    
    // Avatar Tablet
    $wp_customize->add_setting('florapsi_contact_avatar_tablet', array('default' => '90', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_avatar_tablet', array('label' => __('Tam. Avatar (px)', 'florapsi'), 'section' => 'florapsi_contact_resp_tablet', 'type' => 'number'));


    /* --- 7. RESPONSIVIDADE MOBILE --- */
    $wp_customize->add_section('florapsi_contact_resp_mobile', array(
        'title'    => __('7. Responsividade: Mobile', 'florapsi'),
        'panel'    => 'florapsi_contact_panel',
        'priority' => 70,
    ));

    $wp_customize->add_setting('florapsi_contact_padding_v_mobile', array('default' => '60', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_padding_v_mobile', array('label' => __('Padding Vertical', 'florapsi'), 'section' => 'florapsi_contact_resp_mobile', 'type' => 'number'));

    $wp_customize->add_setting('florapsi_contact_padding_h_mobile', array('default' => '20', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_padding_h_mobile', array('label' => __('Padding Horizontal', 'florapsi'), 'section' => 'florapsi_contact_resp_mobile', 'type' => 'number'));

    // Tamanhos de Fonte Mobile
    $fields_mobile = array(
        'florapsi_contact_title_mobile' => 'Título Principal',
        'florapsi_contact_desc_mobile'  => 'Descrição',
        'florapsi_contact_box_title_mobile' => 'Título Box',
        'florapsi_contact_box_text_mobile'  => 'Texto Box',
        'florapsi_contact_btn_mobile'   => 'Botão WPP',
        'florapsi_insta_handle_mobile'  => '@Usuario',
        'florapsi_insta_label_mobile'   => 'Subtítulo',
        'florapsi_insta_bio_mobile'     => 'Bio',
        'florapsi_insta_tag_mobile'     => 'Tags',
        'florapsi_insta_btn_mobile'     => 'Btn Seguir',
    );

    foreach ($fields_mobile as $id => $label) {
        $wp_customize->add_setting($id, array('default' => '16', 'sanitize_callback' => 'absint'));
        $wp_customize->add_control($id, array('label' => __($label, 'florapsi'), 'section' => 'florapsi_contact_resp_mobile', 'type' => 'number'));
    }

    // Avatar Mobile
    $wp_customize->add_setting('florapsi_contact_avatar_mobile', array('default' => '80', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('florapsi_contact_avatar_mobile', array('label' => __('Tam. Avatar (px)', 'florapsi'), 'section' => 'florapsi_contact_resp_mobile', 'type' => 'number'));

    // =========================================================================
    // Adicionando Títulos Editáveis às Secções Existentes
    // =========================================================================

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
        'default'   => 'https://wa.me/seu-numero',
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

        // Decorações de Flora (Banner)
        $flora_width = get_theme_mod('florapsi_banner_flora_width', '400');
        $flora_op = get_theme_mod('florapsi_banner_flora_opacity', '0.4');

        // Configuração Geral (Ajuste de Cor e Mesclagem)
        echo ".banner-flora-left, .banner-flora-right {";
        echo " position: absolute; bottom: 0; pointer-events: none; z-index: 1;";
        echo " width: " . esc_attr($flora_width) . "px;";
        echo " opacity: " . esc_attr($flora_op) . ";"; // Reduzir opacidade faz o preto "pegar" a cor do fundo
        echo " mix-blend-mode: multiply;";             // Mescla com tons escuros
        echo " filter: brightness(0.9);";              // Ajuste fino de tom
        echo " transition: opacity 0.8s ease-out, transform 0.8s ease-out !important;";
        echo "}";

        // Lado Esquerdo (Normal)
        echo ".banner-flora-left { left: 0; transform: translateY(20px); }";
        echo ".banner-flora-left.is-visible { transform: translateY(0) !important; }";

        // Lado Direito (COM FLIP/ROTAÇÃO)
        // Note que combinamos scaleX(-1) com o translateY da animação
        echo ".banner-flora-right { right: 0; transform: scaleX(-1) translateY(20px); }";
        echo ".banner-flora-right.is-visible { transform: scaleX(-1) translateY(0) !important; }";

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

        // Meu Percurso (Desktop)
        $percurso_bg = get_theme_mod('florapsi_percurso_background_color', '#FFFFFF');
        echo ".percurso { background-color: " . esc_attr($percurso_bg) . "; }";
        
        echo ".percurso .percurso-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_percurso_titulo_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_percurso_titulo_fontfamily', 'Tan Mon Cheri')) . "', serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_percurso_titulo_fontsize', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_percurso_titulo_fontweight', '400')) . ";";
        echo "}";

        echo ".percurso .percurso-text, .percurso .percurso-text p {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_percurso_texto_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_percurso_texto_fontfamily', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_percurso_texto_fontsize', '22')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_percurso_texto_fontweight', '300')) . ";";
        echo "}";

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

        // Depoimentos (Desktop)
        $fb_bg = get_theme_mod('florapsi_feedback_background_color', '#F8F0E3');
        echo ".feedback { background-color: " . esc_attr($fb_bg) . "; }";
        
        echo ".feedback .feedback-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_feedback_title_color', '#5A6E59')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_feedback_title_ff', 'Tan Mon Cheri')) . "', serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_feedback_title_fs', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_feedback_title_fw', '400')) . ";";
        echo "}";

        // Estilos do Card (Manual e Trustindex)
        $fb_card_bg = get_theme_mod('florapsi_feedback_card_bg_color', '#FFFFFF');
        $fb_quote_clr = get_theme_mod('florapsi_feedback_quote_icon_color', '#A3B899');
        $fb_txt_clr = get_theme_mod('florapsi_feedback_text_color', '#5A6E59');
        $fb_auth_clr = get_theme_mod('florapsi_feedback_author_color', '#5A6E59');

        echo ".depoimento-item, #meus-depoimentos-customizados .ti-review-item > .ti-inner { background-color: " . esc_attr($fb_card_bg) . " !important; }";
        echo ".depoimento-item::before, #meus-depoimentos-customizados .ti-review-item > .ti-inner::before {";
        echo " color: " . esc_attr($fb_quote_clr) . " !important;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_feedback_quote_icon_size', '140')) . "px !important;";
        echo "}";

        echo ".depoimento-item p, #meus-depoimentos-customizados .ti-review-content {";
        echo " color: " . esc_attr($fb_txt_clr) . " !important;";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_feedback_text_ff', 'Sofia Pro')) . "', sans-serif !important;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_feedback_text_fs', '18')) . "px !important;";
        echo "}";

        echo ".depoimento-item span, #meus-depoimentos-customizados .ti-name {";
        echo " color: " . esc_attr($fb_auth_clr) . " !important;";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_feedback_author_ff', 'Sofia Pro')) . "', sans-serif !important;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_feedback_author_fs', '16')) . "px !important;";
        echo "}";

        echo "#meus-depoimentos-customizados .ti-read-more span { color: " . esc_attr(get_theme_mod('florapsi_feedback_readmore_color', '#5A6E59')) . " !important; }";


        // Dúvidas Frequentes (Desktop)
        $duv_bg = get_theme_mod('florapsi_duvidas_background_color', '#E8B1B1');
        echo ".duvidas { background-color: " . esc_attr($duv_bg) . "; }";
        
        echo ".duvidas .duvidas-title {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_duvidas_titulo_color', '#FFFFFF')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_duvidas_titulo_ff', 'Tan Mon Cheri')) . "', serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_titulo_fontsize', '50')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_duvidas_titulo_fontweight', '400')) . ";";
        echo "}";

        // Perguntas e Ícone
        $duv_perg_clr = get_theme_mod('florapsi_duvidas_pergunta_color', '#9B545A');
        $duv_icon_clr = get_theme_mod('florapsi_duvidas_icon_color', '#9B545A');
        
        echo ".duvidas .duvidas-question {";
        echo " color: " . esc_attr($duv_perg_clr) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_fontfamily', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_fontsize', '20')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_fontweight', '600')) . ";";
        echo "}";

        echo ".duvidas .duvidas-question::after { color: " . esc_attr($duv_icon_clr) . "; }";

        echo ".duvidas .duvidas-question:hover span { color: " . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_hover_color', '#E8B1B1')) . "; }";

        // Respostas
        echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p {";
        echo " color: " . esc_attr(get_theme_mod('florapsi_duvidas_resposta_color', '#333333')) . ";";
        echo " font-family: '" . esc_attr(get_theme_mod('florapsi_duvidas_resposta_fontfamily', 'Sofia Pro')) . "', sans-serif;";
        echo " font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_resposta_fontsize', '18')) . "px;";
        echo " font-weight: " . esc_attr(get_theme_mod('florapsi_duvidas_resposta_fontweight', '300')) . ";";
        echo "}";

        // Contato
        echo ".contact-section { background-color: " . esc_attr( get_theme_mod( 'florapsi_contact_bg_color', '#F9F7F2' ) ) . "; }";
        echo ".info-highlight-box, .instagram-card { background-color: " . esc_attr( get_theme_mod( 'florapsi_contact_card_bg', '#FFFFFF' ) ) . "; }";
        echo ".contact-left .section-title { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_contact_title_font', 'Tan Mon Cheri' ) ) . "', serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_title_size', '40' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_contact_title_weight', '400' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_title_color', '#2C4A52' ) ) . ";
        }";
        echo ".contact-description { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_contact_desc_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_desc_size', '18' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_contact_desc_weight', '400' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_desc_color', '#2C4A52' ) ) . ";
        }";
        echo ".info-content h4 { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_contact_box_title_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_box_title_size', '19' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_contact_box_title_weight', '700' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_box_title_color', '#2C4A52' ) ) . ";
        }";
        echo ".info-content p { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_contact_box_text_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_box_text_size', '18' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_contact_box_text_weight', '400' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_box_text_color', '#2C4A52' ) ) . ";
        }";
        echo ".btn-main.whatsapp-btn { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_contact_btn_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_size', '18' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_weight', '600' ) ) . ";
            background-color: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_bg', '#2C4A52' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_text_color', '#FFFFFF' ) ) . ";
        }";
        echo ".btn-main.whatsapp-btn:hover { 
            background-color: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_bg_hover', '#1F363D' ) ) . " !important;
            color: " . esc_attr( get_theme_mod( 'florapsi_contact_btn_text_hover', '#FFFFFF' ) ) . " !important;
        }";
        echo ".insta-handle { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_insta_handle_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_insta_handle_size', '22' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_insta_handle_weight', '700' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_insta_handle_color', '#2C4A52' ) ) . ";
        }";
        echo ".insta-label { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_insta_label_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_insta_label_size', '14' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_insta_label_weight', '600' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_insta_label_color', '#2C4A52' ) ) . ";
        }";
        echo ".insta-bio { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_insta_bio_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_insta_bio_size', '18' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_insta_bio_weight', '400' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_insta_bio_color', '#2C4A52' ) ) . ";
        }";
        echo ".topic-pill { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_insta_tag_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_insta_tag_size', '14' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_insta_tag_weight', '600' ) ) . ";
            color: " . esc_attr( get_theme_mod( 'florapsi_insta_tag_color', '#2C4A52' ) ) . ";
        }";
        $insta_btn_clr = get_theme_mod( 'florapsi_insta_btn_color', '#2C4A52' );
        echo ".btn-secondary { 
            font-family: '" . esc_attr( get_theme_mod( 'florapsi_insta_btn_font', 'Sofia Pro' ) ) . "', sans-serif;
            font-size: " . esc_attr( get_theme_mod( 'florapsi_insta_btn_size', '18' ) ) . "px;
            font-weight: " . esc_attr( get_theme_mod( 'florapsi_insta_btn_weight', '700' ) ) . ";
            color: " . esc_attr( $insta_btn_clr ) . ";
            border-color: " . esc_attr( $insta_btn_clr ) . ";
        }";
        echo ".btn-secondary:hover { 
            background-color: " . esc_attr( get_theme_mod( 'florapsi_insta_btn_bg_hover', '#2C4A52' ) ) . " !important;
            color: " . esc_attr( get_theme_mod( 'florapsi_insta_btn_text_hover', '#FFFFFF' ) ) . " !important;
        }";
        echo ".info-icon { font-size: " . esc_attr( get_theme_mod( 'florapsi_contact_icon_size', '22' ) ) . "px; }";
        $av_sz = get_theme_mod( 'florapsi_contact_avatar_size', '102' );
        $im_sz = $av_sz - 10;
        echo ".insta-avatar { width: " . esc_attr( $av_sz ) . "px; height: " . esc_attr( $av_sz ) . "px; }";
        echo ".insta-avatar img { width: " . esc_attr( $im_sz ) . "px; height: " . esc_attr( $im_sz ) . "px; }";


        ?>

        /* -------------------------------------------------------------------------
         * ESTILOS RESPONSIVOS (TABLET)
         * ------------------------------------------------------------------------- */
        @media (max-width: <?php echo esc_attr($tablet_bp); ?>px) {
            <?php
            // Banner Tablet
            echo ".banner { padding-top: " . esc_attr(get_theme_mod('florapsi_banner_padding_tablet', '200')) . "px; }";
            echo ".banner .banner-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_banner_subtitle_fs_tablet', '36')) . "px; }";
            echo ".banner .banner-text { font-size: " . esc_attr(get_theme_mod('florapsi_banner_text_fs_tablet', '20')) . "px; }";
            echo ".banner-button { font-size: " . esc_attr(get_theme_mod('florapsi_banner_btn_fs_tablet', '18')) . "px; }";

            // Sobre Mim Tablet
            echo ".sobre-mim { padding-top: " . esc_attr(get_theme_mod('florapsi_sobre_pad_vert_tablet', '40')) . "px !important; padding-bottom: " . esc_attr(get_theme_mod('florapsi_sobre_pad_vert_tablet', '60')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-width: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_width_tablet', '350')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-height: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_height_tablet', '500')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-title { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fs_tablet', '36')) . "px; }";
            echo ".sobre-mim .sobre-mim-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fs_tablet', '26')) . "px; }";
            echo ".sobre-mim .sobre-mim-text, .sobre-mim .sobre-mim-text p { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_text_fs_tablet', '19')) . "px; }";
            
            // Serviços Tablet
            echo ".servico .servico-title { font-size: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontsize_tablet', '42')) . "px; }";
            echo ".servico-card { max-width: " . esc_attr(get_theme_mod('florapsi_serv_card_max_width_tablet', '350')) . "px; }";
            echo ".servico .servico-icon i { font-size: " . esc_attr(get_theme_mod('florapsi_serv_icon_size_tablet', '38')) . "px; }";
            echo ".servico .servico-card-title { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_fs_tablet', '24')) . "px; }";
            echo ".servico .servico-card-text { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_fs_tablet', '17')) . "px; }";
            
            // Meu Percurso Tablet
            echo ".percurso { padding-top: " . esc_attr(get_theme_mod('florapsi_percurso_pad_vert_tablet', '60')) . "px !important; padding-bottom: " . esc_attr(get_theme_mod('florapsi_percurso_pad_vert_tablet', '60')) . "px !important; }";
            echo ".percurso .percurso-img { max-width: " . esc_attr(get_theme_mod('florapsi_percurso_img_max_width_tablet', '200')) . "px !important; }";
            echo ".percurso .percurso-img { max-height: " . esc_attr(get_theme_mod('florapsi_percurso_img_max_height_tablet', '500')) . "px !important; }";
            echo ".percurso .percurso-title { font-size: " . esc_attr(get_theme_mod('florapsi_percurso_titulo_fs_tablet', '36')) . "px; }";
            echo ".percurso .percurso-text, .percurso .percurso-text p { font-size: " . esc_attr(get_theme_mod('florapsi_percurso_text_fs_tablet', '19')) . "px; }";

            // Dúvidas Frequentes - Tablet
            $duv_pad_t = get_theme_mod('florapsi_duvidas_padding_tablet', '60');
            echo ".duvidas { padding-top: " . esc_attr($duv_pad_t) . "px !important; padding-bottom: " . esc_attr($duv_pad_t) . "px !important; }";
            echo ".duvidas .duvidas-title { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_titulo_fs_tablet', '36')) . "px; }";
            echo ".duvidas .duvidas-question { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_fs_tablet', '18')) . "px; }";
            echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_resposta_fs_tablet', '16')) . "px; }";

            // Contatos - Tablet
            $pad_tab = get_theme_mod( 'florapsi_contact_padding_v_tablet', '80' );
            echo ".contact-section { padding-top: " . esc_attr( $pad_tab ) . "px; padding-bottom: " . esc_attr( $pad_tab ) . "px; }";
            echo ".contact-left .section-title { font-size: " . esc_attr( get_theme_mod('florapsi_contact_title_tablet', '36') ) . "px; }";
            echo ".contact-description { font-size: " . esc_attr( get_theme_mod('florapsi_contact_desc_tablet', '18') ) . "px; }";
            echo ".info-content h4 { font-size: " . esc_attr( get_theme_mod('florapsi_contact_box_title_tablet', '18') ) . "px; }";
            echo ".info-content p { font-size: " . esc_attr( get_theme_mod('florapsi_contact_box_text_tablet', '17') ) . "px; }";
            echo ".btn-main.whatsapp-btn { font-size: " . esc_attr( get_theme_mod('florapsi_contact_btn_tablet', '17') ) . "px; }";
            echo ".insta-handle { font-size: " . esc_attr( get_theme_mod('florapsi_insta_handle_tablet', '20') ) . "px; }";
            echo ".insta-label { font-size: " . esc_attr( get_theme_mod('florapsi_insta_label_tablet', '14') ) . "px; }";
            echo ".insta-bio { font-size: " . esc_attr( get_theme_mod('florapsi_insta_bio_tablet', '17') ) . "px; }";
            echo ".topic-pill { font-size: " . esc_attr( get_theme_mod('florapsi_insta_tag_tablet', '14') ) . "px; }";
            echo ".btn-secondary { font-size: " . esc_attr( get_theme_mod('florapsi_insta_btn_tablet', '17') ) . "px; }";
            $av_tab = get_theme_mod( 'florapsi_contact_avatar_tablet', '90' ); $im_tab = $av_tab - 10;
            echo ".insta-avatar { width: " . esc_attr( $av_tab ) . "px; height: " . esc_attr( $av_tab ) . "px; }";
            echo ".insta-avatar img { width: " . esc_attr( $im_tab ) . "px; height: " . esc_attr( $im_tab ) . "px; }";

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
            echo ".sobre-mim .sobre-mim-img { max-height: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_height_mobile', '400')) . "px !important; }";
            echo ".sobre-mim .sobre-mim-img { max-width: " . esc_attr(get_theme_mod('florapsi_sobre_img_max_width_mobile', '100')) . "% !important; }";
            echo ".sobre-mim .sobre-mim-title { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_titulo_fs_mobile', '30')) . "px; }";
            echo ".sobre-mim .sobre-mim-subtitle { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_subtitulo_fs_mobile', '10')) . "px; }";
            echo ".sobre-mim .sobre-mim-text, .sobre-mim .sobre-mim-text p { font-size: " . esc_attr(get_theme_mod('florapsi_sobre_text_fs_mobile', '16')) . "px; }";
            
            // Meu Percurso Mobile
            $perc_pad_v = get_theme_mod('florapsi_percurso_pad_vert_mobile', '40');
            $perc_pad_h = get_theme_mod('florapsi_percurso_pad_horiz_mobile', '5');
            echo ".percurso { padding: " . esc_attr($perc_pad_v) . "px " . esc_attr($perc_pad_h) . "px !important; }";            
            echo ".percurso .percurso-img { max-height: " . esc_attr(get_theme_mod('florapsi_percurso_img_max_height_mobile', '600')) . "px !important; }";
            echo ".percurso .percurso-img { max-width: " . esc_attr(get_theme_mod('florapsi_percurso_img_max_width_mobile', '80')) . "% !important; }";
            echo ".percurso .percurso-title { font-size: " . esc_attr(get_theme_mod('florapsi_percurso_titulo_fs_mobile', '30')) . "px; }";
            echo ".percurso .percurso-text, .percurso .percurso-text p { font-size: " . esc_attr(get_theme_mod('florapsi_percurso_text_fs_mobile', '16')) . "px; }";

            // Serviços Mobile
            echo ".servico .servico-title { font-size: " . esc_attr(get_theme_mod('florapsi_servicos_main_title_fontsize_mobile', '36')) . "px; }";
            echo ".servico-card { max-width: " . esc_attr(get_theme_mod('florapsi_serv_card_max_width_mobile', '300')) . "px; }";
            echo ".servico .servico-icon i { font-size: " . esc_attr(get_theme_mod('florapsi_serv_icon_size_mobile', '30')) . "px; }";
            echo ".servico .servico-card-title { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_tit_fs_mobile', '22')) . "px; }";
            echo ".servico .servico-card-text { font-size: " . esc_attr(get_theme_mod('florapsi_serv_card_txt_fs_mobile', '16')) . "px; }";

            // Depoimentos
            $fb_pad_v = get_theme_mod('florapsi_feedback_padding_mobile', '30');
            echo ".feedback { padding-top: " . esc_attr($fb_pad_v) . "px !important; padding-bottom: " . esc_attr($fb_pad_v) . "px !important; }";
            echo ".feedback .feedback-title { font-size: " . esc_attr(get_theme_mod('florapsi_feedback_title_fs_mobile', '30')) . "px; }";
            echo ".depoimento-item p, #meus-depoimentos-customizados .ti-review-content { font-size: " . esc_attr(get_theme_mod('florapsi_feedback_text_fs_mobile', '16')) . "px !important; }";

            // Dúvidas Frequentes
            $duv_pad_v = get_theme_mod('florapsi_duvidas_padding_mobile', '30');
            echo ".duvidas { padding-top: " . esc_attr($duv_pad_v) . "px !important; padding-bottom: " . esc_attr($duv_pad_v) . "px !important; }";
            echo ".duvidas .duvidas-title { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_titulo_fontsize_mobile', '30')) . "px; }";
            echo ".duvidas .duvidas-question { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_pergunta_fontsize_mobile', '16')) . "px; }";
            echo ".duvidas .duvidas-answer, .duvidas .duvidas-answer p { font-size: " . esc_attr(get_theme_mod('florapsi_duvidas_resposta_fontsize_mobile', '16')) . "px; }";

            // Contato
            $pad_v_mob = get_theme_mod( 'florapsi_contact_padding_v_mobile', '60' );
            echo ".contact-section { padding-top: " . esc_attr( $pad_v_mob ) . "px; padding-bottom: " . esc_attr( $pad_v_mob ) . "px; }";
            $pad_h_mob = get_theme_mod( 'florapsi_contact_padding_h_mobile', '20' );
            echo ".container.contact-grid { padding-left: " . esc_attr( $pad_h_mob ) . "px; padding-right: " . esc_attr( $pad_h_mob ) . "px; }";
            echo ".contact-left .section-title { font-size: " . esc_attr( get_theme_mod('florapsi_contact_title_mobile', '30') ) . "px; }";
            echo ".contact-description { font-size: " . esc_attr( get_theme_mod('florapsi_contact_desc_mobile', '16') ) . "px; }";
            echo ".info-content h4 { font-size: " . esc_attr( get_theme_mod('florapsi_contact_box_title_mobile', '18') ) . "px; }";
            echo ".info-content p { font-size: " . esc_attr( get_theme_mod('florapsi_contact_box_text_mobile', '16') ) . "px; }";
            echo ".btn-main.whatsapp-btn { font-size: " . esc_attr( get_theme_mod('florapsi_contact_btn_mobile', '16') ) . "px; }";
            echo ".insta-handle { font-size: " . esc_attr( get_theme_mod('florapsi_insta_handle_mobile', '20') ) . "px; }";
            echo ".insta-label { font-size: " . esc_attr( get_theme_mod('florapsi_insta_label_mobile', '12') ) . "px; }";
            echo ".insta-bio { font-size: " . esc_attr( get_theme_mod('florapsi_insta_bio_mobile', '16') ) . "px; }";
            echo ".topic-pill { font-size: " . esc_attr( get_theme_mod('florapsi_insta_tag_mobile', '12') ) . "px; }";
            echo ".btn-secondary { font-size: " . esc_attr( get_theme_mod('florapsi_insta_btn_mobile', '16') ) . "px; }";
            $av_mob = get_theme_mod( 'florapsi_contact_avatar_mobile', '80' ); $im_mob = $av_mob - 8;
            echo ".insta-avatar { width: " . esc_attr( $av_mob ) . "px; height: " . esc_attr( $av_mob ) . "px; }";
            echo ".insta-avatar img { width: " . esc_attr( $im_mob ) . "px; height: " . esc_attr( $im_mob ) . "px; }";

            ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'florapsi_dynamic_css');