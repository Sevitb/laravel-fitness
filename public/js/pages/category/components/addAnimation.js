(function () {
    /* 
        ----- Categories pages sections -----
     */
    let mainSectionOptions = {
        reset: true,
        scale: 1,
        delay: 100,
        origin: 'right'
    }
    let mainSectionAnimation = new ScrollReveal(mainSectionOptions);

    mainSectionAnimation.reveal('.section-main-zone__title', { origin: 'top' });
    mainSectionAnimation.reveal('.section-main-zone__text-container', { origin: 'right', delay: 300 });

    let infoSectionOptions = {
        reset: true,
        delay: 100,
        distance: 0
    }
    let infoSectionAnimation = new ScrollReveal(infoSectionOptions);

    infoSectionAnimation.reveal('.section-info-block', { origin: 'top' });
})();