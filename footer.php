    <!-- ========== Footer ========== -->
    <footer class="footer" itemscope itemtype="https://schema.org/WPFooter">
        <div class="section-container">
            <p><?php echo esc_html(get_theme_mod('florapsi_footer_identification_text')); ?></p>
            <p><?php echo '&copy; ' . date('Y') . '. ' . esc_html(get_theme_mod('florapsi_footer_copyright_text')); ?></p>
            
            <?php if (get_theme_mod('florapsi_footer_legal_notice')) : ?>
                <div class="footer-privacy">
                    <a href="#" id="open-legal-modal">
                        <?php echo esc_html(get_theme_mod('florapsi_footer_legal_link_text', 'Informações Legais e Privacidade')); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </footer>

    <div id="legal-modal" class="modal-overlay">
        <div class="modal-content">
            <button id="close-legal-modal" class="modal-close">&times;</button>
            <h3 class="modal-title"><?php echo esc_html(get_theme_mod('florapsi_footer_legal_link_text')); ?></h3>
            <div class="modal-body">
                <?php echo nl2br(esc_html(get_theme_mod('florapsi_footer_legal_notice'))); ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>