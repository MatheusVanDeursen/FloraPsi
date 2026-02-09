<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main class="main">
        <?php $post_id = get_page_by_title( 'Início' )->ID; ?>

        <!-- =================================================================== -->
        <!-- BANNER                                                              -->
        <!-- =================================================================== -->
        <?php
        $banner_subtitle    = get_theme_mod( 'florapsi_banner_subtitle' );
        $banner_text        = get_theme_mod( 'florapsi_banner_text' );
        $banner_button_text = get_theme_mod( 'florapsi_banner_button_text' );
        $banner_button_url  = get_theme_mod( 'florapsi_banner_button_url' );
        ?>
        <section id="inicio" class="main-section banner">
            <?php 
                $flora_left = get_theme_mod('florapsi_banner_flora_left');
                $flora_right = get_theme_mod('florapsi_banner_flora_right');

                if ($flora_left) : ?>
                    <img src="<?php echo esc_url($flora_left); ?>" class="banner-flora-left slide-animation" data-delay="300" alt="">
                <?php endif; 

                if ($flora_right) : ?>
                    <img src="<?php echo esc_url($flora_right); ?>" class="banner-flora-right slide-animation" data-delay="300" alt="">
            <?php endif; ?>
            <div class="section-container">

                <?php if ( ! empty( $banner_subtitle ) ) : ?>
                    <h2 class="banner-subtitle slide-animation" data-delay="1000"><?php echo esc_html( $banner_subtitle ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $banner_text ) ) : ?>
                    <p class="banner-text slide-animation" data-delay="1200"><?php echo nl2br( esc_html( $banner_text ) ); ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $banner_button_text ) && ! empty( $banner_button_url ) ) : ?>
                    <a href="<?php echo esc_url( $banner_button_url ); ?>" target="_blank" rel="noopener noreferrer" class="banner-button slide-animation" data-delay="1400">
                        <span class="border-top"></span>
                        <span class="border-right"></span>
                        <span class="border-bottom"></span>
                        <span class="border-left"></span>
                        <?php echo esc_html( $banner_button_text ); ?>
                    </a>
                <?php endif; ?>

                <?php 
                $flores = [
                    [ 'url' => get_theme_mod( 'florapsi_banner_decor_tl' ), 'class' => 'banner-top-left',     'alt' => 'Decoração superior esquerda' ],
                    [ 'url' => get_theme_mod( 'florapsi_banner_decor_tr' ), 'class' => 'banner-top-right',    'alt' => 'Decoração superior direita' ],
                    [ 'url' => get_theme_mod( 'florapsi_banner_decor_bl' ), 'class' => 'banner-bottom-left',  'alt' => 'Decoração inferior esquerda' ],
                    [ 'url' => get_theme_mod( 'florapsi_banner_decor_br' ), 'class' => 'banner-bottom-right', 'alt' => 'Decoração inferior direita' ],
                ];

                foreach ( $flores as $flor ) :
                    if ( ! empty( $flor['url'] ) ) : ?>
                        <img src="<?php echo esc_url( $flor['url'] ); ?>" alt="<?php echo esc_attr( $flor['alt'] ); ?>" class="banner-corner-img <?php echo esc_attr( $flor['class'] ); ?>">
                    <?php endif;
                endforeach;
                ?>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- SOBRE MIM                                                           -->
        <!-- =================================================================== -->
        <?php
        $sobre_imagem_id  = get_post_meta( $post_id, 'sobre_imagem_id', true );
        $sobre_imagem_url = $sobre_imagem_id ? wp_get_attachment_image_url( $sobre_imagem_id, 'large' ) : get_template_directory_uri() . '/img/foto-sobre-mim.jpg';
        $sobre_titulo     = get_post_meta( $post_id, 'sobre_titulo', true );
        $sobre_subtitulo  = get_post_meta( $post_id, 'sobre_subtitulo', true );
        $sobre_texto      = get_post_meta( $post_id, 'sobre_texto', true );
        ?>
        <section id="sobre-mim" class="main-section sobre-mim">
            <div class="section-container">
                <div class="sobre-mim-content-1 flex-4 slide-animation-delayed-trigger">
                    <img src="<?php echo esc_url( $sobre_imagem_url ); ?>" alt="Foto de Louize Vieira" class="sobre-mim-img" loading="lazy">
                </div>
                <div class="sobre-mim-content-2 flex-8">
                    <?php if ( ! empty( $sobre_titulo ) ) : ?>
                        <h3 class="sobre-mim-title"><?php echo esc_html( $sobre_titulo ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $sobre_subtitulo ) ) : ?>
                        <h3 class="sobre-mim-subtitle"><?php echo esc_html( $sobre_subtitulo ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $sobre_texto ) ) : ?>
                        <div class="sobre-mim-text">
                            <?php echo wpautop( $sobre_texto ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>   

        <!-- =================================================================== -->
        <!-- SERVIÇOS                                                            -->
        <!-- =================================================================== -->
        <?php
        $servicos_titulo = get_post_meta( $post_id, 'servicos_titulo_principal', true );
        $servicos_cards  = get_post_meta( $post_id, 'servicos_cards_group', true );
        ?>
        <section id="servicos" class="main-section servico">
            <div class="section-container">
                <?php if ( ! empty( $servicos_titulo ) ) : ?>
                    <h3 class="servico-title"><?php echo esc_html( $servicos_titulo ); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty( $servicos_cards ) && is_array( $servicos_cards ) ) : ?>
                    <div class="servicos-grid">
                        <?php foreach ( $servicos_cards as $index => $card ) : ?>
                            <div class="servico-card slide-animation" data-delay="<?php echo $index * 200; ?>">
                                <div class="servico-icon">
                                    <i class="<?php echo esc_attr( $card['servico_card_icon'] ?? '' ); ?>"></i>
                                </div>
                                <h4 class="servico-card-title"><?php echo esc_html( $card['servico_card_titulo'] ?? '' ); ?></h4>
                                <p class="servico-card-text"><?php echo esc_html( $card['servico_card_texto'] ?? '' ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- PERCURSO                                                            -->
        <!-- =================================================================== -->
        <?php
        $percurso_titulo     = get_post_meta( $post_id, 'percurso_titulo', true );
        $percurso_texto      = get_post_meta( $post_id, 'percurso_texto', true );
        $percurso_imagem_id  = get_post_meta( $post_id, 'percurso_imagem_id', true );
        $percurso_imagem_url = $percurso_imagem_id ? wp_get_attachment_image_url( $percurso_imagem_id, 'large' ) : '';
        ?>
        <section id="percurso" class="main-section percurso">
            <div class="section-container">
                <div class="percurso-content-text flex-8">
                    <?php if ( ! empty( $percurso_titulo ) ) : ?>
                        <h3 class="percurso-title"><?php echo esc_html( $percurso_titulo ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $percurso_texto ) ) : ?>
                        <div class="percurso-text">
                            <?php echo wpautop( $percurso_texto ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="percurso-content-img flex-4 slide-animation-delayed-trigger">
                    <?php if ( $percurso_imagem_url ) : ?>
                        <img src="<?php echo esc_url( $percurso_imagem_url ); ?>" alt="Trajetória de Louize Vieira" class="percurso-img" loading="lazy">
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- DEPOIMENTOS                                                         -->
        <!-- =================================================================== -->
        <?php
        $feedback_exibir    = get_post_meta( $post_id, 'feedback_exibir', true );
        $feedback_tipo      = get_post_meta( $post_id, 'feedback_tipo', true );
        $feedback_titulo    = get_post_meta( $post_id, 'feedback_titulo', true );
        $feedback_shortcode = get_post_meta( $post_id, 'feedback_shortcode', true );
        $feedback_manuais   = get_post_meta( $post_id, 'feedback_manual_group', true );

        if ( 'on' === $feedback_exibir ) :
        ?>
        <section id="depoimentos" class="main-section feedback">
            <div class="section-container">
                <h3 class="feedback-title"><?php echo esc_html( $feedback_titulo ); ?></h3>
                
                <div id="meus-depoimentos-customizados" class="ti-widget ti-goog ti-review-text-mode-readmore <?php echo ( 'manual' === $feedback_tipo ) ? 'is-manual-carousel' : ''; ?>">
                    <?php if ( 'shortcode' === $feedback_tipo && ! empty( $feedback_shortcode ) ) : ?>
                        <?php echo do_shortcode( $feedback_shortcode ); ?>
                    <?php elseif ( 'manual' === $feedback_tipo && ! empty( $feedback_manuais ) ) : ?>
                        
                        <div class="ti-widget-container">
                            <div class="ti-reviews-container">
                                <div class="ti-controls">
                                    <div class="ti-prev manual-prev" role="button" aria-label="Anterior"></div>
                                    <div class="ti-next manual-next" role="button" aria-label="Próximo"></div>
                                </div>

                                <div class="ti-reviews-container-wrapper manual-carousel-wrapper">
                                    <?php foreach ( $feedback_manuais as $item ) : ?>
                                        <div class="ti-review-item">
                                            <div class="ti-inner">
                                                <div class="ti-review-header">
                                                    <div class="ti-profile-details">
                                                        <div class="ti-name"><?php echo esc_html( $item['nome'] ); ?></div>
                                                    </div>
                                                </div>
                                                <div class="ti-review-content">
                                                    <?php echo esc_html( $item['texto'] ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- =================================================================== -->
        <!-- DÚVIDAS FREQUENTES                                                  -->
        <!-- =================================================================== -->
        <?php
        $duvidas_titulo = get_post_meta( $post_id, 'duvidas_titulo', true );
        $duvidas_lista  = get_post_meta( $post_id, 'duvidas_accordion', true );
        ?>
        <section id="duvidas" class="main-section duvidas">
            <div class="section-container">
                <?php if ( ! empty( $duvidas_titulo ) ) : ?>
                    <h2 class="duvidas-title"><?php echo esc_html( $duvidas_titulo ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $duvidas_lista ) && is_array( $duvidas_lista ) ) : ?>
                    <div class="duvidas-accordion">
                        <?php foreach ( $duvidas_lista as $index => $item ) : ?>
                            <div class="duvidas-item slide-animation" data-delay="<?php echo $index * 150; ?>">
                                <div class="duvidas-question">
                                    <?php if ( ! empty( $item['pergunta'] ) ) : ?>
                                        <span><?php echo esc_html( $item['pergunta'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="duvidas-answer">
                                    <?php if ( ! empty( $item['resposta'] ) ) : ?>
                                        <?php echo wpautop( $item['resposta'] ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- =================================================================== -->
        <!-- CONTATO                                                             -->
        <!-- =================================================================== -->
         <?php
        // Recuperando dados do CMB2 com prefixo 'florapsi_'
        $contact_title       = get_post_meta( get_the_ID(), 'florapsi_contact_title', true );
        $contact_description = get_post_meta( get_the_ID(), 'florapsi_contact_desc', true );

        // Box Destaque
        $box_title           = get_post_meta( get_the_ID(), 'florapsi_contact_box_title', true );
        $box_text            = get_post_meta( get_the_ID(), 'florapsi_contact_box_text', true );

        // Botão
        $btn_label           = get_post_meta( get_the_ID(), 'florapsi_contact_btn_label', true );
        $whatsapp_link       = get_post_meta( get_the_ID(), 'florapsi_contact_whatsapp_link', true );
                                        
        // Instagram
        $insta_photo   = get_post_meta( get_the_ID(), 'florapsi_insta_photo', true );
        $insta_handle  = get_post_meta( get_the_ID(), 'florapsi_insta_handle', true );
        $insta_bio     = get_post_meta( get_the_ID(), 'florapsi_insta_bio', true );
        $insta_topics = get_post_meta( get_the_ID(), 'florapsi_insta_topics_group', true );
        $insta_link    = get_post_meta( get_the_ID(), 'florapsi_insta_link', true );
        ?>
        <section id="contato" class="contact-section">
        <div class="container contact-grid">
            
            <div class="contact-left">
                <h2 class="section-title"><?php echo esc_html($contact_title); ?></h2>
                
                <div class="contact-description">
                    <?php echo wpautop($contact_description); ?>
                </div>

                <div class="info-highlight-box slide-animation slide-up">
                    <div class="info-icon">
                        <i class="fa-regular fa-comments"></i>
                    </div>
                    <div class="info-content">
                        <h4><?php echo esc_html($box_title); ?></h4>
                        <p><?php echo esc_html($box_text); ?></p>
                    </div>
                </div>

                <a href="<?php echo esc_url($whatsapp_link); ?>" 
                class="btn-main whatsapp-btn slide-animation slide-up" rel="noopener noreferrer nofollow"> <i class="fa-brands fa-whatsapp"></i> <?php echo esc_html($btn_label); ?>
                </a>
            </div>

            <div class="contact-right">
                <div class="instagram-card slide-animation slide-from-right">
                    
                    <div class="insta-header">
                        <div class="insta-avatar">
                            <?php if($insta_photo): ?>
                                <img src="<?php echo esc_url($insta_photo); ?>" alt="Perfil Instagram" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="insta-info">
                            <span class="insta-handle">@<?php echo esc_html($insta_handle); ?></span>
                            <span class="insta-label">Psicóloga Clínica</span>
                        </div>
                        <div class="insta-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                    
                    <div class="insta-body">
                        <p class="insta-bio"><?php echo esc_html($insta_bio); ?></p>
                        
                        <div class="insta-topics-list">
                            <?php 
                            // Verifica se existem tópicos cadastrados e se é uma lista válida
                            if ( ! empty( $insta_topics ) && is_array( $insta_topics ) ) : 
                                
                                // Para cada item na lista, cria uma Tag
                                foreach ( $insta_topics as $topic ) :
                                    // Garante que o texto existe antes de imprimir
                                    if ( ! empty( $topic['topic_text'] ) ) :
                            ?>
                                        <span class="topic-pill">
                                            <?php echo esc_html( $topic['topic_text'] ); ?>
                                        </span>
                            <?php 
                                    endif;
                                endforeach;
                                
                            endif; 
                            ?>
                        </div>
                    </div>

                    <a href="<?php echo esc_url($insta_link); ?>" target="_blank" rel="me noopener noreferrer" class="btn-secondary full-width">
                        Seguir no Instagram
                    </a>
                </div>
            </div>

        </div>
    </section>
    </main>

    <!-- =================================================================== -->
    <!-- BOTÃO FLUTUANTE                                                     -->
    <!-- =================================================================== -->
    <a href="<?php echo esc_url( get_theme_mod( 'florapsi_whatsapp_link', '#' ) ); ?>" target="_blank" rel="noopener noreferrer nofollow" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

<?php endwhile; endif; ?>

<?php get_footer(); ?>