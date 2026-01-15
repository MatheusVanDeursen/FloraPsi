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
            <div class="section-container">

                <?php if ( ! empty( $banner_subtitle ) ) : ?>
                    <h2 class="banner-subtitle slide-animation" data-delay="1000"><?php echo esc_html( $banner_subtitle ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $banner_text ) ) : ?>
                    <p class="banner-text slide-animation" data-delay="1200"><?php echo nl2br( esc_html( $banner_text ) ); ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $banner_button_text ) && ! empty( $banner_button_url ) ) : ?>
                    <a href="<?php echo esc_url( $banner_button_url ); ?>" target="_blank" class="banner-button slide-animation" data-delay="1400">
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
                    <img src="<?php echo esc_url( $sobre_imagem_url ); ?>" alt="Foto de Louize Vieira" class="sobre-mim-img">
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
                        <img src="<?php echo esc_url( $percurso_imagem_url ); ?>" alt="Trajetória de Louize Vieira" class="percurso-img">
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
        <section id="contato" class="main-section contato">
            <div class="contato-wrapper">
                <div class="contato-coluna">
                    <div class="contato-box">
                        <h3 class="contato-title">
                            <?php echo esc_html( get_theme_mod( 'florapsi_contato_insta_title', 'Acompanhe nas redes' ) ); ?>
                        </h3>
                        
                        <p class="contato-text">
                            <?php echo esc_html( get_theme_mod( 'florapsi_instagram_text', 'Conheça mais sobre meu trabalho.' ) ); ?>
                        </p>

                        <?php 
                        $insta_url    = get_theme_mod( 'florapsi_instagram_url' );
                        $insta_handle = get_theme_mod( 'florapsi_instagram_handle', '@perfil' );
                        
                        if ( ! empty( $insta_url ) ) : ?>
                            <a href="<?php echo esc_url( $insta_url ); ?>" target="_blank" class="instagram-button">
                                <i class="fa-brands fa-instagram"></i>
                                <span><?php echo esc_html( $insta_handle ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="contato-coluna">
                    <div class="contato-cta">
                        <h3 class="contato-title">
                            <?php echo esc_html( get_theme_mod( 'florapsi_contato_cta_title', 'Vamos conversar?' ) ); ?>
                        </h3>
                        <p class="contato-text">
                            <?php echo esc_html( get_theme_mod( 'florapsi_contato_text', 'Dê o primeiro passo na sua jornada de cuidado.' ) ); ?>
                        </p>
                        <a href="<?php echo esc_url( get_theme_mod( 'florapsi_banner_button_url', '#' ) ); ?>" target="_blank" class="whatsapp-button">
                            <?php echo esc_html( get_theme_mod( 'florapsi_banner_button_text', 'Agende sua consulta' ) ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- =================================================================== -->
    <!-- BOTÃO FLUTUANTE                                                     -->
    <!-- =================================================================== -->
    <a href="<?php echo esc_url( get_theme_mod( 'florapsi_whatsapp_link', '#' ) ); ?>" target="_blank" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

<?php endwhile; endif; ?>

<?php get_footer(); ?>