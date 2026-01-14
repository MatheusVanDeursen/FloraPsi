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
       ANIMAÇÕES DE SCROLL
       ========================================================================== */
    const elementsToAnimate = document.querySelectorAll('.slide-animation');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = parseInt(entry.target.dataset.delay || 0);

                setTimeout(() => {
                    entry.target.classList.add('is-visible');
                    // Ativa animação de borda no botão do banner
                    if (entry.target.classList.contains('banner-button')) {
                        entry.target.classList.add('border-active');
                    }
                }, parseInt(delay));
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    elementsToAnimate.forEach(el => observer.observe(el));

    /* ==========================================================================
       CARROSSEL DEPOIMENTOS
       ========================================================================== */
    const track = document.querySelector('.manual-carousel-wrapper');

    if (track) {
        const originalItems = Array.from(track.querySelectorAll('.ti-review-item'));
        const nextBtn = document.querySelector('.manual-next');
        const prevBtn = document.querySelector('.manual-prev');
        let itemsVisible, itemWidth, index, isTransitioning = false, autoPlay;

        function initCarousel() {
            track.style.transition = 'none';
            track.innerHTML = '';

            const width = window.innerWidth;
            itemsVisible = width > 1024 ? 3 : (width > 768 ? 2 : 1);
            itemWidth = 100 / itemsVisible;
            index = itemsVisible;

            const firstClones = originalItems.slice(0, itemsVisible).map(el => el.cloneNode(true));
            const lastClones = originalItems.slice(-itemsVisible).map(el => el.cloneNode(true));

            // Monta o carrossel: [Clones Finais] + [Originais] + [Clones Iniciais]
            lastClones.forEach(clone => track.appendChild(clone));
            originalItems.forEach(item => track.appendChild(item.cloneNode(true)));
            firstClones.forEach(clone => track.appendChild(clone));

            track.style.transform = `translateX(-${index * itemWidth}%)`;
        }

        const moveSlide = (dir) => {
            if (isTransitioning) return;
            isTransitioning = true;
            track.style.transition = 'transform 0.5s ease-in-out';
            index = (dir === 'next') ? index + 1 : index - 1;
            track.style.transform = `translateX(-${index * itemWidth}%)`;
        };

        track.addEventListener('transitionend', () => {
            isTransitioning = false;
            if (index >= originalItems.length + itemsVisible) {
                track.style.transition = 'none';
                index = itemsVisible;
                track.style.transform = `translateX(-${index * itemWidth}%)`;
            } else if (index < itemsVisible) {
                track.style.transition = 'none';
                index = originalItems.length + index;
                track.style.transform = `translateX(-${index * itemWidth}%)`;
            }
        });

        if (nextBtn && prevBtn) {
            nextBtn.addEventListener('click', () => { moveSlide('next'); startAutoPlay(); });
            prevBtn.addEventListener('click', () => { moveSlide('prev'); startAutoPlay(); });
        }

        function startAutoPlay() {
            clearInterval(autoPlay);
            autoPlay = setInterval(() => moveSlide('next'), 10000);
        }

        initCarousel(); startAutoPlay();

        window.addEventListener('resize', () => { clearTimeout(window.resizer); window.resizer = setTimeout(initCarousel, 250); });
    }

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
