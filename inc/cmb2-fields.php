<?php
/**
 * Adiciona as metaboxes e campos personalizados com CMB2.
 */
add_action('cmb2_admin_init', 'florapsi_register_metaboxes');

function florapsi_register_metaboxes() {

    // Define o ID da página inicial uma única vez para evitar repetição
    $home_page = get_page_by_title('Início');
    $home_id   = $home_page ? $home_page->ID : 0;

    /* -------------------------------------------------------------------------
     * SEÇÃO: SOBRE MIM
     * ------------------------------------------------------------------------- */
    $cmb_sobre = new_cmb2_box(array(
        'id'            => '_florapsi_sobre_metabox',
        'title'         => esc_html__('Sobre Mim', 'louize'),
        'object_types'  => array('page'),
        'show_on'       => array('key' => 'id', 'value' => $home_id),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    $cmb_sobre->add_field(array(
        'name'    => esc_html__('Imagem de Perfil', 'louize'),
        'id'      => 'sobre_imagem',
        'type'    => 'file',
        'options' => array('url' => false),
    ));

    $cmb_sobre->add_field(array(
        'name'    => esc_html__('Título da Seção', 'louize'),
        'id'      => 'sobre_titulo',
        'type'    => 'text',
        'default' => 'Título',
    ));

    $cmb_sobre->add_field(array(
        'name'    => esc_html__('Subtítulo (Cargo e CRP)', 'louize'),
        'id'      => 'sobre_subtitulo',
        'type'    => 'text',
        'default' => 'Cargo • Registro',
    ));

    $cmb_sobre->add_field(array(
        'name'    => esc_html__('Texto de Apresentação', 'louize'),
        'id'      => 'sobre_texto',
        'type'    => 'wysiwyg',
        'options' => array('textarea_rows' => 10),
    ));

    /* -------------------------------------------------------------------------
     * SEÇÃO: MEU PERCURSO
     * ------------------------------------------------------------------------- */
    $cmb_percurso = new_cmb2_box(array(
        'id'            => '_florapsi_percurso_metabox',
        'title'         => esc_html__('Meu Percurso', 'louize'),
        'object_types'  => array('page'),
        'show_on'       => array('key' => 'id', 'value' => $home_id),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    $cmb_percurso->add_field(array(
        'name'    => esc_html__('Título da Seção', 'louize'),
        'id'      => 'percurso_titulo',
        'type'    => 'text',
        'default' => 'Percurso',
    ));

    $cmb_percurso->add_field(array(
        'name'    => esc_html__('Texto Principal', 'louize'),
        'desc'    => esc_html__('Escreva o texto sobre sua trajetória profissional aqui.', 'louize'),
        'id'      => 'percurso_texto',
        'type'    => 'wysiwyg',
        'options' => array('textarea_rows' => 15),
    ));

    $cmb_percurso->add_field(array(
        'name'    => esc_html__('Imagem do Percurso', 'louize'),
        'id'      => 'percurso_imagem',
        'type'    => 'file',
        'options' => array('url' => false),
    ));

    /* -------------------------------------------------------------------------
     * SEÇÃO: SERVIÇOS
     * ------------------------------------------------------------------------- */
    $cmb_servicos = new_cmb2_box(array(
        'id'            => '_florapsi_servicos_metabox',
        'title'         => esc_html__('Serviços', 'louize'),
        'object_types'  => array('page'),
        'show_on'       => array('key' => 'id', 'value' => $home_id),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    $cmb_servicos->add_field(array(
        'name'    => esc_html__('Título Principal da Seção', 'louize'),
        'id'      => 'servicos_titulo_principal',
        'type'    => 'text',
        'default' => 'Serviços',
    ));

    $group_field_id = $cmb_servicos->add_field(array(
        'id'          => 'servicos_cards_group',
        'type'        => 'group',
        'description' => __('Crie e gerencie os cards de serviço.', 'louize'),
        'options'     => array(
            'group_title'   => esc_html__('Card de Serviço {#}', 'louize'),
            'add_button'    => esc_html__('Adicionar Card', 'louize'),
            'remove_button' => esc_html__('Remover Card', 'louize'),
            'sortable'      => true,
        ),
    ));

    $cmb_servicos->add_group_field($group_field_id, array(
        'name' => 'Classe do Ícone (Font Awesome)',
        'id'   => 'servico_card_icon',
        'type' => 'text',
        'description' => 'Ex: fa-solid fa-user. Encontre os ícones no site do Font Awesome.',
    ));

    $cmb_servicos->add_group_field($group_field_id, array(
        'name' => 'Título do Card',
        'id'   => 'servico_card_titulo',
        'type' => 'text',
    ));

    $cmb_servicos->add_group_field($group_field_id, array(
        'name' => 'Texto do Card',
        'id'   => 'servico_card_texto',
        'type' => 'textarea_small',
    ));

    /* -------------------------------------------------------------------------
     * SEÇÃO: DEPOIMENTOS
     * ------------------------------------------------------------------------- */
    $cmb_feedback = new_cmb2_box(array(
        'id'            => '_florapsi_feedback_metabox',
        'title'         => esc_html__('Depoimentos', 'louize'),
        'object_types'  => array('page'),
        'show_on'       => array('key' => 'id', 'value' => $home_id),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    $cmb_feedback->add_field(array(
        'name' => esc_html__('Exibir esta seção?', 'louize'),
        'id'   => 'feedback_exibir',
        'type' => 'checkbox',
    ));

    $cmb_feedback->add_field(array(
        'name'    => esc_html__('Título da Seção', 'louize'),
        'id'      => 'feedback_titulo',
        'type'    => 'text',
        'default' => 'O que dizem sobre meu Trabalho',
    ));

    $cmb_feedback->add_field(array(
        'name'    => esc_html__('Como deseja exibir os depoimentos?', 'louize'),
        'id'      => 'feedback_tipo',
        'type'    => 'radio_inline',
        'options' => array(
            'shortcode' => esc_html__('Usar Plugin (Shortcode)', 'louize'),
            'manual'    => esc_html__('Cadastrar Manulamente', 'louize'),
        ),
        'default' => 'shortcode',
    ));

    $cmb_feedback->add_field(array(
        'name' => esc_html__('Shortcode do Plugin', 'louize'),
        'id'   => 'feedback_shortcode',
        'type' => 'text',
        'desc' => 'Ex: [trustindex no-registration=google]',
    ));

    $group_feedback_id = $cmb_feedback->add_field(array(
        'id'          => 'feedback_manual_group',
        'type'        => 'group',
        'description' => __('Preencha aqui se escolheu "Cadastrar Manualmente" acima.', 'louize'),
        'options'     => array(
            'group_title'   => esc_html__('Depoimento Manual {#}', 'louize'),
            'add_button'    => esc_html__('Adicionar Depoimento', 'louize'),
            'sortable'      => true,
        ),
    ));

    $cmb_feedback->add_group_field($group_feedback_id, array(
        'name' => 'Nome do Cliente',
        'id'   => 'nome',
        'type' => 'text',
    ));

    $cmb_feedback->add_group_field($group_feedback_id, array(
        'name' => 'Depoimento',
        'id'   => 'texto',
        'type' => 'textarea_small',
    ));
    
    /* -------------------------------------------------------------------------
     * SEÇÃO: DÚVIDAS FREQUENTES (FAQ)
     * ------------------------------------------------------------------------- */
    $cmb_duvidas = new_cmb2_box(array(
        'id'            => '_florapsi_duvidas_metabox',
        'title'         => esc_html__('Dúvidas Frequentes', 'louize'),
        'object_types'  => array('page'),
        'show_on'       => array('key' => 'id', 'value' => $home_id),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    $cmb_duvidas->add_field(array(
        'name'    => esc_html__('Título da Seção', 'louize'),
        'id'      => 'duvidas_titulo',
        'type'    => 'text',
        'default' => 'Dúvidas Frequentes',
    ));

    $group_field_id = $cmb_duvidas->add_field(array(
        'id'          => 'duvidas_accordion',
        'type'        => 'group',
        'description' => __('Crie a lista de perguntas e respostas para o accordion.', 'louize'),
        'options'     => array(
            'group_title'   => esc_html__('Dúvida {#}', 'louize'),
            'add_button'    => esc_html__('Adicionar Nova Dúvida', 'louize'),
            'remove_button' => esc_html__('Remover Dúvida', 'louize'),
            'sortable'      => true,
        ),
    ));

    $cmb_duvidas->add_group_field($group_field_id, array(
        'name' => 'Pergunta',
        'id'   => 'pergunta',
        'type' => 'text',
    ));

    $cmb_duvidas->add_group_field($group_field_id, array(
        'name' => 'Resposta',
        'id'   => 'resposta',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5),
    ));

}