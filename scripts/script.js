document.addEventListener('DOMContentLoaded', function () {

    /* ==========================================================================
       MENU MOBILE
       ========================================================================== */
    const menuToggle = document.getElementById('menu-toggle');
    const mainNav = document.getElementById('main-nav');
    const header = document.querySelector('.navbar');
    if (menuToggle && mainNav && header) {
        menuToggle.addEventListener('click', () => {
            const isOpening = !mainNav.classList.contains('is-open');
            mainNav.classList.toggle('is-open');
            header.classList.toggle('menu-is-open');
            menuToggle.classList.toggle('is-open', isOpening);
            menuToggle.classList.toggle('is-closed', !isOpening);
        });

        // Fecha o menu automaticamente ao clicar em um link
        const menuLinks = mainNav.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mainNav.classList.contains('is-open')) {
                    mainNav.classList.remove('is-open');
                    header.classList.remove('menu-is-open');
                    menuToggle.classList.remove('is-open');
                    menuToggle.classList.add('is-closed');
                }
            });
        });
    }

    /* ==========================================================================
       ACCORDION (DÚVIDAS)
       ========================================================================== */
    const accordionItems = document.querySelectorAll('.duvidas-item');

    accordionItems.forEach(item => {
        const question = item.querySelector('.duvidas-question');
        if (question) {
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                accordionItems.forEach(i => i.classList.remove('active'));
                if (!isActive) item.classList.add('active');
            });
        }
    });

    /* ==========================================================================
       MODAL LEGAL
       ========================================================================== */
    const modal = document.getElementById('legal-modal');
    const openBtn = document.getElementById('open-legal-modal');
    const closeBtn = document.getElementById('close-legal-modal');

    if (openBtn && modal && closeBtn) {
        const toggleModal = (state) => {
            modal.classList.toggle('is-active', state);
            document.body.style.overflow = state ? 'hidden' : '';
        };

        openBtn.addEventListener('click', (e) => {
            e.preventDefault();
            toggleModal(true);
        });

        closeBtn.addEventListener('click', () => toggleModal(false));

        modal.addEventListener('click', (e) => {
            if (e.target === modal) toggleModal(false);
        });
    }

});
