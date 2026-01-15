<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- =================================================================== -->
    <!-- META TAGS & WP HEAD                                                 -->
    <!-- =================================================================== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- =================================================================== -->
    <!-- HEADER / NAVBAR                                                     -->
    <!-- =================================================================== -->
    <header class="navbar">
        
        <!-- LOGO -->
        <a href="#inicio" class="navbar-logo-link">
            <?php $logo_url = get_theme_mod('florapsi_header_logo', ''); ?>

            <?php if ( !empty($logo_url) ) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="navbar-logo-img">
            <?php else : ?>
                <span style="color:white; font-family:'Tan Mon Cheri'; font-size:24px;"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>

        <!-- BOTÃO MOBILE (HAMBURGLAR) -->
        <div id="menu-toggle" class="hamburglar is-closed" 
            aria-label="<?php echo esc_attr__('Abrir menu', 'louize'); ?>" 
            aria-expanded="false">
            
            <div class="burger-icon">
                <div class="burger-container">
                    <span class="burger-bun-top"></span>
                    <span class="burger-filling"></span>
                    <span class="burger-bun-bot"></span>
                </div>
            </div>
            
            <div class="burger-ring">
                <svg class="svg-ring">
                    <path class="path" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
                </svg>
            </div>
            
            <svg width="0" height="0">
                <mask id="mask">
                    <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
                </mask>
            </svg>

            <div class="path-burger">
                <div class="animate-path">
                    <div class="path-rotation"></div>
                </div>
            </div>
        </div>

        <!-- MENU DE NAVEGAÇÃO -->
        <nav id="main-nav" class="navbar-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'container'      => false,
                'items_wrap'     => '<ul class="navbar-menu-list">%3$s</ul>',
            ));
            ?>
        </nav>
    </header>